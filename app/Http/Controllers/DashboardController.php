<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCourseRequest;
use App\Http\Requests\getNextModuleRequest;
use App\Models\CourseHistory;
use App\Models\Courses;
use App\Models\CourseVedio;
use App\Notifications\CoursePurchasedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Event\Code\Throwable;


class DashboardController extends CoreInfController
{

    /**
     * =========================================================
     * user dashboard
     * =========================================================
     */

    public function index()
    {
        $courses = $this->courseList();
        return view('dashboard', compact('courses'));
    }

    
    /**
     * =========================================================
     * Course add section
     * =========================================================
     */

    public function addCourse(AddCourseRequest $request)
    {

        $course = collect($this->courseList())->where('id', $request->id)->first();

        $isExist = Courses::where(['course_id' => $request->id, 'user_id' => auth()->user()->id])->exists();

        if (!$isExist) {

            try {
                DB::beginTransaction();

                $modules = CourseVedio::first();

                $newCourse = new Courses();
                $newCourse->user_id = auth()->user()->id;
                $newCourse->course_id = (int)$request->id;
                $newCourse->course_name = $course['name'];
                $newCourse->slug = $course['slug'];

                $newCourse->save();

                $histories = new CourseHistory();

                $histories->course_id =  $newCourse->id;
                $histories->vedio_id = $modules->id;
                $histories->status = 1;

                $histories->save();
                auth()->user()->notify(new CoursePurchasedNotification($newCourse));

                DB::commit();
            } catch (Throwable $th) {
                DB::rollBack();
            }
        } else {
            return response()->json(['status' => false, 'message' => "Course already added"]);
        }


        return response()->json(['status' => true, 'message' => "Course Added Successfully"]);
    }

    /**
     * =========================================================
     * Get User Course
     * =========================================================
     */

    public function getCourse()
    {
        $courses = Courses::with('history')->where(['user_id' => auth()->user()->id])->get();


        return view('course.index', compact('courses'));
    }

    /**
     * =========================================================
     * View Course
     * =========================================================
     */

    public function viewCourse(Request $request, $id)
    {
        $course = CourseHistory::with('module')->activeStatus()->first();
        return view('course.view', compact('course'));
    }

    /**
     * =========================================================
     * Chanage status of each Course module
     * =========================================================
     */

    public function getNextModule(getNextModuleRequest $request)
    {
        try {
            DB::beginTransaction();


            $module = CourseVedio::where('id', '>', $request->vedio_id)->first();

            CourseHistory::with('module')->where(['status' => 1, 'course_id' => $request->course_id])
                ->update(['status' => 2]);
    
            
            if($module) {
    
                $histories = new CourseHistory();
    
                $histories->course_id =  $request->course_id;
                $histories->vedio_id = $module->id;
                $histories->status = 1;
    
                $histories->save();
    
            } 
            
            DB::commit();
            return response()->json(['status' => true]);
        } catch (Throwable $th) {
            DB::rollBack();
        }
    }
}

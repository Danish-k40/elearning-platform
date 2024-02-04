<?php

namespace App\Http\Controllers;

use App\Services\HomeServices;
use Illuminate\Http\Request;

class CoreInfController extends Controller
{
    public function courseList() 
    {
        $service = new HomeServices;
        $courses = $service->getCourses()['result'] ?? [];
        return $courses;
    }
}

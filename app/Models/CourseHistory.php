<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseHistory extends Model
{
    use HasFactory;

    public function module() 
    {
        return $this->hasOne(CourseVedio::class, 'id', 'vedio_id');
    }

    public function course() {
        return $this->hasOne(Courses::class, 'id', 'course_id');
    }

    public function scopeActiveStatus($query)
    {
        return $query->where('status', 1)
                 ->whereHas('course', function ($query) {
                     $query->where('user_id', auth()->user()->id);
                 });
    }
    
}

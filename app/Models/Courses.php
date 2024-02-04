<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    public function history()
    {
        return $this->hasMany(CourseHistory::class, 'course_id');
    }

}

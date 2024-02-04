<?php

namespace Database\Seeders;

use App\Models\CourseVedio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseVedioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_vedios')->delete();
        $data = [
            [
                "link" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
                "module" => 1,
            ],
            [
                "link" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                "module" => 2,
            ],

        ];

        CourseVedio::insert($data);
    }
}

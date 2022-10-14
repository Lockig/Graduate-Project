<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([[
            'course_id'=>'1',
            'teacher_id'=>'2',
            'course_name'=>'Toán 10 ',
            'start_date'=>'2022-01-01',
            'end_date'=>'2022-04-01',
            'course_hour'=>'2',
            'course_description'=>'Khóa học Toán cấp tốc cho học sinh lớp 10',
            'course_status'=>'Đang diễn ra'
        ],[
            'course_id'=>'2',
            'teacher_id'=>'2',
            'course_name'=>'Văn 10',
            'start_date'=>'2022-05-01',
            'end_date'=>'2022-09-01',
            'course_hour'=>'2',
            'course_description'=>'Khóa học Văn cấp tốc cho học sinh lớp 10',
            'course_status'=>'Đang diễn ra'
        ]]);

        DB::table('course_students')->insert([[
            'course_id'=>'1',
            'student_id'=>'3'
            ]]);
//        ],[
//            'course_id'=>'1',
//            'student_id'=>'2'
//        ],[
//            'course_id'=>'1',
//            'student_id'=>'3'
//        ],[
//            'course_id'=>'2',
//            'student_id'=>'3'
//        ],[
//            'course_id'=>'2',
//            'student_id'=>'4'
//        ],[
//            'course_id'=>'2',
//            'student_id'=>'5'
//        ],[
//            'course_id'=>'2',
//            'student_id'=>'1'
//        ]]);
        //
    }
}

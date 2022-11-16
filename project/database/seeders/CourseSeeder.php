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
        DB::table('courses')->insert([
            'course_id' => '1',
            'teacher_id' => '2',
            'subject_id' => 'A1',
            'course_name' => 'Toán 10 ',
            'start_date' => '2022-01-01',
            'end_date' => '2022-04-01',
            'course_hour' => '2',
            'course_description' => 'Khóa học Toán cấp tốc cho học sinh lớp 10',
            'course_status' => '2'
        ]);

        DB::table('course_materials')->insert([
            'course_id' => '1',
            'header' => 'Học liệu 1',
            'description' => "<p>Đây là tài liệu chương 1</p>",
            'file' => '{}'
        ]);

        DB::table('course_schedules')->insert([
            ['id' => '1', 'course_id' => '1', 'start_at' => '2022-11-01 08:00:00', 'end_at' => '2022-11-01 10:00:00'],
            ['id' => '2', 'course_id' => '1', 'start_at' => '2022-11-08 08:00:00', 'end_at' => '2022-11-08 10:00:00'],
            ['id' => '3', 'course_id' => '1', 'start_at' => '2022-11-15 08:00:00', 'end_at' => '2022-11-15 10:00:00'],
            ['id' => '4', 'course_id' => '1', 'start_at' => '2022-11-22 08:00:00', 'end_at' => '2022-11-22 10:00:00'],
            ['id' => '5', 'course_id' => '1', 'start_at' => '2022-11-29 08:00:00', 'end_at' => '2022-11-29 10:00:00'],
            ['id' => '6', 'course_id' => '1', 'start_at' => '2022-12-06 08:00:00', 'end_at' => '2022-12-06 10:00:00'],
            ['id' => '7', 'course_id' => '1', 'start_at' => '2022-12-13 08:00:00', 'end_at' => '2022-12-13 10:00:00'],
        ]);
        DB::table('course_students')->insert([
            ['course_id' => '1', 'student_id' => '4'],
            ['course_id' => '1', 'student_id' => '5'],
            ['course_id' => '1', 'student_id' => '6']
        ]);
        DB::table('course_notifications')->insert([
            'course_id'=>'1',
            'content'=>'chào mừng các em học sinh lớp 10'
        ]);

    }
}

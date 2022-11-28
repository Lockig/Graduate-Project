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
            [
                'course_id' => '1',
                'teacher_id' => '2',
                'subject_id' => 'TOAN',
                'course_name' => 'Toán 10 ',
                'start_date' => '2022-11-01',
                'end_date' => '2023-03-01',
                'course_hour' => '2',
                'money' => '200000',
                'course_description' => 'Khóa học Toán cấp tốc cho học sinh lớp 10',
                'course_status' => '2'
            ],
            [
                'course_id' => '2',
                'teacher_id' => '2',
                'subject_id' => 'TOAN',
                'course_name' => 'Toán 11 ',
                'start_date' => '2022-08-01',
                'end_date' => '2022-12-01',
                'course_hour' => '2',
                'money' => '200000',
                'course_description' => 'Khóa học Toán cấp tốc cho học sinh lớp 10',
                'course_status' => '2'
            ],
            [
                'course_id' => '3',
                'teacher_id' => '3',
                'subject_id' => 'ANH',
                'course_name' => 'Anh 10 ',
                'start_date' => '2022-08-01',
                'end_date' => '2022-12-01',
                'course_hour' => '2',
                'money' => '200000',
                'course_description' => 'Khóa học Anh cấp tốc cho học sinh lớp 10',
                'course_status' => '2'
            ],
            [
                'course_id' => '4',
                'teacher_id' => '3',
                'subject_id' => 'Anh',
                'course_name' => 'Anh 12 ',
                'start_date' => '2022-11-01',
                'end_date' => '2023-03-01',
                'course_hour' => '2',
                'money' => '200000',
                'course_description' => 'Khóa học Anh cấp tốc cho học sinh lớp 12',
                'course_status' => '2'
            ],
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

            ['id' => '8', 'course_id' => '2', 'start_at' => '2022-11-02 18:00:00', 'end_at' => '2022-11-02 20:00:00'],
            ['id' => '9', 'course_id' => '2', 'start_at' => '2022-11-09 18:00:00', 'end_at' => '2022-11-09 20:00:00'],
            ['id' => '10', 'course_id' => '2', 'start_at' => '2022-11-16 18:00:00', 'end_at' => '2022-11-16 20:00:00'],
            ['id' => '11', 'course_id' => '2', 'start_at' => '2022-11-23 18:00:00', 'end_at' => '2022-11-23 20:00:00'],
            ['id' => '12', 'course_id' => '2', 'start_at' => '2022-11-30 18:00:00', 'end_at' => '2022-11-30 20:00:00'],
            ['id' => '13', 'course_id' => '2', 'start_at' => '2022-12-07 18:00:00', 'end_at' => '2022-12-07 20:00:00'],
            ['id' => '14', 'course_id' => '2', 'start_at' => '2022-12-14 18:00:00', 'end_at' => '2022-12-14 20:00:00'],

            ['id' => '15', 'course_id' => '3', 'start_at' => '2022-11-03 015:00:00', 'end_at' => '2022-11-03 17:00:00'],
            ['id' => '16', 'course_id' => '3', 'start_at' => '2022-11-09 015:00:00', 'end_at' => '2022-11-09 17:00:00'],
            ['id' => '17', 'course_id' => '3', 'start_at' => '2022-11-16 015:00:00', 'end_at' => '2022-11-16 17:00:00'],
            ['id' => '18', 'course_id' => '3', 'start_at' => '2022-11-23 015:00:00', 'end_at' => '2022-11-23 17:00:00'],
            ['id' => '19', 'course_id' => '3', 'start_at' => '2022-11-30 015:00:00', 'end_at' => '2022-11-30 17:00:00'],
            ['id' => '20', 'course_id' => '3', 'start_at' => '2022-12-07 015:00:00', 'end_at' => '2022-12-07 17:00:00'],
            ['id' => '21', 'course_id' => '3', 'start_at' => '2022-12-14 015:00:00', 'end_at' => '2022-12-14 17:00:00'],

            ['id' => '22', 'course_id' => '4', 'start_at' => '2022-11-01 10:00:00', 'end_at' => '2022-11-01 12:00:00'],
            ['id' => '23', 'course_id' => '4', 'start_at' => '2022-11-08 10:00:00', 'end_at' => '2022-11-08 12:00:00'],
            ['id' => '24', 'course_id' => '4', 'start_at' => '2022-11-15 10:00:00', 'end_at' => '2022-11-15 12:00:00'],
            ['id' => '25', 'course_id' => '4', 'start_at' => '2022-11-22 10:00:00', 'end_at' => '2022-11-22 12:00:00'],
            ['id' => '26', 'course_id' => '4', 'start_at' => '2022-11-29 10:00:00', 'end_at' => '2022-11-29 12:00:00'],
            ['id' => '27', 'course_id' => '4', 'start_at' => '2022-12-06 10:00:00', 'end_at' => '2022-12-06 12:00:00'],
            ['id' => '28', 'course_id' => '4', 'start_at' => '2022-12-13 10:00:00', 'end_at' => '2022-12-13 12:00:00'],
        ]);
        DB::table('course_students')->insert([
            ['course_id' => '1', 'student_id' => '4'],
            ['course_id' => '1', 'student_id' => '5'],
            ['course_id' => '1', 'student_id' => '6'],
            ['course_id' => '1', 'student_id' => '7'],
            ['course_id' => '1', 'student_id' => '8'],
            ['course_id' => '2', 'student_id' => '4'],
            ['course_id' => '2', 'student_id' => '10'],
            ['course_id' => '2', 'student_id' => '11'],
            ['course_id' => '2', 'student_id' => '12'],
            ['course_id' => '2', 'student_id' => '13'],
            ['course_id' => '3', 'student_id' => '14'],
            ['course_id' => '3', 'student_id' => '15'],
            ['course_id' => '3', 'student_id' => '16'],
            ['course_id' => '3', 'student_id' => '4'],
            ['course_id' => '3', 'student_id' => '18'],
            ['course_id' => '4', 'student_id' => '14'],
            ['course_id' => '4', 'student_id' => '15'],
            ['course_id' => '4', 'student_id' => '16'],
            ['course_id' => '4', 'student_id' => '17'],
            ['course_id' => '4', 'student_id' => '4'],

        ]);
        DB::table('course_notifications')->insert([
                [
                    'course_id' => '1',
                    'content' => 'chào mừng các em học sinh lớp toán 10',
                    'created_at' => '2022-11-01 08:00:00'
                ],
                [
                    'course_id' => '2',
                    'content' => 'chào mừng các em học sinh lớp toán 11',
                    'created_at' => '2022-08-01 18:00:00'
                ],
                [
                    'course_id' => '3',
                    'content' => 'chào mừng các em học sinh lớp anh 10',
                    'created_at' => '2022-08-01 15:00:00'
                ],
                [
                    'course_id' => '4',
                    'content' => 'chào mừng các em học sinh lớp anh 12',
                    'created_at' => '2022-11-01 17:00:00'
                ],
            ]
        );


    }
}

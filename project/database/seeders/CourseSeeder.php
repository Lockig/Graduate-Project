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
        Course::query()->insert([[
            'course_id'=>'1',
            'course_name'=>'Toán 10 6-8h tối T2,T4',
            'start_date'=>'2022-01-01',
            'end_date'=>'2022-04-01',
            'start_time'=>'18:00:00',
            'end_time'=>'20:00:00',
            'course_description'=>'Khóa học Toán cấp tốc cho học sinh lớp 10',
            'course_status'=>'Đang diễn ra'
        ],[
            'course_id'=>'2',
            'course_name'=>'Văn 10 3-5h chiều T2,T4',
            'start_date'=>'2022-05-01',
            'end_date'=>'2022-09-01',
            'start_time'=>'15:00:00',
            'end_time'=>'27:00:00',
            'course_description'=>'Khóa học Văn cấp tốc cho học sinh lớp 10',
            'course_status'=>'Đang diễn ra'
        ]]);

        DB::table('course_accounts')->insert([[
            'course_id'=>'1',
            'account_id'=>'2'
        ],[
            'course_id'=>'1',
            'account_id'=>'3'
        ],[
            'course_id'=>'2',
            'account_id'=>'2'
        ],[
            'course_id'=>'2',
            'account_id'=>'3'
        ]]);
        //
    }
}

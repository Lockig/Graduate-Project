<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CreateUserWorkingDetails
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        DB::table('user_working_details')->insert([
            'user_id'=>$event->user->user_id,
            'join_date'=>Carbon::now(),
            'seniority'=>'1',
            'max_day_off'=>'12',
            'day_off'=>'0'
        ]);
        //
    }
}

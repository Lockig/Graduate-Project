<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'course_schedules';
    protected $primaryKey = 'id';

    public function course()
    {
        $this->belongsTo(Course::class,'course_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'course_schedules';
    protected $primaryKey = 'id';

    protected $fillable=[
        'course_id','start_at','end_at'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','course_id');
    }
}

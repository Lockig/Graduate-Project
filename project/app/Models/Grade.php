<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'student_grades';

    protected function students(){
        $this->belongsTo(Student::class,'user_id','id');
    }
}

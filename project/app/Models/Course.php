<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class Course extends Model
{
//    use HasFactory,SoftDeletes;
    use HasFactory;
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'course_name',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'course_description',
        'course_status'
    ];

    public function user()
    {
        $this->hasMany(User::class);
    }

    public function schedule()
    {
        $this->hasMany(Schedule::class, 'course_id', 'course_id');
    }

    public function subject(){
        $this->belongsTo(Subject::class,'subject_id','subject_id');
    }

    public function scopeName($query, Request $request)
    {
        if ($request->has('course_name')) {
            return $query->where('course_name', 'like', '%' . $request->input('course_name'));
        }
        return $query;
    }

    public function scopeStatus($query, Request $request)
    {
        if ($request->has('status')) {
            return $query->where('course_status', 'like', '%' . $request->input('status'));
        }
        return $query;
    }
    public function scopeTeacher($query, Request $request)
    {
        if ($request->has('teacher')) {
            return $query->join('users', 'users.id', '=', 'courses.teacher_id')
                ->where('users.first_name' . ' ' . 'user.last_name', 'like', '%' . $request->teacher . '%')
                ->value();
        }
    }
}

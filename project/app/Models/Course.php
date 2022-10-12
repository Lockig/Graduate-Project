<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Course extends Model
{
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

    public function accounts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Account::class);
    }

    public function scopeName($query, Request $request){
        if($request->has('course_name')){
            return $query->where('course_name','like','%'.$request->input('course_name'));
        }
        return $query;
    }
    public function scopeStatus($query, Request $request){
        if($request->has('status')){
            return $query->where('course_status','like','%'.$request->input('status'));
        }
        return $query;
    }
    public function scopeTeacher($query, Request $request){
        if($request->has('teacher')){
            return $query->with('');
        }
    }
}

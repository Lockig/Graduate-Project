<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $guarded;

    public function course()
    {
        $this->hasMany(Course::class, 'subject_id', 'subject_id');
    }

    public function scopeName($query, $request)
    {
        if ($request->has('name')) {
            return $query->where('subject_id', 'like', '%' . $request->input('name') . '%')
                ->orWhere('subject_name', 'like', '%' . $request->input('name') . '%');
        }
        return $query;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'course_id',
        'course_name',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];

    public function accounts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Account::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'student_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'email',
        'mobile_number',
        'avatar',
        'address',
        'fingerprint'
    ];

    public function account()
    {
        return $this->hasOne(Account::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\ResetPassword;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'email',
        'mobile_number',
        'address',
        'role',
        'fingerprint',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function course()
    {
        $this->hasMany(Course::class);
    }

    public function scopeEmail($query, $request)
    {
        if ($request->has('email')) {
            return $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        return $query;
    }

    public function scopePassword($query, $request)
    {
        if ($request->has('password')) {
            return $query->where('password', 'like', '%' . $request->input('password') . '%');
        }
        return $query;
    }

    public function scopeName($query, $request)
    {
        if ($request->has('last_name')) {
            return $query->where('last_name', 'like', '%' . $request->input('last_name') . '%');
        }
        return $query;
    }

    public function scopeFingerprint($query, $request)
    {
        if ($request->has('fingerID')) {
            return $query->where('fingerprint', '=', $request->input('fingerID'));
        }
        return $query;
    }


}

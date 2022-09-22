<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\CreateUser;
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

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'email',
        'mobile_number',
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

    protected $dispatchesEvents = [
        'saved' => CreateUser::class
    ];

    public function position()
    {
        return $this->hasOne(Position::class, 'position_id', 'position_id');
    }

    public function account(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Account::class, 'user_id', 'user_id');
    }

    public function fingerprint()
    {
        return $this->hasOne(Fingerprint::class);
    }

    public function scopeEmail($query, $request)
    {
        if($request->has('email')){
            return $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
       return $query;
    }

    public function scopeName($query, $request)
    {
        if($request->has('last_name')){
            return $query->where('last_name' , 'like', '%' . $request->input('last_name') . '%');
        }
       return $query;
    }

}

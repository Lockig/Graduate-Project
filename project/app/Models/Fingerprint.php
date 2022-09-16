<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fingerprint extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'fingerprint_id',
        'time_in'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

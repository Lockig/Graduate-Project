<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fingerprint extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fingerprint_id',
        'add_fingerprint_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

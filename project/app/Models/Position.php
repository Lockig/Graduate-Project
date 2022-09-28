<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'position_name'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'position_id', 'position_id');
    }

    public function scopeName($query, $request)
    {
        return $query->where('position_name', 'like', '%' . $request . '%');
    }
}

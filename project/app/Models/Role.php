<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable=[
      'role_name;'
    ];

    public function account(){
        $this->hasMany(Account::class,'role_id','role_id');
    }
    public function scopeRole($query,Request $request){
        return $query->where('role_id','==',$request->role_id);
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id';
    protected $fillable=[
      'role_name'
    ];

    public function account(){
        $this->hasMany(Account::class,'role_id','role_id');
    }
    public function scopeId($query,Request $request){
        return $query->where('role_id','==',$request->role_id);
    }
    public function scopeName($query,Request $request){
        return $query->where('role_name','like','%'.$request->role_name.'%');
    }
}

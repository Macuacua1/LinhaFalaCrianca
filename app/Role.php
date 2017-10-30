<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['rolenome','designacao'];

    public function user(){
        return $this->hasMany(User::class);
//        return $this->belongsToMany(User::class,'role_user');
    }
}

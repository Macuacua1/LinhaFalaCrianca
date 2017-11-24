<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $fillable = ['nome','email','telefone','responsavel_id'];
    public function caso(){
        return $this->hasMany(Caso::class);
    }
    public function responsavel(){
        return $this->belongsTo(Responsavel::class);
    }
}

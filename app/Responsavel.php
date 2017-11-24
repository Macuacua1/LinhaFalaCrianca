<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $fillable = ['respnome','email','telefone'];

    public function caso(){
        return $this->hasMany(Caso::class);
    }
    public function instituicao(){
        return $this->hasMany(Instituicao::class);
    }
}

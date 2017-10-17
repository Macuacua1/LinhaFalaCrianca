<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable=['estado_caso','chave','estado_parceiro','motivo_id','responsavel_id','user_id'];

    public function motivo(){
        return $this->belongsTo(Motivo::class);
    }
    public function responsavel(){
        return $this->belongsTo(Responsavel::class);
    }
    public  function contacto(){
        return $this->hasMany(Contacto::class);
    }
    public function mensagem(){
        return $this->hasMany(Mensagem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}

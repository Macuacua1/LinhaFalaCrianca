<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable=['tipo_contacto','estado_contacto','desc_antecedentes','resumo_contacto','impressao_atendente'
        ,'motivo_id','tipo_motivo_id','caso_id','user_id'];

    public function motivo(){
        return $this->belongsTo(Motivo::class);
    }
    public function tipomotivo(){
        return $this->belongsTo(Tipo_Motivo::class);
    }
    public function caso(){
        return $this->belongsTo(Caso::class);
    }
    public function utente(){
        return $this->belongsToMany(Utente::class,'contacto_utente')->with('provincia','distrito','localidade');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}

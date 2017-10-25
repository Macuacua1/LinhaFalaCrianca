<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $fillable = ['tipo_utente','nome','apelido','idade','genero','idioma','anonimo'
        ,'conhecer_linha','descricao_local','cell1','cell2','descricao_utente','situacao_educacional'
        ,'vive_com','relacao_vitima','descricao_extendida','provincia_id','distrito_id','localidade_id'];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
    public function distrito(){
        return $this->belongsTo(Distrito::class);
    }
    public function localidade(){
        return $this->belongsTo(Localidade::class);
    }
    public function contacto(){
        return $this->belongsToMany(Contacto::class,'contacto_utente');
    }

}

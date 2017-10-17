<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $fillable=['motivonome','tipo_motivo_id'];

    public function tipo_motivo(){
        return $this->belongsTo(Tipo_Motivo::class);
    }
    public function caso(){
        return $this->hasMany(Caso::class);
    }
    public function contacto(){
        return $this->hasMany(Contacto::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Motivo extends Model
{
    protected $table='tipo_motivo';
    protected $fillable = ['tipomotivonome'];

    public function motivo(){
        return $this->hasMany(Motivo::class);
    }
    public function contacto(){
        return $this->hasMany(Contacto::class);
    }
}

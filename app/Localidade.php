<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $fillable = ['localidadenome', 'distrito_id'];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
    public function denuciante()
    {
        return $this->hasMany(Utente::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable = ['distritonome', 'provincia_id'];//

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
    public function localidade()
    {
        return $this->hasMany(Localidade::class);
    }
    public function utente()
    {
        return $this->hasMany(Utente::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = ['provincianome'];

    public function distrito()
    {
        return $this->hasMany(Distrito::class);
    }
    public function denuciante()
    {
        return $this->hasMany(Utente::class);
    }
}

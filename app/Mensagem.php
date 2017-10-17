<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable=['mensagem','caso_id'];

    public  function caso(){
        return $this->belongsTo(Caso::class,'caso_id');
    }
}

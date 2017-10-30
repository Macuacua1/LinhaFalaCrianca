<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
use Illuminate\Http\Request;
use Charts;
use Illuminate\Support\Facades\DB;

class ChartContactoController extends Controller
{
    public function report_contacto(){
 $teste=Contacto::with('utente','utente.provincia','utente.distrito')
//     ->where('utentes.provincia_id','<>',null)
     ->selectRaw('count(*) as total,tipo_contacto')
     ->groupBy('tipo_contacto')
     ->get();
        dd($teste);

        $motivos= DB::table('contactos')
            ->join('motivos','contactos.motivo_id','=','motivos.id')
            ->select(DB::Raw('count(*) as total,motivos.motivonome as motivo'))
            ->where('motivo_id','<>',null)
            ->groupBy('motivo')
            ->get();
        $tipos=Contacto::where('tipo_contacto','<>',null)->selectRaw('count(*) as total,tipo_contacto')
            ->groupBy('tipo_contacto')->get();
//        dd($tipos);

        return view('contacto.report_contacto',compact('motivos','tipos','chart_motivo'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Caso;
use Illuminate\Http\Request;
use Charts;

class ChartCasoController extends Controller
{
    public function reportcaso(){
        $chart_estado=Charts::database(Caso::all(),'donut', 'highcharts')
            ->title('Casos por Estado')
            ->responsive(true)
            ->groupBy('estado_caso');
        $chart_instituicao=Charts::database(Caso::all(),'pie', 'highcharts')
            ->title('Casos por Estado')
            ->responsive(true)
            ->groupBy('responsavel_id');
        $chart_motivo=Charts::database(Caso::all(),'bar', 'highcharts')
            ->title('Casos por Estado')
            ->responsive(true)
            ->groupBy('motivo_id');
        return view('caso.report_caso',compact('chart_estado','chart_instituicao','chart_motivo'));
    }
}

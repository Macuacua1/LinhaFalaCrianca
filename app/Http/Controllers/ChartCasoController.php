<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
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

    public function pesquisacaso(Request $request){
        if ($request->ajax()) {

            $output = "";

            if(isset($request->inicio) and isset($request->fim)){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->with('user','responsavel','motivo')->get();

            }
            if(isset($request->estado)){
                $casos=Caso::where('estado_caso',$request->estado)
                    ->with('user','responsavel','motivo')->get();
//                foreach ($casos as $caso) {
////                    echo $caso->user->nome;
//                    dd($caso->user->nome);
//                }


            }
            if(isset($request->responsavel_id)){
                $casos=Caso::where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->user_id)){
                $casos=Caso::where('user_id',$request->user_id)->get();

            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->responsavel_id) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo')->get();

            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->user_id) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->estado) and isset($request->responsavel_id) ){
                $casos=Caso::where('responsavel_id',$request->responsavel_id)
                    ->where('estado_caso',$request->estado)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->estado)  and isset($request->user_id) ){
                $casos=Caso::where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=Caso::where('responsavel_id',$request->responsavel_id)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->responsavel_id) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->user_id) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('responsavel_id',$request->responsavel_id)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->estado) and isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=Caso::where('responsavel_id',$request->responsavel_id)
                    ->where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo')->get();
            }
//            dd($casos);
//            return Response($casos);
                 if ($casos){
                foreach ($casos as $caso){
//                    dd($caso->user->nome);
                    $output.='<tr>'.
                        '<td>CA-'.$caso->id.'</td>'.
                        '<td>'.$caso->user->nome.'</td>'.
                        '<td>'.date('d-M-Y',strtotime($caso->created_at)).'</td>'.
                        '<td>'.date('d-M-Y',strtotime($caso->updated_at)).'</td>'.
                        '<td>'.$caso->responsavel->respnome.'</td>'.
                        '<td>'.$caso->estado_caso.'</td>';

//                        '<td>'.$caso->motivo_id ? $caso->motivo->motivonome.'</td>'.
                        if ($caso->motivo_id){
                            $output.='<td>'. $caso->motivo->motivonome.'</td>';
                        }else{
                            $output.= '<td>Sem Motivo</td>';
                        }
//
//
                       $output.='<td>'.
                        '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info" data-id="'.$caso->id.'">'.
                        '<span class="glyphicon glyphicon-eye-open"></span></button></a>'.
                        '<button class="edit-caso btn btn-success" data-id="'.$caso->id.'" data-title="'.$caso->responsavel->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important">'.
                        '<span class="glyphicon glyphicon-edit"></span></button>'.
                        '</td>'.
                    '</tr>';

                }
//               dd($output);
         return Response($output);

     }
        }

    }
    public  function addcaso(Request $request){
//        dd($request->all());
        $contacto=Contacto::find($request->contacto_id);
//        dd($contacto);
//        dd('hahahahhaha');
        if (!$contacto->caso_id){
//            dd('Nao Encaminhado ainda');
            if (isset($request->contacto_id) and isset($request->mensagem)){
                $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso']);
                $caso= Caso::create(request()->all());
                $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
                Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
            }
            if (isset($request->contacto_id)){
                $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso']);
                $caso= Caso::create(request()->all());
//                $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
                Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
            }
        }else{
            dd('Ja foi encaminhado');
        }



    }
}

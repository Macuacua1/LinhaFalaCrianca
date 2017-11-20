<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
use App\Mensagem;
use Illuminate\Http\Request;
use Charts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartCasoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function reportcaso(){

        $motivos= DB::table('casos')
            ->join('motivos','casos.motivo_id','=','motivos.id')
            ->select(DB::Raw('count(*) as total,motivos.motivonome as motivo'))
            ->where('motivo_id','<>',null)
            ->groupBy('motivo')
            ->get();

        $estados=DB::table('casos')
            ->select(DB::Raw('count(*) as total,estado_caso as estado'))
            ->groupBy('estado')
            ->get();

        $instituicaos= DB::table('casos')
            ->join('responsavels','casos.responsavel_id','=','responsavels.id')
            ->select(DB::Raw('count(*) as total,responsavels.respnome as responsavel'))
            ->where('responsavel_id','<>',null)
            ->groupBy('responsavel')
            ->get();

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
        return view('caso.report_caso',compact('chart_estado','chart_instituicao','chart_motivo','motivos','instituicaos','estados'));
    }

    public function pesquisamotivo(Request $request)
    {
        $motivos = [];
        if ($request->inicio and $request->fim) {
            $motivos = DB::table('casos')
                ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                ->select(DB::Raw('count(*) as total,motivos.motivonome as motivo'))
                ->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                ->where('motivo_id', '<>', null)
                ->groupBy('motivo')
                ->get();
            return Response($motivos);
        } else {
            return Response($motivos);
        }
    }

        public function pesquisaestado(Request $request)
        {
            $estados = [];
            if ($request->inicio and $request->fim) {
                $estados=DB::table('casos')
                    ->select(DB::Raw('count(*) as total,estado_caso as estado'))
                    ->whereBetween('created_at', [$request->inicio, $request->fim])
                    ->groupBy('estado')
                    ->get();
                return Response($estados );
            } else {
                return Response($estados );
            }
        }

            public function pesquisainstituicao(Request $request){
                $instituicaos=[];
                if ($request->inicio and $request->fim){
                    $instituicaos= DB::table('casos')
                        ->join('responsavels','casos.responsavel_id','=','responsavels.id')
                        ->select(DB::Raw('count(*) as total,responsavels.respnome as responsavel'))
                        ->whereBetween('casos.created_at',[$request->inicio,$request->fim])
                        ->where('responsavel_id','<>',null)
                        ->groupBy('responsavel')
                        ->get();

                    return Response($instituicaos);
                }else{
                    return Response($instituicaos);
                }
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
                    if($caso->motivo_id){
                        $output.='<td>'.
                            '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info" data-id="'.$caso->id.'">'.
                            '<span class="glyphicon glyphicon-eye-open"></span></button></a>'.
                            '<button class="edit-caso btn btn-success" data-id="'.$caso->id.'" data-title="'.$caso->responsavel->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important" disabled>'.
                            '<span class="glyphicon glyphicon-edit"></span></button>'.
                             '<button class="encerrar-caso btn btn-success" data-id="'.$caso->id.'" data-title="" style="margin-left:3px!important" data-description="" disabled>'.
                                            '<span class="glyphicon glyphicon-lock"></span>'.
                                        '</button>'.
                            '</td>'.
                            '</tr>';
                    }else{
                        $output.='<td>'.
                            '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info" data-id="'.$caso->id.'" style="margin-left:3px!important">'.
                            '<span class="glyphicon glyphicon-eye-open"></span></button></a>'.
                            '<button class="edit-caso btn btn-success" data-id="'.$caso->id.'" style="margin-left:3px!important" data-title="'.$caso->responsavel->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important" data-toggle="modal" data-target="#formModal">'.
                            '<span class="glyphicon glyphicon-edit"></span></button>'.
                            '<button class="encerrar-caso btn btn-success" data-id="'.$caso->id.'" data-toggle="modal" data-target="#formModall" style="margin-left:3px!important">'.
                            '<span class="glyphicon glyphicon-lock"></span>'.
                            '</button>'.
                            '</td>'.
                            '</tr>';
                    }

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
    public function chart()
    {
        $chart = Charts::multi('bar', 'material')
            // Setup the chart settings
            ->title("My Cool Chart")
            // A dimension of 0 means it will take 100% of the space
            ->dimensions(0, 400) // Width x Height
            // This defines a preset of colors already done:)
            ->template("material")
            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            ->dataset('Element 1', [5,20,100])
            ->dataset('Element 2', [15,30,80])
            ->dataset('Element 3', [25,10,40])
            // Setup what the values mean
            ->labels(['One', 'Two', 'Three']);

        return view('test', ['chart' => $chart]);
    }
//    public function editcaso(Request $request){
//        return $request->all();
//        if (isset($request->estado_caso)) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
//        }
//        if (isset($request->motivo_id)){
//            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id,'estado_caso'=>'Fechado']);
//        }
//        if ($request->responsavel_id) {
//            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
//        }
//
//        if (isset($request->estado_caso)and isset($request->responsavel_id) ) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'responsavel_id' => $request->responsavel_id]);
//        }
//        if (isset($request->estado_caso)and isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
//
//        if (isset($request->responsavel_id) and isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
//
//        if (isset($request->estado_caso) and isset($request->responsavel_id) and isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso,'responsavel_id' => $request->responsavel_id]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
//
//        if (isset($request->mensagem)){
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
//
//    }
}

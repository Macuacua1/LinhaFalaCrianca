<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
use App\Instituicao;
use App\Mail\SendCaso;
use App\Mensagem;
use App\User;
use Illuminate\Http\Request;
use Charts;
use PDF;
use Mail;
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

    public function autocomplete(Request $request){
//return $request->all();
        $instituicoes = Instituicao::where('responsavel_id',$request->instituicao)->where('nome','LIKE','%'.$request->term.'%')->take(10)
            ->get();
        $result=array();
        foreach ($instituicoes as $key =>$value){
            $result[]=['id'=>$value->id,'email'=>$value->email,'nome'=>$value->nome];
        }
        return response()->json($result);

    }

    public function pesquisacaso(Request $request){
        if ($request->ajax()) {

            $inicio=$request->inicio;
            $fim=$request->fim;
            $estado=$request->estado;
            $responsavel_id=$request->responsavel_id;
            $user_id=$request->user_id;
//return $request->all();
            $output = "";
            $casos=Caso::with(['user','responsavel','motivo']);
            if($inicio !=null and $fim !=null){
                $casos=$casos->whereBetween('created_at',[$inicio,$fim])->orderBy('created_at','desc');
            }
            if($estado !=null){
                $casos=$casos->where('estado_caso',$estado)->orderBy('created_at','desc');
            }
            if($responsavel_id !=null){
                $casos=$casos->where('responsavel_id',$responsavel_id)->orderBy('created_at','desc');
            }
            if($user_id !=null){
                $casos=$casos->where('user_id',$user_id)->orderBy('created_at','desc');
            }
            $casos=$casos->get();
//            $casos=$casos->orderBy('created_ad','desc');

                 if ($casos){
                foreach ($casos as $caso){
//                    dd($caso->user->nome);
                    $output.='<tr>'.
                        '<td>'.$caso->id.'</td>'.
                        '<td>'.$caso->user->nome.'</td>'.
                        '<td>'.date('d-M-Y',strtotime($caso->created_at)).'</td>'.
                        '<td>'.date('d-M-Y',strtotime($caso->updated_at)).'</td>'.
                        '<td>'.$caso->created_at->diffForHumans().'</td>'.
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
                            '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info btn-sm" data-id="'.$caso->id.'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver detalhes do caso">'.
                            '<i class="fa fa-eye" aria-hidden="true"></i></button></a>'.
                            '<a href="'.route('contacto.edit',$caso->id).'"><button class="btn btn-primary btn-sm" data-id="'.$caso->id.'" style="margin-left:3px!important" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Registar Contacto">
                                            <i class="fa fa-phone" aria-hidden="true"></i></button></a>'.
                            '<button class="edit-caso btn btn-success btn-sm" data-id="'.$caso->id.'" data-title="'.$caso->responsavel->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important" disabled>'.
                            '<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>'.
                             '<button class="encerrar-caso btn btn-success btn-sm" data-id="'.$caso->id.'" data-title="" style="margin-left:3px!important" data-description="" disabled>'.
                            '<i class="fa fa-lock" aria-hidden="true"></i>'.
                            '</button>'.
                            '</td>'.
                            '</tr>';
                    }else{
                        $output.='<td>'.
                            '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info btn-sm" data-id="'.$caso->id.'" style="margin-left:3px!important" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver detalhes do caso">'.
                            '<i class="fa fa-eye" aria-hidden="true"></i></button></a>'.
                            '<a href="'.route('contacto.edit',$caso->id).'"><button class="btn btn-primary btn-sm" data-id="'.$caso->id.'" style="margin-left:3px!important" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Registar Contacto">
                                            <i class="fa fa-phone" aria-hidden="true"></i></button></a>'.
                            '<button class="edit-caso btn btn-success btn-sm" data-id="'.$caso->id.'" style="margin-left:3px!important" data-title="'.$caso->responsavel->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important" data-toggle="modal" data-target="#formModal">'.
                            '<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>'.
                            '<button class="encerrar-caso btn btn-success btn-sm" data-id="'.$caso->id.'" data-toggle="modal" data-target="#formModall" style="margin-left:3px!important">'.
                            '<i class="fa fa-lock" aria-hidden="true"></i>'.
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
//        return $request->all();
        if (isset($request->novoid)){
            $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso','instituicao_id'=>$request->novoid]);
        }else{
            $inst=Instituicao::create($request->all());
            $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso','instituicao_id'=>$inst->id]);
        }
        if (isset($request->contacto_id) and isset($request->mensagem)){
            $caso= Caso::create(request()->all());
            $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
            Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
        }
        if (isset($request->contacto_id)){
            $caso= Caso::create(request()->all());
            Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
        }
        if ($request->email){
            Mail::send(new SendCaso());
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

}

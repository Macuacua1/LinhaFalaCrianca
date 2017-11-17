<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
use App\Distrito;
use App\Provincia;
use App\Utente;
use Illuminate\Http\Request;
use Charts;
use Illuminate\Support\Facades\DB;

class ChartContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pesquisapro(Request $request){
        $provincias=[];
        if ($request->inicio and $request->fim){
        $provincias=DB::table('utentes')
            ->join('provincias','utentes.provincia_id','=','provincias.id')
            ->select(DB::raw('count(*) as total,provincias.provincianome as provincia'))
            ->whereBetween('utentes.created_at',[$request->inicio,$request->fim])
            ->where('provincia_id','<>',null)
            ->where(function ($q){
                $q->where('tipo_utente','Vitima')
               ->orWhere('tipo_utente','Contactante+Vitima');

            })
            ->groupBy('provincia')->get();
            return Response($provincias);
        }else{
            return Response($provincias);
        }

    }
    public function pesquisadist(Request $request){
        $data=[];
        if ($request->id) {
            $data = DB::table('utentes')
                ->join('distritos', 'utentes.distrito_id', '=', 'distritos.id')
                ->select(DB::raw('count(*) as total,distritos.distritonome as distrito'))
                ->where('distrito_id', '<>', null)
                ->where('distritos.provincia_id', $request->id)
                ->where(function ($q) {
                    $q->where('tipo_utente', 'Vitima')
                        ->orWhere('tipo_utente', 'Contactante+Vitima');
                })
                ->groupBy('distrito')->get();
        }

        if ($request->id and $request->inicio and $request->fim) {
            $data = DB::table('utentes')
                ->join('distritos', 'utentes.distrito_id', '=', 'distritos.id')
                ->select(DB::raw('count(*) as total,distritos.distritonome as distrito'))
                ->whereBetween('utentes.created_at',[$request->inicio,$request->fim])
                ->where('distrito_id', '<>', null)
                ->where('distritos.provincia_id', $request->id)
                ->where(function ($q) {
                    $q->where('tipo_utente', 'Vitima')
                        ->orWhere('tipo_utente', 'Contactante+Vitima');
                })
                ->groupBy('distrito')->get();
        }
            return response()->json($data);//then sent this data to ajax success
    }

    public function pesquisatipo(Request $request){
        $tipos=[];
        if ($request->inicio and $request->fim){
            $tipos=Contacto::where('tipo_contacto','<>',null)
                ->whereBetween('created_at',[$request->inicio,$request->fim])
                ->selectRaw('count(*) as total,tipo_contacto')
                ->groupBy('tipo_contacto')->get();

            return Response($tipos);
        }else{
            return Response($tipos);
        }

    }
    public function pesquisamotivo(Request $request){
        $motivos=[];
        if ($request->inicio and $request->fim){
            $motivos= DB::table('contactos')
                ->join('motivos','contactos.motivo_id','=','motivos.id')
                ->select(DB::Raw('count(*) as total,motivos.motivonome as motivo'))
                ->whereBetween('contactos.created_at',[$request->inicio,$request->fim])
                ->where('motivo_id','<>',null)
                ->groupBy('motivo')
                ->get();
            return Response($motivos);
        }else{
            return Response($motivos);
        }
    }
    public function pesquisaidade(Request $request){
        $idades=[];
        if ($request->inicio and $request->fim){
            $idades=DB::table('utentes')
                ->select(DB::raw('count(*) as total,idade'))
                ->whereBetween('created_at',[$request->inicio,$request->fim])
                ->where(function ($q) {
                    $q->where('tipo_utente','Vitima')
                        ->orWhere('tipo_utente','Contactante+Vitima');
                })
                ->groupBy('idade')->get();
            return Response($idades);
        }else{
            return Response($idades);
        }

    }
    public function pesquisagenero(Request $request){
        $generos=[];
        if ($request->inicio and $request->fim){
            $generos=DB::table('utentes')
                ->select(DB::raw('count(*) as total,genero'))
                ->whereBetween('created_at',[$request->inicio,$request->fim])
                ->where(function ($q) {
                    $q->where('tipo_utente','Vitima')
                        ->orWhere('tipo_utente','Contactante+Vitima');
                })
                ->groupBy('genero')->get();
            return Response($generos);
        }else{
            return Response($generos);
        }

    }
    public function report_contacto(){
//      $dist=Utente::with('distrito')->where('tipo_utente','Vitima')
//                ->orWhere('tipo_utente','Contactante+Vitima')
//          ->selectRaw('count(*) as total,distrito.distritonome')
//           ->groupBy('distrito.distritonome')
//          ->get();
//        $input='Funhalouro';
//        $qry = Utente::with(array('distrito' => function ($q) use ($input) {
////            $q->where('distritonome','like',"%{$input}%");
//        }))->whereHas('distrito', function ($q) use ($input) {
//            $q->where('distritonome','like',"%{$input}%")
//                ->groupBy('distritonome');
//        });
//
//        $res = $qry->get();

        $prov=Provincia::all();

        $provincias=DB::table('utentes')
            ->join('provincias','utentes.provincia_id','=','provincias.id')
            ->select(DB::raw('count(*) as total,provincias.provincianome as provincia'))
            ->where('provincia_id','<>',null)
            ->where('tipo_utente','Vitima')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->groupBy('provincia')->get();
//        dd($provincias);

//        if ($provincias !=null){
////            $charData= new array(count($provincias)+1);
//            $charData = new \SplFixedArray(count($provincias)+1);
//            $charData[0]=["provincia","total"];
//            $j=0;
////            $data=(object)$provincias;
//            $data=json_decode($provincias,true);
//            foreach ($data as $key=>$value){
//                $j++;
//                $charData[$j]=([$data[$key]['provincia'],$data[$key]['total']]);
////  dd($data[$key]['provincia']);
//            }
//        }
//        $dados=(object)($charData);
//        return response()->json($charData);
//       return Response($provincias);

        $distritos=DB::table('utentes')
            ->join('distritos','utentes.distrito_id','=','distritos.id')
            ->select(DB::raw('count(*) as total,distritos.distritonome as distrito'))
            ->where('distrito_id','<>',null)
            ->where('tipo_utente','Vitima')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->groupBy('distrito')->get();

        $idades=DB::table('utentes')
            ->select(DB::raw('count(*) as total,idade'))
            ->where('tipo_utente','Vitima')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->groupBy('idade')->get();

        $generos=DB::table('utentes')
            ->select(DB::raw('count(*) as total,genero'))
            ->where('tipo_utente','Vitima')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->groupBy('genero')->get();
//        return response()->json(['aaa'=>$generos]);


        $motivos= DB::table('contactos')
            ->join('motivos','contactos.motivo_id','=','motivos.id')
            ->select(DB::Raw('count(*) as total,motivos.motivonome as motivo'))
            ->where('motivo_id','<>',null)
            ->groupBy('motivo')
            ->get();
        $tipos=Contacto::where('tipo_contacto','<>',null)->selectRaw('count(*) as total,tipo_contacto')
            ->groupBy('tipo_contacto')->get();

        return view('contacto.report_contacto',compact('motivos','tipos','chart_motivo','idades','distritos','prov','generos','provincias'));
    }
    public function pesquisacontacto(Request $request){
        if ($request->ajax()) {

            $output = "";
// return $request->all();
//            dd($request->except(['start','end','estado_caso']));
                 $estado=$request->estado_caso;
//                 $inicio=$request->start;
//                 $fim=$request->end;

//            $gadgets = Contacto::with(['caso'=>function($query){
//              $query->where('estado_caso','Assistido');
//            }])->whereBetween('created_at',[$inicio,$fim])->where('caso_id','<>',null)->get();
////            foreach ($request->except(['start','end','estado_caso']) as $key => $parameter) {
////                if($parameter != ''){
////                    $gadgets = $gadgets->where($key, '=', $parameter);
////                }
////            }
////            $gadgets = $gadgets->get();
//            return $gadgets;
//        if (isset($inicio) or isset($fim) or isset($estado) or isset($request->responsavel_id)){
        if (isset($estado) or isset($request->responsavel_id)){
          dd($request->only(['start','end','estado_caso','responsavel_id']));
        }

            else{
//                $contacts= new Contacto();
                $contacts= Contacto::whereBetween('created_at',[$request->start,$request->end])->get();
//               return $contacts;
                foreach ($request->except(['start','end','estado_caso','responsavel_id']) as $key => $parameter) {
                    if($parameter != ''){
                        $gadgets =  $contacts->where($key, '=', $parameter);
                    }
                }
                $gadget = $gadgets->get();
               return $gadget;
            }





            if(isset($request->start) and isset($request->end)){
                $contactos=Contacto::whereBetween('created_at',[$request->start,$request->end])
                    ->with('user','caso.responsavel','motivo','utente')->get();
            }
            if(isset($request->estado)){
                $contactos=Contacto::where('estado_caso',$request->estado)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->responsavel_id)){
                $contactos=Contacto::where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->user_id)){
                $contactos=Contacto::where('user_id',$request->user_id)->get();

            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->responsavel_id) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo','utente')->get();

            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->user_id) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->estado) and isset($request->responsavel_id) ){
                $contactos=Contacto::where('responsavel_id',$request->responsavel_id)
                    ->where('estado_caso',$request->estado)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->estado)  and isset($request->user_id) ){
                $casos=Caso::where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->responsavel_id) and isset($request->user_id) ){
                $contactos=Contacto::where('responsavel_id',$request->responsavel_id)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->responsavel_id) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->user_id) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->responsavel_id) and isset($request->user_id) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('responsavel_id',$request->responsavel_id)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->estado) and isset($request->responsavel_id) and isset($request->user_id) ){
                $contactos=Contacto::where('responsavel_id',$request->responsavel_id)
                    ->where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->responsavel_id) and isset($request->user_id) ){
                $contactos=Contacto::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->where('estado_caso',$request->estado)
                    ->where('user_id',$request->user_id)
                    ->where('responsavel_id',$request->responsavel_id)
                    ->with('user','responsavel','motivo','utente')->get();
            }
//            dd($contactos);
//            return Response ($casos);
            if ($contactos){
                foreach ($contactos as $contacto){
//                    dd($contacto->user->nome);
                    $output.='<tr>'.
                        '<td>CO-'.$contacto->id.'</td>'.
                        '<td>'.$contacto->tipo_contacto.'</td>'.
                        '<td>'.date('d-M-Y',strtotime($contacto->created_at)).'</td>'.
                        '<td>'.$contacto->user->nome.'</td>'.
                        '<td>'.$contacto->resumo_contacto.'</td>'.
                        '<td>'.$contacto->motivo->motivonome.'</td>';

//                        '<td>'.$caso->motivo_id ? $caso->motivo->motivonome.'</td>'.
                    if ($contacto->caso_id){
                        $output.='<td>'. $contacto->caso->estado_caso.'</td>';
                    }else{
                        $output.= '<td>Nao Encaminhado</td>';
                    }
//
//
                    $output.='<td>'.
                        '<a href="'.route('contacto.show',$contacto->id).'"><button class="btn btn-info" data-id="{{$contacto->id}}" data-title="" data-description="">'.
                        '<span class="glyphicon glyphicon-eye-open"></span></button></a>'.
                        '<button class="fwd-caso btn btn-success" data-id="{{$contacto->id}}" data-title="" data-description="">'.
                        '<span class="glyphicon glyphicon-forward"></span></button>'.
                        '</td>'.
                        '</tr>';

                }
//               dd($output);
                return Response($output);

            }
        }

    }

}

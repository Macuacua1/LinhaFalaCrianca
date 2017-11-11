<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
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
        $provincias=DB::table('utentes')
            ->join('provincias','utentes.provincia_id','=','provincias.id')
            ->select(DB::raw('count(*) as total,provincias.provincianome as provincia'))
            ->where('provincia_id','<>',null)
            ->where('tipo_utente','Vitima')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->whereBetween('utentes.created_at',[$request->inicio,$request->fim])
            ->groupBy('provincia')->get();
        return Response($provincias);
//                if ($provincias !=null){
//////            $charData= new array(count($provincias)+1);
//            $charData = new \SplFixedArray(count($provincias)+1);
//            $charData[0]=["provincia","total"];
//            $j=0;
////            $data=(object)$provincias;
//            $data=json_decode($provincias,true);
//            foreach ($data as $key=>$value){
//                $j++;
//                $charData[$j]=([$data[$key]['provincia'],$data[$key]['total']]);
//////  dd($data[$key]['provincia']);
//            }
//        }
//        $dados=(object)($charData);
//        return response()->json($dados);
//       return Response($provincias);

    }
    public function report_contacto(){
// $teste=Contacto::with('utente','utente.provincia','utente.distrito')
//     ->where('utentes.provincia_id','<>',null)
//     ->selectRaw('count(*) as total,tipo_contacto')
//     ->groupBy('tipo_contacto')
//     ->get();
//
//        $teste=Contacto::with([
//            'utente'=>function($query){
//
//            }
//        ])
//     ->get();
//        dd($teste);
//        $test=Contacto::with(['motivo' => function($query){
//            $query->where('id',22);
//        }])->where('motivo_id',22)->get();

//        return response()->json(['aaa'=>$teste]);

        $prov=Provincia::all();
//        if ($provincias){
//            $provincias->load(['denuciante' => function ($query) {
//                $query->where('tipo_utente','<>','Contactante')->whereHas('provincia')->orderBy('created_at', 'desc');
//            }]);}
//        dd($provincias);
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

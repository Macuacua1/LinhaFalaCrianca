<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
use App\Mensagem;
use App\Responsavel;
use App\Tipo_Motivo;
use App\User;
use Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CasoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $resps=Responsavel::all();
        $users=User::all();
        $tipomotivos=Tipo_Motivo::all();
        $casos=Caso::orderBy('created_at','desc')->paginate(5);
        return view('caso/index',compact('casos','tipomotivos','resps','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resps=Responsavel::all();
return view('caso.reg_caso',compact('resps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $casos=Caso::find($id);
        $msgs=Mensagem::where('caso_id',$id)->get();
//        dd($msgs);
        return view('caso.detalhes',compact('msgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd('hahahahhahahha');
////        $contacto=Contacto::find($id);
//        dd($request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function criarcaso($id){
        $contacto_id=$id;
        $resps=Responsavel::all();
        return view('caso.reg_caso',compact('resps'),compact('contacto_id'));
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
    public function editcaso(Request $request){
//       dd($request->all());
        if (isset($request->estado_caso)) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
        }
        if (isset($request->motivo_id)){
            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id,'estado_caso'=>'Fechado']);
        }
        if ($request->responsavel_id) {
            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
        }
//        if (isset($request->estado_caso)and isset($request->motivo_id)) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id]);
//        }
        if (isset($request->estado_caso)and isset($request->responsavel_id) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'responsavel_id' => $request->responsavel_id]);
        }
        if (isset($request->estado_caso)and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
//        if (isset($request->motivo_id)  and isset($request->responsavel_id) ) {
//            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id]);
//        }
//        if (isset($request->motivo_id) and  isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
        if (isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
//        if (isset($request->estado_caso)and isset($request->motivo_id)  and isset($request->responsavel_id) ) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id, 'responsavel_id' => $request->responsavel_id]);
//        }
//        if (isset($request->estado_caso)and isset($request->motivo_id)  and isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
        if (isset($request->estado_caso) and isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso,'responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
//        if (isset($request->motivo_id) and isset($request->motivo_id) and isset($request->responsavel_id) and isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id, 'responsavel_id' => $request->responsavel_id]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }

//        if (isset($request->estado_caso)and isset($request->motivo_id) and isset($request->responsavel_id) and isset($request->mensagem) ) {
//            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id, 'responsavel_id' => $request->responsavel_id]);
//            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
//        }
            if (isset($request->mensagem)){
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }

    }

    public function pesquisarcaso(Request $request){
        if ($request->ajax()){

            $output="";

            if(isset($request->inicio) and isset($request->fim)){
                $casos=Caso::whereBetween('created_at',[$request->inicio,$request->fim])
                    ->with('user','responsavel','motivo')->get();
//                $casos=DB::table('casos')
//                    ->whereBetween('casos.created_at',[$request->inicio,$request->fim])
//                    ->join('users','users.id', '=', 'casos.user_id')
//                    ->join('responsavels','responsavels.id','=','casos.responsavel_id')
//                    ->join('motivos','motivos.id','=','casos.motivo_id')
//                    ->select('casos.*','users.nome as nome','responsavels.respnome as respnome','motivos.motivonome as motivo')
//                    ->get();

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

            return Response($casos);
//dd($casos);
//     if ($casos){
//                foreach ($casos as $caso){
//                    $output.='<tr>'.
//                        '<td>'.$caso->id.'</td>'.
//                        '<td>shsh</td>'.
//                        '<td>ddd</td>'.
//                        '<td>dd</td>'.
//                        '<td>dd</td>'.
//                        '<td>dd</td>'.
//                        '<td>dd</td>'.
//                        '<td>ddd</td>'
//                             .'</tr>';
////                    dd($caso->user->nome);
////                    $output.='<tr>'.
////                        '<td>CA-'.$caso->id.'</td>'.
////                        '<td>'.$caso->user->nome.'</td>'.
////                        '<td>'.date('d-M-Y',strtotime($caso->created_at)).'</td>'.
////                        '<td>'.date('d-M-Y',strtotime($caso->updated_at)).'</td>'.
////                        '<td>'.$caso->responsavel->respnome.'</td>'.
////                        '<td>'.$caso->estado_caso.'</td>';
////
//////                        '<td>'.$caso->motivo_id ? $caso->motivo->motivonome.'</td>'.
////                        if ($caso->motivo_id){
////                            $output.='<td>'. $caso->motivo->motivonome.'</td>';
////                        }else{
////                            $output.= '<td>Sem Motivo</td>';
////                        }
////
////
////                       $output.='<td>'.
////                        '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info" data-id="'.$caso->id.'">'.
////                        '<span class="glyphicon glyphicon-eye-open"></span></button></a>'.
////                        '<button class="edit-caso btn btn-success" data-id="'.$caso->id.'" data-title="'.$caso->responsavel->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important">'.
////                        '<span class="glyphicon glyphicon-edit"></span></button>'.
////                        '</td>'.
////                    '</tr>';
//
//                }
////               echo json_encode($casos);
//         return Response($output);

//     }
//           }else{
//
//         $output.='<tr>'.
//                 '</tr>';
//            }
//            dd($output);
//            dd($output);
//            return Response($output);
        }
    }
//    public function report_caso(){
//        return view('caso.report_caso',compact('chart_estado'));
//    }

}

<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Contacto;
use App\Mensagem;
use App\Responsavel;
use App\Tipo_Motivo;
use App\User;
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
        $casos=Caso::orderBy('created_at','desc')->paginate(5);
//        paginate(5);
        $tipomotivos=Tipo_Motivo::all();
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
//        $contacto=Contacto::find($id);
//        dd($contacto);
//        dd('hahahahhahahha');
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
        $contacto=Contacto::find($request->contacto_id);
        if ($contacto->caso_id){
            dd('Tem Caso Id');
        }else{
            $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Registado','chave'=>1]);
            $caso= Caso::create(request()->all());
            $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
            Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
        }



    }
    public function editcaso(Request $request){
//       dd($request->all());
        if (isset($request->estado_caso)) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
        }
        if (isset($request->motivo_id)  ) {
            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id]);
        }
        if (isset($request->responsavel_id)) {
            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
        }
        if (isset($request->estado_caso)and isset($request->motivo_id)) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id]);
        }
        if (isset($request->estado_caso)and isset($request->responsavel_id) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'responsavel_id' => $request->responsavel_id]);
        }
        if (isset($request->estado_caso)and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
        if (isset($request->motivo_id)  and isset($request->responsavel_id) ) {
            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id]);
        }
        if (isset($request->motivo_id) and  isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
        if (isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
        if (isset($request->estado_caso)and isset($request->motivo_id)  and isset($request->responsavel_id) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id, 'responsavel_id' => $request->responsavel_id]);
        }
        if (isset($request->estado_caso)and isset($request->motivo_id)  and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
        if (isset($request->estado_caso) and isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso,'responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
        if (isset($request->motivo_id) and isset($request->motivo_id) and isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['motivo_id' => $request->motivo_id, 'responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }

        if (isset($request->estado_caso)and isset($request->motivo_id) and isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'motivo_id' => $request->motivo_id, 'responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
            if (isset($request->mensagem)){
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }

    }
    public function pesquisarcaso(Request $request){
        if ($request->ajax()){
            $output="";
//            dd($request->all());
            if(isset($request->inicio) and isset($request->fim)){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->estado)){
                $casos=DB::table('casos')->where('casos.estado_caso', $request->estado)
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->responsavel_id)){
                $casos=DB::table('casos')->where('casos.responsavel_id', $request->responsavel_id)
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->user_id)){
                $casos=DB::table('casos')->where('casos.user_id', $request->user_id)
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where('casos.estado_caso', $request->estado)
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->responsavel_id) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where('casos.responsavel_id', $request->responsavel_id)
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->user_id) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where('casos.user_id', $request->user_id)
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->estado) and isset($request->responsavel_id) ){
                $casos=DB::table('casos')->where(['casos.responsavel_id', $request->responsavel_id],['casos.estado_caso', $request->estado])
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->estado)  and isset($request->user_id) ){
                $casos=DB::table('casos')->where(['casos.estado_caso',$request->estado],['casos.user_id', $request->user_id])
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=DB::table('casos')->where(['casos.responsavel_id',$request->responsavel_id],['casos.user_id', $request->user_id])
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->responsavel_id) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where(['casos.estado_caso', $request->estado],['casos.responsavel_id', $request->responsavel_id])
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->user_id) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where(['casos.estado_caso', $request->estado],['casos.user_id', $request->user_id])
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where(['casos.responsavel_id', $request->responsavel_id],['casos.user_id', $request->user_id])
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->estado) and isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=DB::table('casos')->where(['casos.responsavel_id',$request->responsavel_id],['casos.estado_caso', $request->estado],['casos.user_id', $request->user_id])
//                    ->orWhere()
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }
            if(isset($request->inicio) and isset($request->fim) and isset($request->estado) and isset($request->responsavel_id) and isset($request->user_id) ){
                $casos=DB::table('casos')->whereBetween('casos.created_at', [$request->inicio, $request->fim])
                    ->where(['casos.estado_caso', $request->estado],['casos.user_id', $request->user_id],['casos.responsavel_id', $request->responsavel_id])
//                    ->orWhere()
//                    ->orWhere()
                    ->join('responsavels', 'casos.responsavel_id', '=', 'responsavels.id')
                    ->join('users', 'casos.user_id', '=', 'users.id')
                    ->join('motivos', 'casos.motivo_id', '=', 'motivos.id')
                    ->select('casos.*', 'responsavels.respnome as respnome','users.nome as insertby','motivos.motivonome as motivonome')
                    ->get();
            }


     if ($casos){
                foreach ($casos as $caso){
                    $output.='<tr>'.
                        '<td>CA-'.$caso->id.'</td>'.
                        '<td>'.$caso->insertby.'</td>'.
                        '<td>'.date('d-M-Y',strtotime($caso->created_at)).'</td>'.
                        '<td>'.date('d-M-Y',strtotime($caso->updated_at)).'</td>'.
                        '<td>'.$caso->respnome.'</td>'.
                        '<td>'.$caso->estado_caso.'</td>'.
                        '@if('.$caso->motivo_id.')'.
                        '<td>'.$caso->motivonome.'</td>'.
                        '@else'.
                            '<td>Sem Motivo</td>'.
                      '@endif'.
                        '<td>'.
                        '<a href="'.route('caso.show',$caso->id).'"><button class="btn btn-info" data-id="'.$caso->id.'">'.
                        '<span class="glyphicon glyphicon-eye-open"></span></button></a>'.
                        '<button class="edit-caso btn btn-success" data-id="'.$caso->id.'" data-title="'.$caso->respnome.'" data-description="'.$caso->responsavel_id.'" style="margin-left:3px!important">'.
                        '<span class="glyphicon glyphicon-edit"></span></button>'.
                        '</td>'
                        .                   '</tr>';
                }
                return Response($output);
            }
        }
    }
}

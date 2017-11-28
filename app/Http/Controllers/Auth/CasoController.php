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
        $casos=Caso::all();
        $resps=Responsavel::all();
        return view('caso/index',compact('casos','tipomotivos','resps','users','resps'));
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

        if (isset($request->estado_caso)and isset($request->responsavel_id) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso, 'responsavel_id' => $request->responsavel_id]);
        }
        if (isset($request->estado_caso) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }

        if (isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }

        if (isset($request->estado_caso) and isset($request->responsavel_id) and isset($request->mensagem) ) {
            Caso::where('id', $request->caso_id)->update(['estado_caso' => $request->estado_caso,'responsavel_id' => $request->responsavel_id]);
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }
//          $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
            if (isset($request->mensagem)){
            $mensagem=Mensagem::create(['caso_id'=>$request->caso_id,'mensagem'=>$request->mensagem]);
        }

    }

    public function pesquisarcaso(Request $request)
    {
    }

}

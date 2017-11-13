<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Motivo;
use App\Provincia;
use App\Responsavel;
use App\Role;
use App\Tipo_Motivo;
use App\User;
use App\Utente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Session;
use Charts;

class ContactoController extends Controller
{
//private $tipo_contacto;
    public function __construct()
    {
//        $tipo_contacto="";
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function destroySession(){
        if(Session::has('utentes')) {
            Session::forget('utentes');}
        return back();

    }
    public function index()
    {

        $resps=Responsavel::all();
        $provs=Provincia::all();
        $users=User::all();
        $tipomotivos=Tipo_Motivo::all();
        $contactos=Contacto::orderBy('created_at','desc')->get();
        return view('contacto/index',compact('contactos','resps','provs','users','tipomotivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prov=Provincia::all();//get data from table
        $tipos= Tipo_Motivo::where('tipomotivonome','Atendimento')->first();
        $motivos=Motivo::where('tipo_motivo_id',$tipos->id)->get();
        $tipomotivos=Tipo_Motivo::all();
        $tipo_contacto="";
        $roles=Role::all();
        return view('contacto/registo',compact('prov','tipomotivos','motivos','roles','tipo_contacto'));//sent data to view

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactos=Contacto::find($id);
        $prov=Provincia::all();
        $tipomotivos= Tipo_Motivo::all();
//       return view('admin.contacto.show',compact('contacto'));
        return view('contacto.detalhes',compact('contactos','tipomotivos','prov'));
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
        //
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
    public function addUtente(Request $request){
        $notification = array(
            'message' => 'Adicioado com Sucesso!',
            'alert-type' => 'success'
        );
        $noterro = array(
            'message' => 'Seleccione o tipo de utente!',
            'alert-type' => 'error'
        );
//        dd($request->all());
        if ($request->tipo_utente){

            $tipo_contacto=$request->tipo_contact;
            $request->session()->put('tipocontacto',$request->tipo_contact);
            $request->session()->save();
//            dd(count(Session::get('tipocontacto')));
            $utentes= ['tipo_utente'=>$request->tipo_utente,'nome'=>$request->nome,'apelido'=>$request->apelido,'idade'=>$request->idade
                ,'genero'=>$request->genero,'idioma'=>$request->idioma,'conhecer_linha'=>$request->conhecer_linha,'descricao_local'=>$request->descricao_local,'vive_com'=>$request->vive_com
                ,'cell1'=>$request->cell1,'cell2'=>$request->cell2,'provincia_id'=>$request->provincia_id,'distrito_id'=>$request->distrito_id,'situacao_educacional'=>$request->situacao_educacional
                ,'relacao_vitima'=>$request->relacao_vitima,'descricao_extendida'=>$request->descricao_extendida,'localidade_id'=>$request->localidade_id];

            if($request->session()->has('utentes')) {
                $request->session()->push('utentes', $utentes);
                $request->session()->save();
            }else{
                $request->session()->push('utentes', $utentes);
                $request->session()->save();
            }
            return back()->with($notification);
        }else{
            return back()->with($noterro);
        }

    }
    public function addcontacto(Request $request){
        $notification = array(
            'message' => 'Registado com Sucesso!',
            'alert-type' => 'success'
        );
        $noterro = array(
            'message' => 'Adicione pelo menos um  utente!',
            'alert-type' => 'error'
        );
        $contacto=Contacto::create(['tipo_contacto'=>$request->tipo_contacto,'estado_contacto'=>'Registado',
            'desc_antecedentes'=>$request->desc_antecedentes,'resumo_contacto'=>$request->resumo_contacto,
            'impressao_atendente'=>$request->impressao_atendente,'motivo_id'=>$request->motivo_id,'user_id'=>Auth::user()->id]);
        if(Session::has('utentes')) {

            $utentes=Session::get('utentes');

            foreach($utentes as $value=>$key){
                $pessoa=new Utente();
               $pessoa->tipo_utente=$utentes[$value]['tipo_utente'];
                $pessoa->apelido=$utentes[$value]['apelido'];
                $pessoa->idade=$utentes[$value]['idade'];
                $pessoa->nome=$utentes[$value]['nome'];
                $pessoa->genero=$utentes[$value]['genero'];
                $pessoa->idioma=$utentes[$value]['idioma'];
                $pessoa->conhecer_linha=$utentes[$value]['conhecer_linha'];
                $pessoa->descricao_local=$utentes[$value]['descricao_local'];
                $pessoa->cell1=$utentes[$value]['cell1'];
                $pessoa->cell2=$utentes[$value]['cell2'];
                $pessoa->provincia_id=$utentes[$value]['provincia_id'];
                $pessoa->distrito_id=$utentes[$value]['distrito_id'];
                $pessoa->localidade_id=$utentes[$value]['localidade_id'];
                $pessoa->situacao_educacional=$utentes[$value]['situacao_educacional'];
                $pessoa->vive_com=$utentes[$value]['vive_com'];
                $pessoa->relacao_vitima=$utentes[$value]['relacao_vitima'];
//               $pessoa->descricao_extendida=$utentes[$value]['descricao_extendida'];

                $pessoa->save();
                $contacto->utente()->attach($pessoa->id);
                Session::forget('utentes');
                Session::forget('tipocontacto');
            }
            return back()->with($notification);
        }else{
            return back()->with($noterro);
        }

    }



    public function report_contacto(){

        return view('contacto.report_contacto',compact('chart_provincia'));

    }
    public function editcontacto(Request $request){
      $contacto=  Contacto::where('id', $request->contacto_id)->update(['tipo_contacto' => $request->tipo_contacto,
            'motivo_id' => $request->motivo_id,'resumo_contacto' => $request->resumo_contacto,
            'impressao_atendente' => $request->impressao_atendente]);
        return Response($contacto);
    }
    public function editutente(Request $request){
//        return $request->all();
        if ($request->utente_id !=0){
            foreach ($request->utente_id as $key=>$value){
                $utente=  Utente::where('id', $value)->update(['tipo_utente' => $request->tipo_utente[$key],
            'nome'=> $request->nome[$key],'apelido'=> $request->apelido[$key],'idade'=> $request->idade[$key],'genero'=> $request->genero[$key],
            'idioma'=> $request->idioma[$key],'conhecer_linha'=> $request->conhecer_linha[$key],'descricao_local'=> $request->descricao_local[$key],
            'cell1'=> $request->cell1[$key],'cell2'=> $request->cell2[$key],'situacao_educacional'=> $request->situacao_educacional[$key]
            ,'vive_com'=> $request->vive_com[$key],'relacao_vitima'=> $request->relacao_vitima[$key],'provincia_id'=> $request->provincia_id[$key],
            'distrito_id'=> $request->distrito_id[$key],'localidade_id'=> $request->localidade_id[$key]]);
        return Response($utente);
            }
        }
//        $utente=  Utente::where('id', $request->utente_id)->update(['tipo_utente' => $request->tipo_utente,
//            'nome'=> $request->nome,'apelido'=> $request->apelido,'idade'=> $request->idade,'genero'=> $request->genero,
//            'idioma'=> $request->idioma,'conhecer_linha'=> $request->conhecer_linha,'descricao_local'=> $request->descricao_local,
//            'cell1'=> $request->cell1,'cell2'=> $request->cell2,'situacao_educacional'=> $request->situacao_educacional
//            ,'vive_com'=> $request->vive_com,'relacao_vitima'=> $request->relacao_vitima,'provincia_id'=> $request->provincia_id,
//            'distrito_id'=> $request->distrito_id,'localidade_id'=> $request->localidade_id]);
//        return Response($utente);
    }
}

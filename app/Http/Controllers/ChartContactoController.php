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
            $inicio=$request->start;
            $fim=$request->end;
            $estado_caso=$request->estado_caso;
            $responsavel_id=$request->responsavel_id;
            $user_id=$request->user_id;
            $provincia_id=$request->provincia_id;
            $distrito_id=$request->distrito_id;
            $localidade_id=$request->localidade_id;
            $motivo_id=$request->motivo_id;

            $output = "";
//            $output='<td>Tabela Vazia</td>';

            $contactos=Contacto::with(['user','utente','motivo','caso']);
            if($inicio !=null and $fim !=null){
                $contactos=$contactos ->whereBetween('created_at',[$inicio,$fim]);
            }
            if($inicio !=null and $fim !=null){
                $contactos=$contactos ->whereBetween('created_at',[$inicio,$fim]);
            }
            if($estado_caso !=null){
                $contactos=$contactos ->whereHas('caso', function ($q) use ($estado_caso) {
                    $q->where('estado_caso',$estado_caso);
                });
            }
            if($responsavel_id !=null){
                $contactos=$contactos ->whereHas('caso',function ($query) use ($responsavel_id){
                    $query->where('responsavel_id',$responsavel_id);
                });

            }
            if($user_id !=null){
                $contactos=$contactos ->where('user_id',$user_id);
            }
            if($provincia_id !=null){
                $contactos=$contactos ->whereHas('utente', function ($q) use($provincia_id) {
                    $q->where('provincia_id',$provincia_id)
                    ->where('tipo_utente','<>','Vitima')
                    ->where('tipo_utente','<>','Perpetrador');
                });
            }
            if($distrito_id !=null){
                $contactos=$contactos ->whereHas('utente', function ($q) use($distrito_id) {
                    $q->where('provincia_id',$distrito_id)
                        ->where('tipo_utente','<>','Vitima')
                        ->where('tipo_utente','<>','Perpetrador');
                });
            }
            if($localidade_id !=null){
                $contactos=$contactos ->whereHas('utente', function ($q) use($localidade_id) {
                    $q->where('provincia_id',$localidade_id)
                        ->where('tipo_utente','<>','Vitima')
                        ->where('tipo_utente','<>','Perpetrador');
                });
            }

            if($motivo_id !=null){
                $contactos=$contactos ->where('motivo_id',$motivo_id);
            }

            $contactos=$contactos->get();


            if ($contactos){
                foreach ($contactos as $contacto){
//                    dd($caso->user->nome);
                    $output.='<tr>'.
                        '<td>'.$contacto->id.'</td>'.
                        '<td>'.$contacto->tipo_contacto.'</td>'.
                        '<td>'.date('d-M-Y',strtotime($contacto->created_at)).'</td>'.
                        '<td>'.$contacto->user->nome.'</td>'.
                        '<td>'.$contacto->created_at->diffForHumans().'</td>'.
                        '<td>'.$contacto->motivo->motivonome.'</td>';

                    if ($contacto->caso_id){
                        if($contacto->caso->estado_caso =='Fechado'){
                            $output.='<td>'.
                                '<span style="color: #4caf50">'.$contacto->caso->estado_caso.'</span>'.
                                '</td>';
                        }
                        if($contacto->caso->estado_caso =='Impossivel Proceder') {
                            $output .= '<td>' .
                                '<span style="color: red">' . $contacto->caso->estado_caso . '</span>' .
                                '</td>';
                        }

                        if($contacto->caso->estado_caso =='Assistido') {
                            $output .= '<td>' .
                                '<span style="color: color: #0aa89e">' . $contacto->caso->estado_caso . '</span>' .
                                '</td>';
                        }
                        if($contacto->caso->estado_caso =='Assistido Temporariamente') {
                            $output .= '<td>' .
                                '<span style="color: color: #0c84e4">' . $contacto->caso->estado_caso . '</span>' .
                                '</td>';
                        }
                        if($contacto->caso->estado_caso =='Em Progresso') {
                            $output .= '<td>' .
                                '<span style="color: color: color: #0aa298">' . $contacto->caso->estado_caso . '</span>' .
                                '</td>';
                        }

                       }else{
                        $output.= '<td>Sem Motivo</td>';
                    }
                    if($contacto->caso_id>0){
                        $output.='<td>'.
                            '<a href="'.route('caso.show',$contacto->id).'"><button class="btn btn-info btn-sm" data-id="'.$contacto->id.'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver detalhes do Contacto">'.
                            '<i class="fa fa-eye" aria-hidden="true"></i></button></a>'.
                            '<button class=" btn btn-success btn-sm" data-id="'.$contacto->id.'"data-title="" data-description="" id="fwd-caso"  style="margin-left:3px!important" disabled>'.
                            '<i class="fa fa-forward" aria-hidden="true"></i></button>'.
                            '<a class="btn btn-primary btn-sm" href="'.route('caso.show',$contacto->caso_id ).'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver Caso" style="margin-left:3px!important"> <i class="fa fa-legal"></i></a>'.


                            '</td>'.
                            '</tr>';
                    }elseif ($contacto->motivo_id>60){
                        $output.='<td>'.
                            '<a href="'.route('caso.show',$contacto->id).'"><button class="btn btn-info btn-sm" data-id="'.$contacto->id.'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver detalhes do Contacto">'.
                            '<i class="fa fa-eye" aria-hidden="true"></i></button></a>'.
                            '<button class=" btn btn-success btn-sm" data-id="'.$contacto->id.'"data-title="" data-description="" id="fwd-caso"  style="margin-left:3px!important" disabled>'.
                            '<i class="fa fa-forward" aria-hidden="true"></i></button>'.
                            '<a class="btn btn-primary btn-sm" href="'.route('caso.show',$contacto->caso_id ).'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver Caso" style="margin-left:3px!important" disabled><i class="fa fa-legal"></i></a>'.
                            '</td>'.
                            '</tr>';
                    }
                    else{
                        $output.='<td>'.
                            '<a href="'.route('caso.show',$contacto->id).'"><button class="btn btn-info btn-sm" data-id="'.$contacto->id.'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver detalhes do Contacto">'.
                            '<i class="fa fa-eye" aria-hidden="true"></i></button></a>'.
                            '<button class=" btn btn-success btn-sm" data-id="'.$contacto->id.'"data-title="" data-description="" id="fwd-caso"  style="margin-left:3px!important">'.
                            '<i class="fa fa-forward" aria-hidden="true"></i></button>'.
                            '<a class="btn btn-primary btn-sm" href="'.route('caso.show',$contacto->caso_id ).'" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver Caso" style="margin-left:3px!important" disabled> <i class="fa fa-legal"></i></a>'.
                            '</td>'.
                            '</tr>';
                    }

                }
//               dd($output);
                return Response($output);

            }
        }

    }

}

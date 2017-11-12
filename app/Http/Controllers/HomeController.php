<?php

namespace App\Http\Controllers;
use App\Caso;
use App\Contacto;
use App\Distrito;
use App\Localidade;
use App\Motivo;
use App\Provincia;
use App\Role;
use App\Tipo_Motivo;
use App\User;
use App\Utente;
use Illuminate\Http\Request;
use Charts;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $provincias=DB::table('utentes')
            ->join('provincias','utentes.provincia_id','=','provincias.id')
            ->select(DB::raw('count(*) as total,provincias.provincianome as provincia'))
            ->where('provincia_id','<>',null)
            ->where('tipo_utente','Contactante')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->orWhere('tipo_utente','Contactante+Perpetrador')
            ->groupBy('provincia')->get();
        dd($provincias);
        $chart = Charts::multi('bar', 'highcharts')->labels(['Total de Contactos por Motivo']);
        foreach(Contacto::with('motivos')->distinct()->pluck('motivo_id') as $motivo)
        {
            $data1 = Contacto::where('motivo_id', $motivo)->groupBy('motivo_id')->selectRaw('count(motivo_id) as Total')->first()->toArray();
            $data2 = array_values($data1);
            $data3 = array_map(create_function('$value', 'return (int)$value;'),$data2);
            $chart->dataset($motivo,$data3);
        }
       $caso= Charts::database(Caso::all(),'donut', 'highcharts')
            ->title('Casos por Estado')
//            ->labels(['First', 'Second', 'Third'])
//            ->values([5,10,20])
//            ->dimensions(1000,500)
            ->responsive(false)
           ->groupBy('estado_caso');
        $datas=DB::table('contactos')
            ->join('motivos', 'contactos.motivo_id', '=', 'motivos.id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('contactos.*','motivos.motivonome as motivo')
            ->get();
//        dd($datas);
        $contacto= Charts::database($datas,'line', 'highcharts')
            ->title('Contactos por Motivo')
//            ->labels(['First', 'Second', 'Third'])
//            ->values([5,10,20])
//            ->dimensions(1000,500)
            ->responsive(false)
            ->groupBy('motivo');
//            ->groupByDay();
        $case = Charts::multi('areaspline', 'highcharts')
            ->responsive(true)
//            ->dimensions(0, 500)
//            ->dimensions(1000, 500)
            ->colors(['#ff0000', '#00ff00', '#0000ff'])
            ->labels(['One', 'Two', 'Three'])
            ->dataset('Test 1', [1,2,3])
            ->dataset('Test 2', [0,6,0])
            ->dataset('Test 3', [3,4,1]);
        return view('test',compact('chart','case','caso','contacto','provincias'));
    }
    public function provfunct(){

        $total_casos=Caso::all()->count();
        $total_contactos=Contacto::all()->count();
        $total_vitimas=Utente::where('tipo_utente','Vitima')
            ->orWhere('tipo_utente','Contactante+Vitima')->count();
        $resol_casos=Caso::where('estado_caso','Fechado')->count();
//        dd($total_vitimas);
        $dados=DB::table('utentes')
            ->join('provincias','utentes.provincia_id','=','provincias.id')
            ->select(DB::raw('count(*) as total,provincias.provincianome as provincia'))
            ->where('provincia_id','<>',null)
            ->where('tipo_utente','Contactante')
            ->orWhere('tipo_utente','Contactante+Vitima')
            ->orWhere('tipo_utente','Contactante+Perpetrador')
            ->groupBy('provincia')->get();
        $provincias= Charts::database($dados,'donut', 'highcharts')
            ->title('Contactos por Provincia')
            ->responsive(true)
            ->groupBy('provincia');
//        dd($provincias);

        $chart = Charts::multi('bar', 'highcharts')->labels(['Contactos por Motivo']);
        foreach(Contacto::with('motivos')->distinct()->pluck('motivo_id') as $motivo) {
            foreach (Motivo::where('id', $motivo)->pluck('motivonome') as $motivonome) {
//            dd($motivonome);
                $data1 = Contacto::where('motivo_id', $motivo)->groupBy('motivo_id')->selectRaw('count(motivo_id) as Total')->first()->toArray();
                $data2 = array_values($data1);
                $data3 = array_map(create_function('$value', 'return (int)$value;'), $data2);
                $chart->dataset($motivonome, $data3);
            }
        }

        $caso= Charts::database(Caso::all(),'donut', 'highcharts')
            ->title('Casos por Estado')
            ->responsive(true)
            ->groupBy('estado_caso');
        $datas=DB::table('contactos')
            ->join('motivos', 'contactos.motivo_id', '=', 'motivos.id')
            ->select('contactos.*','motivos.motivonome as motivo')
            ->get();
//dd($datas);
        $contacto= Charts::database($datas,'line', 'highcharts')
            ->title('Contactos por Motivo')
            ->responsive(true)
            ->groupBy('motivo');


        $case = Charts::multi('areaspline', 'highcharts')
            ->responsive(true)
            ->colors(['#ff0000', '#00ff00', '#0000ff'])
            ->labels(['One', 'Two', 'Three'])
            ->dataset('Test 1', [1,2,3])
            ->dataset('Test 2', [0,6,0])
            ->dataset('Test 3', [3,4,1]);

        $prov=Provincia::all();//get data from table
        $tipos= Tipo_Motivo::where('tipomotivonome','Atendimento')->first();
        $motivos=Motivo::where('tipo_motivo_id',$tipos->id)->get();
        $tipomotivos=Tipo_Motivo::where('tipomotivonome','<>','Atendimento')->get();
//        dd($tipomotivos);
        $roles=Role::all();
        return view('home',compact('prov','tipomotivos','motivos','roles','chart','case','caso','contacto',
            'cases','contacts','resol_casos','total_casos','total_contactos','total_vitimas','provincias'));//sent data to view

    }

    public function findDistrito(Request $request){


        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data=Distrito::select('distritonome','id')->where('provincia_id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }


    public function findLocalidade(Request $request){

//        //it will get price if its id match with product id
//        $p=Product::select('price')->where('id',$request->id)->first();
//
//        return response()->json($p);
        //$request->id here is the id of our chosen option id
        $data=Localidade::select('localidadenome','id')->where('distrito_id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }
    public function findmotivo(Request $request){
        $data=Motivo::select('motivonome','id')->where('tipo_motivo_id',$request->id)->get();
//    dd($data);
        return response()->json($data);//then sent this data to ajax success
    }
}

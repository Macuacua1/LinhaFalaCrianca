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
//        $chart = Charts::multi('bar', 'material')
//            // Setup the chart settings
//            ->title("My Cool Chart")
//            // A dimension of 0 means it will take 100% of the space
//            ->dimensions(0, 400) // Width x Height
//            // This defines a preset of colors already done:)
//            ->template("material")
//            // You could always set them manually
//            // ->colors(['#2196F3', '#F44336', '#FFC107'])
//            // Setup the diferent datasets (this is a multi chart)
//            ->dataset('Element 1', [5,20,100])
//            ->dataset('Element 2', [15,30,80])
//            ->dataset('Element 3', [25,10,40])
//            // Setup what the values mean
//            ->labels(['One', 'Two', 'Three']);
//        $users = Contacto::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
//
//            ->get();
//
//        $chart = Charts::database($users, 'bar', 'highcharts')
//
//            ->title("Monthly new Register Users")
//
//            ->elementLabel("Total Users")
//
//            ->dimensions(1000, 500)
//
//            ->responsive(false)
//
//            ->groupByMonth(date('Y'), true);
//        $chart = Charts::database(User::all(), 'bar', 'highcharts')
//            ->elementLabel("Total")
//            ->dimensions(1000, 500)
//            ->responsive(false)
//            ->groupByDay();
//        $chart = Charts::database(User::all(), 'bar', 'highcharts')->data(Role::all());
//        $chart = Charts::multi('bar', 'minimalist')
//            ->responsive(false)
//            ->dimensions(0, 500)
//            ->colors(['#ff0000', '#00ff00', '#0000ff'])
//            ->labels(['One', 'Two', 'Three'])
//            ->dataset('Test 1', [1,2,3])
//            ->dataset('Test 2', [0,6,0])
//            ->dataset('Test 3', [3,4,1]);
//        $chart = Charts::database(User::all(), 'bar', 'highcharts')
//            ->elementLabel("Total")
//            ->dimensions(1000, 500)
//            ->responsive(true)
//            ->groupByDay();
        $chart = Charts::multi('bar', 'highcharts')->labels(['Total de Contactos por Motivo']);
        foreach(Contacto::with('motivos')->distinct()->pluck('motivo_id') as $motivo)
        {
            $data1 = Contacto::where('motivo_id', $motivo)->groupBy('motivo_id')->selectRaw('count(motivo_id) as Total')->first()->toArray();
            $data2 = array_values($data1);
            $data3 = array_map(create_function('$value', 'return (int)$value;'),$data2);
            $chart->dataset($motivo,$data3);
        }
       $caso= Charts::database(Caso::all(),'donut', 'highcharts')
            ->title('Graficos de Casos')
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
            ->title('Graficos de Contactos')
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
        return view('test',compact('chart','case','caso','contacto'));
    }
    public function provfunct(){
        $cases=Caso::all()->count();
        $contacts=Contacto::all()->count();

        $chart = Charts::multi('bar', 'highcharts')->labels(['Total de Contactos por Motivo']);
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
            ->title('Graficos de Casos')
            ->responsive(true)
            ->groupBy('estado_caso');
        $datas=DB::table('contactos')
            ->join('motivos', 'contactos.motivo_id', '=', 'motivos.id')
            ->select('contactos.*','motivos.motivonome as motivo')
            ->get();

        $contacto= Charts::database($datas,'line', 'highcharts')
            ->title('Graficos de Contactos')
            ->responsive(true)
            ->groupBy('motivo');

        $contact= DB::table('contactos')
            ->select(DB::Raw('count(*) as total,estado_contacto'))
            ->where('estado_contacto','<>',null)
            ->groupBy('estado_contacto')
            ->get();

        $casos=DB::table('casos')
            ->select(DB::Raw('count(*) as total,estado_caso'))
            ->where('estado_caso','<>',null)
            ->groupBy('estado_caso')
            ->get();
//
//        foreach ($caso as $hey){
//         dd($caso);
////     }


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
        return view('home',compact('prov','tipomotivos','motivos','roles','chart','case','caso','contacto','cases','contacts'));//sent data to view

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

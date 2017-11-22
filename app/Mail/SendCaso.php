<?php

namespace App\Mail;

use App\Caso;
use App\Contacto;
use App\Mensagem;
use App\User;
use Illuminate\Support\Facades\Auth;
use PDF;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCaso extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        if ($request->email and $request->nome){
            $destino=$request->email;
            $users=User::all();
            $pdf = PDF::loadView('report',['users'=>$users]);
//        return $pdf->download('report.pdf');
//            if (isset($request->contacto_id) and isset($request->mensagem)){
//                $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso']);
//                $caso= Caso::create(request()->all());
//                $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
//                Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
//            }
//            if (isset($request->contacto_id)){
//                $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso']);
//                $caso= Caso::create(request()->all());
//                Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
//            }

            return $this->view('sendcaso',['nome'=>$request->nome])
                ->to($destino,'To Mario')->subject('Encaminhamento do Caso')
                ->attachData($pdf->output(), "Caso.pdf", [
                    'mime' => 'application/pdf',
                ]);
        }
//        else{
////            $contacto=Contacto::find($request->contacto_id);
//////        dd($contacto);
////        if (!$contacto->caso_id){
//            if (isset($request->contacto_id) and isset($request->mensagem)){
//                $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso']);
//                $caso= Caso::create(request()->all());
//                $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
//                Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
//            }
//            if (isset($request->contacto_id)){
//                $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso']);
//                $caso= Caso::create(request()->all());
//                Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
//            }
        }
//        }else{
//            dd('Ja foi encaminhado');
//        }
//        }


//         $pdf->download('report.pdf');



//    }
}

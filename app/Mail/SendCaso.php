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
        if (isset($request->novoid)){
            $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso','responsavel_id'=>$request->responsavel_id,'instituicao_id'=>$request->novoid]);
        }else{
            $inst=Instituicao::create($request->all());
            $request->request->add(['user_id'=>Auth::user()->id,'estado_caso'=>'Em Progresso','responsavel_id'=>$request->responsavel_id,'instituicao_id'=>$inst->id]);
        }
        if (isset($request->contacto_id) and isset($request->mensagem)){
            $caso= Caso::create(request()->all());
            $mensagem=Mensagem::create(['caso_id'=>$caso->id,'mensagem'=>$request->mensagem]);
           Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
        }
        if (isset($request->contacto_id)){
            $caso= Caso::create(request()->all());
             Contacto::where('id',$request->contacto_id)->update(['caso_id'=>$caso->id]);
        }
        if ($request->email and $request->nome){
            $destino=$request->email;
            $contacto= Contacto::find($request->contacto_id);
//            $pdf = PDF::loadView('report',['users'=>$users]);
            $pdf = PDF::loadView('report',['contacto'=>$contacto]);

            return $this->view('sendcaso',['nome'=>$request->nome])
                ->to($destino,'To Mario')->subject('Encaminhamento do Caso')
                ->attachData($pdf->output(), "Caso.pdf", [
                    'mime' => 'application/pdf',
                ]);
        }

        }

}

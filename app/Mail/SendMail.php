<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
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
    public function build(Request $request,$qtyCaraceters = 6)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;
        $specialCharacters = str_shuffle('!@#$%*-');
        $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

        $request->request->add(['password' => bcrypt($password)]);
        $request->request->add(['role_id' => $request->role_id]);
        $request->request->add(['avatar' => 'default']);
        $request->request->add(['nome' => $request->nome]);
        $request->request->add(['email' => $request->email]);
        $user = User::create($request->all());

        return $this->view('mail',['nome'=>$request->nome,'password'=>$password,'email'=>$request->email])->to($request->email)->subject('Credenciais de acesso a aplicacao da LFC');
//        return $this->view('mai');
    }
}

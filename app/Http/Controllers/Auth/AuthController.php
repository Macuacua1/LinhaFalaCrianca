<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->auth = $auth;   Guard $auth
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view("auth.login");
    }


       

        public function postLogin(Request $request)
   {
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
    ]);



    $credentials = $request->only('email', 'password');
//       dd($credentials);

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {

        $usuarioactual=Auth::user();
       return view('home')->with("user",  $usuarioactual);
    }

    $this->getLogin();

    }


//login

 //registro   


        protected function getRegister()
    {
        return view("auth.register");
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);


    $data = $request;


       return User::create([
           'nome' => $data['nome'],
           'email' => $data['email'],
           'password' => bcrypt($data['password']),
           'avatar' => 'default',
           'estado' => 'activo'
       ]);

  return redirect('/home');
//    if($user->save()){
//
//         return "se ha registrado correctamente el usuario";
//
//    }
   

   

}

//registro

protected function getLogout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('login');
    }
    protected function guard()
    {
        return Auth::guard();
    }






}

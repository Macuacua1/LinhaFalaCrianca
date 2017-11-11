<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Role;
use App\User;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
//        dd($users);
        $roles=Role::all();
        return view('user.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'local_actual' => 'required|max:255|min:3',
//            'designacao' => 'required|min:3',
//            'data' => 'required',
//            'local' => 'required',
//        ]);
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
      return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responsegit
     */
    public function edit($id)
    {
       $users=User::findOrFail($id);
        $perfils=Role::all();
        return view('user.edit',compact('users'),compact('perfils'));

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
        $users=User::find($id);
//        dd($users);
        $users->fill($request->only(['escritorio','estado']));
        $users->save();
        $users->role()->attach($request->role_id);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
//        dd($user->id);
        $user->delete();
//        return redirect()->route('users');
        return response()>json(['mario'=>'hahahhaahhah']);
    }


    public function criarConta(Request $request,$qtyCaraceters = 6)
    {
//        Mail::send(['test'=>'mail'],['name','Mario'],function ($message) {
//            $message->to('mariocarlitosmacuacua@gmail.com', 'To Mario')->subject('Testando Email');
//            $message->from('mariocarlitosmacuacua@gmail.com', 'Mario');
//        });
//        return $request->all();
        Mail::send(new SendMail());

//        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
//        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
//        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
//        $numbers .= 1234567890;
//        $specialCharacters = str_shuffle('!@#$%*-');
//        $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
//        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

//        $request->request->add(['password' => bcrypt($password)]);
//        $request->request->add(['role_id' => $request->role_id]);
//        $request->request->add(['avatar' => 'default']);
//        $request->request->add(['nome' => $request->nome]);
//        $request->request->add(['email' => $request->email]);
//        $user = User::create($request->all());

//        return Response($user);


//        if (Auth::attempt(['email' => $request->email , 'password' => $password])) {
//
//            return response()->json(['msg' => true]);
//
//        }

//        return response()->json(['msg' => false]);
    }
    public function updateUser(Request $request, $id){
        $users=User::find($id);
        dd($users);

    }


    public function getPerfil(){

//        $user = Auth::user();

        return view('user.profile');
    }
    public function block_user(Request $request){
//        dd($request->all());
        if (isset($request->role_id)) {
            User::where('id', $request->user_id)->update(['role_id' => $request->role_id]);
        }
        if (isset($request->escritorio)){
            User::where('id', $request->user_id)->update(['escritorio' => $request->escritorio]);
        }
        if (isset($request->estado)) {
            User::where('id', $request->user_id)->update(['estado' => $request->estado]);
        }
        if (isset($request->role_id)and isset($request->escritorio)) {
            User::where('id', $request->user_id)->update(['role_id' => $request->role_id,'escritorio' => $request->escritorio]);
        }
        if (isset($request->role_id)and isset($request->estado)) {
            User::where('id', $request->user_id)->update(['role_id' => $request->role_id,'estado' => $request->estado]);
        }
        if (isset($request->$request->escritorio)and isset($request->estado) ) {
            User::where('id', $request->user_id)->update(['escritorio' => $request->escritorio,'estado' => $request->estado]);
        }
        if (isset($request->role_id)and isset($request->$request->escritorio)and isset($request->estado) ) {
            User::where('id', $request->user_id)->update(['role_id' => $request->role_id,'escritorio' => $request->escritorio,'estado' => $request->estado]);
        }
    }
    public function edituser(Request $request){
//        dd($request->file("avatar")->getClientOriginalName());
        $passw= bcrypt($request->password);
        User::where('id',$request->user_id)->update(['avatar'=>$request->file("avatar")->getClientOriginalName(),'password'=>$passw]);
        $request->file("avatar")->move( base_path() . '/public/img' , $request->file("avatar")->getClientOriginalName());
        return back()->with('success','Actualizado com Sucesso!');
    }

}

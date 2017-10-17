<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
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
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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


    public function criarConta(Request $request)
    {


        $password = $request->password;
        $request->request->add(['avatar' => 'default']);
        $request->request->add(['estado' => 'activo']);
        $request->request->add(['password' => bcrypt($request->password)]);
        User::create($request->all());

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

        $user = Auth::user();

        return view('users.perfil', compact('user'));
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user= User::orderBy('id','asc')->get();
        return view('usuario/indexUsuario',['users' => $user]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required', 'string', 'max:255',
            'nit' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'tipo_admin' => 'required', 'string'
        ]);

        $user = new User();
        $user->name = request('name');
        $user->nit = request('nit');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->tipo_admin = request('tipo_admin');
       
        $user->save();
        return redirect('/user');
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
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find($user->id);
        return view('usuario.editar',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'name' => 'required', 'string', 'max:255',
            'nit' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'tipo_admin' => 'required', 'string'
        ]);
        $user = User::findOrFail($user->id);
        $user->name = request('name');
        $user->nit = request('nit');
        $user->email = request('email');
        $user->password =  Hash::make(request('password'));
        $user->tipo_admin = request('tipo_admin');
        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userx = User::find($user->id);
        //return view('clients.delete',['client' => $clientx]);
        $userx->delete();
        return redirect('/user');
    }
}

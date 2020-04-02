<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::where('id', '!=', $user->roles()->first()->id)->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->roles()->first()->description == 'Administrador'){
            $roles = Role::orderBy('id', 'asc')->get();
        }
        else{
            $roles = Role::where('description', 'Cliente')->orderBy('id', 'asc')->get();
        }

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $role_user = Role::where('id', $request->input('roles'))->first();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->roles()->attach($role_user);

        return redirect()->route('users.index')->with('statusSuccess', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $store = Store::where('user_id', $user->id)->first();
        return view('users.edit', compact('user', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->update();

        $store = Store::where('user_id', $user->id)->first();

        if ($store != null){
            if($request->activated == 'on'){
                $store->activated = true;
            }
            else{
                $store->activated = false;
            }
        }

        $store->update();

        return redirect()->route('users.index')->with('statusSuccess', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('statusSuccess', 'Usuario eliminado correctamente');
    }

    public function confirmAction(User $user)
    {
        return view('users.confirmAction', compact('user'));
    }
}
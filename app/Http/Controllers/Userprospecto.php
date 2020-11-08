<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class Userprospecto extends Controller
{
     public function index()
    {
      
   		$roles = Role::where('description', 'Cliente')->orderBy('id', 'asc')->get();
   		$prospecto="prospecto";
        return view('users.create', compact('roles','prospecto'));

    }
}

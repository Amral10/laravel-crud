<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index(){
        // carregar a view
        return view('users.index');
    }

    public function create() {
        // carregar a viwl
        return view('users.create');
    }

    public function store( UserRequest $request ){
        //validar formulário
        $request->validated();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.index');-with('success', 'usuario cadastrado com sucesso!');
    }

}

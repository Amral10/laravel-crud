<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index()
    {
        //recuperar registro do banco de dados
        $users = User ::orderByDesc('id')->get();

        // carregar a view
        return view('users.index', ['users' => $users]);
    }

      public function show(User $user) 
      {
        return view('users.show', ['user' => $user]);
      }

    public function create() 
    {
        // carregar a viwl
        return view('users.create');
    }

    public function store( UserRequest $request )
    {
        //validar formulário
        $request->validated();
    
        // cadastrar usuário no banco de dados
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // redirecionar usuario e enviar msg 
        return redirect()->route('user.index')->with('success', 'usuario cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user'=> $user]);
    }
    
    public function update(UserRequest $request, User $user)
    {
        $request->validated();
        // editar as informações do Banco de dados
        $user->update([
          'name' => $request->name,
          'email'=> $request->email,
          'senha' => $request->password,
        ]);
        
        return redirect()->route('user.show', ['user' => $user->id ])->with('success', 'usuario editado com sucesso!');
    }

    public function destroy(User $user)
    {
        // apagar registro banco de dados
        $user->delete();
        
        // redirecionar usuario e enviar msg 
        return redirect()->route('user.index')->with('success', 'usuario apagado com sucesso!');
    }
}
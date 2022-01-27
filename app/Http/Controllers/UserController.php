<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $user_id = auth()->user()->id;

        $user = Auth::user();
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;

        // $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);
        // return 'Perfil de '.$id.', nome: '.$name.', email: '.$email;
        // return 'User: '.$user;
        return view('usuario.index', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user_id = auth()->user()->id;
        if ($user_id == $user->id) {
            $user->update($request->all());
            return redirect()->route('tarefa.index');
        }
        return view('acesso-negado');
    }
}

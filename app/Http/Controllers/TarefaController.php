<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Mail;
use App\Mail\NovaTarefaMail;

class TarefaController extends Controller
{


    //assim fazemos para a rota que acessar tarefa, passar pelo modulo de auth
    //se eu nao estiverlogado, sou redirect para login
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
        $user_id = auth()->user()->id;
        //recupera todas as tarefaz quem o user id seja o mesmo do user logado
        $tarefas = Tarefa::where('user_id', $user_id)->get();
        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all('tarefa', 'data_conclusao');

        $destinatario = auth()->user()->email; //user extrai os dados do usuario logado

        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);

        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa)); //precisamos passar alguns detalhes da tarefa

        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}

/**
 *
 * até B=0
*faça (se C>0
 *  então (B:=B-1; C:= C-1)
  * senão (A:= B; ✓))
*A:= 0
 */

<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use Mail;
use App\Mail\NovaTarefaMail;

class TarefaController extends Controller
{


    //assim fazemos para a rota que acessar tarefa, passar pelo modulo de auth
    //se eu nao estiverlogado, sou redirect para login
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('gestor');
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
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);
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
        $dados = $request->all();

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
        //verificar se user e dona da tarefa

        $user_id = auth()->user()->id;
        if ($user_id == $tarefa->user_id) {
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        }
        return view('acesso-negado');
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
        $user_id = auth()->user()->id;
        if ($user_id == $tarefa->user_id) {
            $tarefa->update($request->all());
            return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
        }
        return view('acesso-negado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if ($user_id == $tarefa->user_id) {
            $tarefa->delete();

            return redirect()->route('tarefa.index');
        }

        return view('acesso-negado');
    }

    public function exportacao($extensao)
    {
        // return 'Modulo LARAVEL EXCEL';
        $nome_arquivo = 'lista_tarefas';

        //a url fica exposta na rotal entao verificamos se for xslx ou csv
        //se nao for nenhum das duas ele manda pro index novamente
        if ($extensao == 'xlsx') {
            $nome_arquivo .= '.'.$extensao;
        } elseif ($extensao == 'csv') {
            $nome_arquivo .= '.'.$extensao;
        } else {
            return redirect()->route('tarefa.index');
        }
        return Excel::download(new TarefasExport, $nome_arquivo);
    }

    public function exportar()
    {
        //recuperamos todas tarefas do usuario
        $tarefas = auth()->user()->tarefas()->get();
        //uma var que recebe o retorno da classe pdf
        $pdf = PDF::loadView('tarefa.pdf', ['tarefas' => $tarefas]);

        //definindo o tipo do pepal/ e a orientação retrato ou paisagem
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('lista_de_tarefas.pdf');
        // return $pdf->download('lista_de_tarefas.pdf');
    }
}
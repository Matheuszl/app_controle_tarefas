<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//criar FornecedoresExport
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class FornecedorController extends Controller
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
        $fornecedores = Fornecedor::all();
        return view('fornecedor.index', ['fornecedores' => $fornecedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //criamos uma view que sera o formulario de entrada de dados dos fornecedores
        return view('fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //capturamos os dados da request
        $dados = $request->all();

        //cadastramos no banco
        $fornecedor = Fornecedor::create($dados);

        return redirect()->route('fornecedor.show', ['fornecedor' => $fornecedor->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedor.show', ['fornecedor' => $fornecedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.edit', ['fornecedor' => $fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $fornecedor->update($request->all());
        return redirect()->route('fornecedor.show', ['fornecedor' => $fornecedor->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return redirect()->route('fornecedor.index');
    }
}

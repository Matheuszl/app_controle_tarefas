<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

//criar ClienteesExport
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', ['clientes' => $clientes]);
    }


    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        
        //Verifico se na request vem uma imagem e salvo o caminho dela
        if ($request->hasFile('image') && $request->image->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/userfoto'), $imageName);
        }
        //armazeno esse caminho da imagem no banco de dados
        $dados['image'] = $imageName;

        $cliente = Cliente::create($dados);

        $message = Cliente::notificarNovoCliente($cliente->nome, $cliente->email);
        return redirect()->route('cliente.show', ['cliente' => $cliente->id]);
    }


    public function show(Cliente $cliente)
    {
        return view('cliente.show', ['cliente' => $cliente]);
    }


    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', ['cliente' => $cliente]);
    }


    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('cliente.show', ['cliente' => $cliente->id]);
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                Fornecedores
                            </div>
                            <div class="col-8">
                                <div class="float-end">
                                    {{-- <a href="{{ route('tarefa.create') }}" type="button" class="btn btn-success mr-3">Nova Tarefa</a>
                                    <a href="{{ route('tarefa.exportacao', ['extensao' => 'xlsx']) }}" type="button" class="btn btn-success mr-3">XLSX</a>
                                    <a href="{{ route('tarefa.exportacao', ['extensao' => 'csv']) }}" type="button" class="btn btn-success mr-3">CSV</a>
                                    <a href="{{ route('tarefa.exportar') }}" target="_blank" type="button" class="btn btn-success">PDF</a> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Atualização Cadastral</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fornecedores as $key => $t)
                                    <tr>
                                        <th scope="row">{{ $t['id'] }}</th>
                                        <td>{{ $t['nome'] }}</td>
                                        <td>{{ $t['email'] }}</td>
                                        <td>{{ $t['status'] }}</td>
                                        <td>{{ date('d/m/Y', strtotime($t['updated_at'])) }}</td>
                                        <td><a href="{{ route('fornecedor.edit', $t['id']) }}">Editar</a></td>
                                        <td>
                                            {{-- <form id="form_{{ $t['id'] }}" method="POST"
                                                action="{{ route('tarefa.destroy', ['tarefa' => $t['id']]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#"
                                                    onclick="document.getElementById('form_{{ $t['id'] }}').submit()"><span><i
                                                            class="bi bi-trash"></i>Excluir</span> </a>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        {{-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="{{ $fornecedores->previousPageUrl() }}">Voltar</a></li>

                                @for ($i = 1; $i <= $fornecedores->lastPage(); $i++)
                                    <li class="page-item {{ $fornecedores->currentPage() == $i ? 'active' : '' }}"><a
                                            class="page-link"
                                            href="{{ $fornecedores->url($i) }}">{{ $i }}</a></li>
                                @endfor

                                <li class="page-item"><a class="page-link"
                                        href="{{ $fornecedores->nextPageUrl() }}">Avançar</a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

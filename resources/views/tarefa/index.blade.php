@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                Tarefas
                            </div>
                            <div class="col-8">
                                <div class="float-end">
                                    <a href="{{ route('tarefa.create') }}" type="button" class="btn btn-success mr-3">Nova Tarefa</a>
                                    <a href="{{ route('tarefa.exportacao', ['extensao' => 'xlsx']) }}" type="button" class="btn btn-success mr-3">XLSX</a>
                                    <a href="{{ route('tarefa.exportacao', ['extensao' => 'csv']) }}" type="button" class="btn btn-success mr-3">CSV</a>
                                    <a href="{{ route('tarefa.exportar') }}" target="_blank" type="button" class="btn btn-success">PDF</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Relevancia</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data da conclusão</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $key => $t)
                                    <tr>
                                        <th scope="row">{{ $t['id'] }}</th>
                                        <td>{{ $t['tarefa'] }}</td>
                                        <td>{{ $t['descricao'] }}</td>
                                        <td>{{ $t['status'] }}</td>
                                        <td>{{ $t['relevancia'] }}</td>
                                        <td>{{ $t['valor'] }}</td>
                                        <td>{{ date('d/m/Y', strtotime($t['data_conclusao'])) }}</td>
                                        <td><a href="{{ route('tarefa.edit', $t['id']) }}">Editar</a></td>
                                        <td>
                                            <form id="form_{{ $t['id'] }}" method="POST"
                                                action="{{ route('tarefa.destroy', ['tarefa' => $t['id']]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#"
                                                    onclick="document.getElementById('form_{{ $t['id'] }}').submit()"><span><i class="bi bi-trash"></i>Excluir</span> </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>

                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}"><a
                                            class="page-link"
                                            href="{{ $tarefas->url($i) }}">{{ $i }}</a></li>
                                @endfor

                                <li class="page-item"><a class="page-link"
                                        href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

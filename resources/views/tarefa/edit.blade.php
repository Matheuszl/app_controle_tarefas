@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Atulizar Tarefa</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tarefa.update', ['tarefa' => $tarefa->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Tarefa</label>
                                <input type="text" class="form-control" name="tarefa" value="{{ $tarefa->tarefa }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data de conclusão</label>
                                <input type="date" class="form-control" name="data_conclusao"
                                    value="{{ $tarefa->data_conclusao }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <input type="text" class="form-control" value="{{ $tarefa->descricao }}" name="descricao">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" value="{{ $tarefa->status }}" name="status">
                                    <option selected>Status</option>
                                    <option value="Mapeado">Mapeado</option>
                                    <option value="Em Espera">Em Espera</option>
                                    <option value="Em desenvolvimento">Em desenvolvimento</option>
                                    <option value="Contido">Contido</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Relevancia</label>
                                <select class="form-select" value="{{ $tarefa->relevancia }}" name="relevancia"
                                    aria-label="Relevancia do projeto">
                                    <option selected>Relevancia</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Média">Média</option>
                                    <option value="Urgente">Urgente</option>
                                </select>
                            </div>



                            <div class="mb-3">
                                <label class="form-label">Valor</label>
                                <input type="number" class="form-control" value="{{ $tarefa->valor }}" name="valor">
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

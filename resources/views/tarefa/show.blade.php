@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tarefa: {{ $tarefa->tarefa }} | Status {{ $tarefa->status }}</div>

                    <div class="card-body">
                        <fieldset disabled="disabled">
                            <div class="mb-3">
                                <label class="form-label">Data de conclusão</label>
                                <input type="date" class="form-control" value="{{ $tarefa->data_conclusao}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <input type="text" class="form-control" value="{{ $tarefa->descricao }}" name="descricao">
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

                            
                        </fieldset>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

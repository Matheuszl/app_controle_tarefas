@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Fornecedor</div>

                    <div class="card-body">
                        <fieldset disabled="disabled">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" value="{{ $fornecedor->nome}}" name="nome">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="{{ $fornecedor->email}}" name="email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Endereco</label>
                                <input type="text" class="form-control" value="{{ $fornecedor->endereco}}" name="endereco">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" value="{{ $fornecedor->status}}" name="status">
                                    <option selected>Status</option>
                                    <option value="Mapeado">Ativo</option>
                                    <option value="Em Espera">Inativo</option>
                                    <option value="Em desenvolvimento">Contido</option>
                                </select>
                            </div>
                        </fieldset>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
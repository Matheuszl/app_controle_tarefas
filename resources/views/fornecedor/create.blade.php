@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adcionar Fornecedor</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fornecedor.store') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto Perfil</label>
                                <input class="form-control" type="file" name="image">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Endereco</label>
                                <input type="text" class="form-control" name="endereco">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option selected>Status</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                    <option value="Contido">Contido</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
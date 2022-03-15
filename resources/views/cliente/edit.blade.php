@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente</div>

                    @if ($cliente->image)
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ url("img/userfoto/{$cliente->image}") }}" alt="{{ $cliente->image }}"
                                    class="img-thumbnail">
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="image" class="form-label">Foto Perfil</label>
                                <input class="form-control" type="file" name="image">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" value="{{ $cliente->nome }}" name="nome">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="{{ $cliente->email }}" name="email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Endereco</label>
                                <input type="text" class="form-control" value="{{ $cliente->endereco }}"
                                    name="endereco">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" value="{{ $cliente->status }}" name="status">
                                    <option selected>Status</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                    <option value="Contido">Contido</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

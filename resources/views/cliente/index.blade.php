@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                Clientes
                            </div>
                            <div class="col-8">
                                <div class="float-end">
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
                                @foreach ($clientes as $key => $t)
                                    <tr>
                                        <th scope="row">{{ $t['id'] }}</th>
                                        <td>{{ $t['nome'] }}</td>
                                        <td>{{ $t['email'] }}</td>
                                        <td>{{ $t['status'] }}</td>
                                        <td>{{ date('d/m/Y', strtotime($t['updated_at'])) }}</td>
                                        <td><a href="{{ route('cliente.edit', $t['id']) }}">Editar</a></td>
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

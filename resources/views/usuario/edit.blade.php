@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil do Usuario</div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
                            @csrf
                            @method('PUT') --}}
                            <div class="mb-3">
                                <label class="form-label">Nome de Usuario</label>
                                <input type="text" class="form-control" name="name" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="date" class="form-control" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
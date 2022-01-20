@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}
                <div class="card-header">Para finalizar seu cadastro em nosso sistema, precisamos que conrfime este email.</div>


                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Após esse procedimento, por favor verifique sua caixa de email!') }}
                    {{ __('Se caso nao recebeu nenhum email, clique no link a seguir para receber um novo email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Reenviar email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

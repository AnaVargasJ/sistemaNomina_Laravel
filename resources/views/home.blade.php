@extends('layouts.login')

@section('content')
<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Exito!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ya puedes acceder al sistema!') }}
                </div>
            </div>

        </div>
    </div>
</div>
<br><br><br>
<div class="d-grid gap-2 col-6 mx-auto"><a href="{{ route('nominas.index') }}" class="super">Empezar</a>
@endsection

@extends('welcome')
@extends('menu-lateral') <!--Extende menu lateral -->
@extends('slide-produtos') <!--Extende Layout de ultimos produtos cadastrados -->

@section('conteudo')

<div class="container">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
</div>

@endsection

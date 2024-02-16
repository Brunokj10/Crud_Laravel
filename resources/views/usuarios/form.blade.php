@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('usuarios') }}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ isset($usuario) ? url('usuarios/update', ['id' => $usuario->id]) : url('usuarios/add') }}" method="post">
                        @csrf
                        @if(isset($usuario))
                        @method('POST')
                        @endif

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="nome" value="{{ $usuario->name ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $usuario->email ?? '' }}">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($usuario) ? 'Atualizar' : 'Cadastrar' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

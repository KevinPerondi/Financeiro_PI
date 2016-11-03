@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('users.home')}}" class="btn btn-default" style="height:40px; width:200px">Ver Usuarios</a>
            <br><br>
            <a href="{{route('despesas.home')}}" class="btn btn-default" style="height:40px; width:200px">Ver Despesas</a>
            <br><br>
            <a href="{{route('doacaos.home')}}" class="btn btn-default" style="height:40px; width:200px">Ver Doações</a>
        </div>
    </div>
</div>
@endsection

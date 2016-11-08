@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<<<<<<< HEAD
            <a href="{{route('admin.home')}}" class="btn btn-default" style="height:40px; width:200px">Ver Usuarios</a>
=======
            <a href="{{route('users.home')}}" class="btn btn-default" style="height:40px; width:200px">Usuarios</a>
>>>>>>> ff9c7d7c615546ac0c8ab7a525e6dc42a8779d8f
            <br><br>
            <a href="{{route('despesas.home')}}" class="btn btn-default" style="height:40px; width:200px">Despesas</a>
            <br><br>
            <a href="{{route('doacaos.home')}}" class="btn btn-default" style="height:40px; width:200px">Doações</a>
            <br><br>
            <a href="{{route('mensalidades.edit')}}" class="btn btn-default" style="height:40px; width:200px">Mensalidades</a>            
        </div>
    </div>
</div>
@endsection

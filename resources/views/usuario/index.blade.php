@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <a href="{{route('user.cadastro')}}" class="btn btn-default" style="height:40px; width:200px">Editar Cadastro</a>
            <br><br>
            <a href="{{route('user.mensalidades')}}" class="btn btn-default" style="height:40px; width:200px">Mensalidades</a>
            <br><br>      
            <a href="{{route('user.despesas')}}" class="btn btn-default" style="height:40px; width:200px">Despesas</a>
           
        </div>
    </div>
</div>
@endsection

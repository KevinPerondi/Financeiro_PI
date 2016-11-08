@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <a href="{{route('admin.users.index')}}" class="btn btn-default" style="height:40px; width:200px">Usuarios</a>

            <br><br>
            <a href="{{route('admin.despesas.index')}}" class="btn btn-default" style="height:40px; width:200px">Despesas</a>
            <br><br>
            <a href="{{route('admin.doacaos.index')}}" class="btn btn-default" style="height:40px; width:200px">Doações</a>
            <br><br>
            <a href="{{route('admin.mensalidades.edit')}}" class="btn btn-default" style="height:40px; width:200px">Mensalidades</a>            
        </div>
    </div>
</div>
@endsection

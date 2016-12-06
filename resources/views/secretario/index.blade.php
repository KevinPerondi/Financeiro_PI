@extends('layouts.app')

@section('content')
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->     
  

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('secretario.cadastro')}}" class="btn btn-default" style="height:40px; width:200px">Editar Cadastro</a>
            <br><br>
            <a href="{{route('secretario.despesas')}}" class="btn btn-default" style="height:40px; width:200px">Despesas</a>
            <br><br>
            <a href="{{route('secretario.doacoes')}}" class="btn btn-default" style="height:40px; width:200px">Doações</a>
            <br><br>
            <a href="{{route('secretario.usuarios')}}" class="btn btn-default" style="height:40px; width:200px">Usuarios</a>
        </div>
    </div>
</div>
@endsection

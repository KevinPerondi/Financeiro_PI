@extends('/layouts/app')

@section('content')

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message --> 

<div class="container">
    <h3</h3>
    
    @if($errors->any())
        <ul class="allert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=>'admin.mensalidade.store', 'class'=>'form']) !!}
    
    <div class="form-group">
        {!! Form::label('Valor', 'Valor:') !!}
        {!! Form::text('valor',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Vencimento', 'Vencimento:') !!}
        {!! Form::text('vencimento',Carbon\Carbon::now()->format('d/m/Y'),['class'=>'form-control']) !!}   
        
        {!! Form::label('Status', 'Status:') !!}
        {!! Form::text('status','Pendente',['class'=>'form-control']) !!}   
        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Criar Mensalidade', ['class'=>'btn btn-primary']) !!}
    </div>
    
    
    
    {!! Form::close() !!}
    
</div>
    

@endsection
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
    <h3>Editando usuario: {{$user->name}}</h3>

    
    @if($errors->any())
        <ul class="allert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::model($user,['route'=>['user.update', $user->id]]) !!}
    
    <div class="form-group">
        
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}   
        
        {!! Form::label('Telefone', 'Telefone:') !!}
        {!! Form::text('telefone',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Endereço', 'Endereço:') !!}
        {!! Form::text('endereço',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Senha', 'Senha:') !!}
        {!! Form::password('password',array('class' => 'form-control')) !!}
        
        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
    </div>
    
    
    {!! Form::close() !!}

</div>
    

@endsection
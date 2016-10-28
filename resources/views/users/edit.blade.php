@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Editando usuario: {{$user->name}}</h3>
    
    
    {!! Form::model($user,['route'=>['users.update', $user->id]]) !!}
    
    <div class="form-group">
        {!! Form::label('CPF', 'CPF:') !!}
        {!! Form::text('Cpf',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Nome', 'Nome:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}   
        
        {!! Form::label('Telefone', 'Telefone:') !!}
        {!! Form::text('Telefone',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Endereço', 'Endereço:') !!}
        {!! Form::text('Endereço',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Senha', 'Senha:') !!}
        {!! Form::password('password',array('class' => 'form-control')) !!}
        
        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Criar Usuario', ['class'=>'btn btn-primary']) !!}
    </div>
    
    
    
    {!! Form::close() !!}
    
</div>
    

@endsection
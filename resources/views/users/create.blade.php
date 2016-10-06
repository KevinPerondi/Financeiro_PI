@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Cadastro de Usuario</h3>
    
    
    {!! Form::open(['route'=>'users.store', 'class'=>'form']) !!}
    
    <div class="form-group">
        {!! Form::label('CPF', 'CPF:') !!}
        {!! Form::text('Cpf',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Nome', 'Nome:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}   
        
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
        {!! Form::submit('Criar Usuario', ['class'=>'btn btn-primary']) !!}
    </div>
    
    
    
    {!! Form::close() !!}
    
</div>
    

@endsection
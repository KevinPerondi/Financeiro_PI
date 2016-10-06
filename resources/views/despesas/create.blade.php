@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Cadastro de Despesas</h3>
    
    
    {!! Form::open(['route'=>'despesas.store', 'class'=>'form']) !!}
    
    <div class="form-group">
        {!! Form::label('Valor', 'Valor:') !!}
        {!! Form::text('valor',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Descrição', 'Descrição:') !!}
        {!! Form::text('descrição',null,['class'=>'form-control']) !!}   
        
        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Criar Despesa', ['class'=>'btn btn-primary']) !!}
    </div>
    
    
    
    {!! Form::close() !!}
    
</div>
    

@endsection
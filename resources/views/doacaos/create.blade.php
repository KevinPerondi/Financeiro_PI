@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Cadastro de Doações</h3>
    
    @if($errors->any())
        <ul class="allert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'doacaos.store', 'class'=>'form']) !!}
    
    <div class="form-group">
        {!! Form::label('Valor', 'Valor:') !!}
        {!! Form::text('valor',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Donatário', 'Donatário:') !!}
        {!! Form::text('donatario',null,['class'=>'form-control']) !!}   
        
        {!! Form::label('Data', 'Data:') !!}
        {!! Form::text('data',null,['class'=>'form-control']) !!}          
        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Criar Doação', ['class'=>'btn btn-primary']) !!}
    </div>
    
    {!! Form::close() !!}
    
</div>

@endsection
@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Edição de Despesa: {{$despesa->descrição}}</h3>

    @if($errors->any())
        <ul class="allert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($despesa,['route'=>['admin.despesas.update', $despesa->id]]) !!}
    
    <div class="form-group">
        {!! Form::label('Valor', 'Valor:') !!}
        {!! Form::text('valor',null,['class'=>'form-control']) !!}
        
        {!! Form::label('Descrição', 'Descrição:') !!}
        {!! Form::text('descrição',null,['class'=>'form-control']) !!}   
        
        {!! Form::label('Vencimento', 'Vencimento:') !!}
        {!! Form::text('vencimento',null,['class'=>'form-control']) !!}          
        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Editar Despesa', ['class'=>'btn btn-primary']) !!}
    </div>
    
    
    
    {!! Form::close() !!}
    
</div>
    

@endsection
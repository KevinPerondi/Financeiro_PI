@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Editar Mensalidades:</h3>

    @if($errors->any())
        <ul class="allert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model(['route'=>['mensalidades.update']]) !!}
    
    <div class="form-group">
        {!! Form::label('Valor', 'Valor:') !!}
        {!! Form::text('valor',null,['class'=>'form-control']) !!}        
    </div>
    
    <div class="form-group">
        {!! Form::submit('Editar Mensalidades', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    
</div>
    

@endsection
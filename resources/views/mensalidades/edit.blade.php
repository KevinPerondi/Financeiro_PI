@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Mensalidades</h3> 

    @if($errors->any())
        <ul class="allert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
  
    <table class="table table-bordered">
        <thead>
        <th>Valor atual</th>
        <th>Dia</th>
</thead>

<tbody>
        <td>{{$valor}}</td>
         <td>{{$dia}}</td>
</tbody>
</table>

    {!! Form::open(['route'=>'admin.mensalidades.update', 'class'=>'form']) !!}
        <div class="form-group">
            {!! Form::label('Valor', 'Valor:') !!}
            {!! Form::text('valor',$valor,['class'=>'form-control']) !!}
            {!! Form::label('Dia do Vencimento', 'Dia do Vencimento:') !!}
            {!! Form::text('dia',$dia,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::submit('Editar Mensalidade', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
<table class="table table-bordered">
<thead>
            <tr>
                <th>Valor</th>
                <th>Vencimento</th>
                <th>Ação</th>
            </tr>         
        </thead>
        <tbody>
             @foreach($mensalidades as $mensalidade)
            <tr>
                <td>{{$mensalidade->valor}}</td>
                <td>{{$mensalidade->vencimento}}</td>
                <td>
                    <a href="{{route('admin.mensalidades.delete',['vencimento'=>$mensalidade->vencimento])}}" class="btn btn-default btn-sm">
                        Remover Mensalidade
                    </a>

            </tr>
                @endforeach 
 
            
        </tbody>        
    </table>
    
</div>
    

@endsection
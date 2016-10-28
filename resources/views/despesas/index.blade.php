@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Despesas</h3>
    
    <a href="{{route('despesas.create')}}" class="btn btn-default">Nova Despesa</a>
    <br><br>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Vencimento</th>
                <th>Ação</th>
            </tr>
            
        </thead>
        <tbody>
             @foreach($despesas as $despesa)
            <tr>
                 <td>{{$despesa->valor}}</td>
                <td>{{$despesa->descrição}}</td>
                <td>{{$despesa->vencimento}}</td>
                <td><a href="{{route('despesas.edit',['id'=>$despesa->id])}}" class="btn btn-default btn-sm">
                        Editar
                    </a>
                    <a href="{{route('despesas.remove',['id'=>$despesa->id])}}" class="btn btn-default btn-sm">
                        Remover
                    </a>
                </td>

            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
    {!! $despesas->render() !!}
</div>
    

@endsection
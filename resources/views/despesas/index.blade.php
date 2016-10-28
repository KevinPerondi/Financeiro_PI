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
            </tr>
            
        </thead>
        <tbody>
             @foreach($despesas as $despesa)
            <tr>
                <th>{{$despesa->valor}}</th>
                <th>{{$despesa->descrição}}</th>
                <th>{{$despesa->vencimento}}</th>
                
            </tr>
             @endforeach
            
        </tbody>
            
        
        
    </table>
    
    {!! $despesas->render() !!}
</div>
    

@endsection
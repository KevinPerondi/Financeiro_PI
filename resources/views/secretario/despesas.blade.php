@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Despesas</h3>
    
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
                 <td>{{$despesa->valor}}</td>
                <td>{{$despesa->descrição}}</td>
                <td>{{$despesa->vencimento}}</td>

            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
    {!! $despesas->render() !!}
</div>
    

@endsection
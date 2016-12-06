@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Doações</h3>

    <br><br>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Donatário</th>
                <th>Data</th>
            </tr>
            
        </thead>
        <tbody>
             @foreach($doacaos as $doacao)
            <tr>
                <td>{{$doacao->valor}}</td>
                <td>{{$doacao->donatario}}</td>
                <td>{{$doacao->data}}</td>
            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
</div>
    

@endsection
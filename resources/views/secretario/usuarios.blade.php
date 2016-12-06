@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Usuarios</h3>
    
    <br> <br>   
    <table class="table table-bordered">
        <thead>Usuarios Ativos
            <tr>
                <th>Cpf</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ação</th>
            
            </tr>
            
        </thead>
        <tbody>
             @foreach($users as $user)
            <tr>
                <td>{{$user->cpf}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->telefone}}</td>
                <td>{{$user->endereço}}</td>
                <td>
                    <a href="{{route('secretario.mensalidades',['user_id'=>$user->id])}}" class="btn btn-default btn-sm">
                        Mensalidades
                    </a>
                    

                </td>
            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>

        <table class="table table-bordered">
        <thead>Usuarios Deletados
            <tr>
                <th>Cpf</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ação</th>
            
            </tr>
            
        </thead>
        <tbody>
             @foreach($usersdeletados as $userdeletado)
            <tr>
                <td>{{$userdeletado->cpf}}</td>
                <td>{{$userdeletado->name}}</td>
                <td>{{$userdeletado->email}}</td>
                <td>{{$userdeletado->telefone}}</td>
                <td>{{$userdeletado->endereço}}</td>
                <td>
                    <a href="{{route('secretario.mensalidades',['user_id'=>$userdeletado->id])}}" class="btn btn-default btn-sm">
                        Mensalidades
                    </a>
                    
                </td>
            </tr>
                @endforeach    
            
        </tbody>
        
    </table>
    
</div>
    

@endsection
@extends('/layouts/app')

@section('content')

<div class="container">
    <h3>Usuarios</h3>
    
    <a href="{{route('users.create')}}" class="btn btn-default">Novo Usuario</a>
    <br> <br>   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cpf</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            
            </tr>
            
        </thead>
        <tbody>
             @foreach($users as $user)
            <tr>
                <td>{{$user->Cpf}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-default btn-sm">
                        Editar
                    </a>
                    <a href="{{route('users.remove',['id'=>$user->id])}}" class="btn btn-default btn-sm">
                        Remover
                    </a>

                </td>
            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
    {!! $users->render() !!}
</div>
    

@endsection
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
            
            </tr>
            
        </thead>
        <tbody>
             @foreach($users as $user)
            <tr>
                 <th>{{$user->Cpf}}</th>
                <th>{{$user->name}}</th>
                <th>{{$user->email}}</th>
                
            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
    {!! $users->render() !!}
</div>
    

@endsection
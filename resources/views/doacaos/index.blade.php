@extends('/layouts/app')

@section('content')

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->  


<div class="container">
    <h3>Doações</h3>
    
    <a href="{{route('admin.doacaos.create')}}" class="btn btn-default">Nova Doação</a>
    <br><br>    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Donatário</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
            
        </thead>
        <tbody>
             @foreach($doacaos as $doacao)
            <tr>
                 <td>{{$doacao->valor}}</td>
                <td>{{$doacao->donatario}}</td>
                <td>{{$doacao->data}}</td>
                <td><a href="{{route('admin.doacaos.edit',['id'=>$doacao->id])}}" class="btn btn-default btn-sm">
                        Editar
                    </a>
                    <a href="{{route('admin.doacaos.remove',['id'=>$doacao->id])}}" class="btn btn-default btn-sm" onclick="return confirm('Deseja remover essa doação?');">
                        Remover
                    </a>
                </td>

            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
</div>
    

@endsection
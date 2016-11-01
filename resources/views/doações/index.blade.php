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
    <h3>Despesas</h3>
    
    <a href="{{route('doações.create')}}" class="btn btn-default">Nova Despesa</a>
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
             @foreach($doações as $doação)
            <tr>
                 <td>{{$doação->valor}}</td>
                <td>{{$doação->descrição}}</td>
                <td>{{$doação->vencimento}}</td>
                <td><a href="{{route('doações.edit',['id'=>$doação->id])}}" class="btn btn-default btn-sm">
                        Editar
                    </a>
                    <a href="{{route('doações.remove',['id'=>$doação->id])}}" class="btn btn-default btn-sm">
                        Remover
                    </a>
                </td>

            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
    {!! $doações->render() !!}
</div>
    

@endsection
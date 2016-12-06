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
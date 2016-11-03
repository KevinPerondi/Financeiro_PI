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
    <h3>Mensalidades</h3>
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Donatário</th>
                <th>Data</th>
            </tr>
            
        </thead>
        <tbody>
             @foreach($mensalidades as $mensalidade)
            <tr>
                <td>{{$mensalidade->valor}}</td>
                <td>{{$mensalidade->vencimento}}</td>
                <td>{{$mensalidade->status}}</td>
                </td>

            </tr>
                @endforeach    
            
        </tbody>
            
        
        
    </table>
    
    {!! $mensalidades->render() !!}
</div>
    

@endsection
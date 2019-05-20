@extends('template.master') 
@section('conteudo')

<main role="main" class="container">
<form action="{{route('prod.insert')}}" method="POST">
@csrf
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Cadastrar Novo Pedido</h5>
		<div class="row">
			<div class="col-md-12">
			<a href="{{route('ped.novo')}}" class="btn btn-danger">Novo</a>
				
			</div>
		</div>
	</div>
</div>
</form>
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Pedidos Cadastrados</h5>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($pedidos))
 	@if (count($pedidos) > 0)
 		@foreach($pedidos as $pedido)
        <tr>
          <th scope="row">{{$pedido->id}}</th>
          <td>{{$pedido->created_at}}</td>
        </tr>
        @endforeach
        @else  
      <tr>      
          <td colspan="5" class="text-center">Nada para Exibir!</td>      
        </tr>    
        @endif  
  @else  
  <tr>      
      <td colspan="5" class="text-center">Nada para Exibir!</td>      
    </tr>    
    @endif
  </tbody>
</table>
	</div>
</div>


</main>
<!-- /.container -->
@endsection
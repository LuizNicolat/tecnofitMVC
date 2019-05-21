@extends('template.master') 
@section('conteudo')

<main role="main" class="container">
<form action="{{route('prod.adicionarProdutos', ['idPedido' => $pedido->id])}}" method="get">
@csrf
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Pedido Nº {{$pedido->id}}</h5>
		<div class="row">
			<div class="col-md-4">
				<label for="inputValor">Valor Total:</label> 
				@if(isset($totalProdutos))
				<input type="text" readonly="readonly" name="inputValor" id="inputVlor"
					class="form-control" value="R$ {{$totalProdutos}}">
				@else
				<input type="text" readonly="readonly" name="inputValor" id="inputVlor"
					class="form-control" value="R$ 0,00">
				@endif
			</div>
			<div class="col-md-4">
				@if(isset($qtdProdutos))
				<label for="inputQtd">Quantidade Total</label> <input type="text"  readonly="readonly"
					name="inputQtd" id="inputNome" class="form-control" value="{{$qtdProdutos}}">
				@else
				<label for="inputQtd">Quantidade Total</label> <input type="text"  readonly="readonly"
					name="inputQtd" id="inputNome" class="form-control" value="0">
				@endif
			</div>			
			<div class="col-md-4">
				<label for="inputData">Data do Pedido</label> <input type="text"
					name="inputDescricao" id="inputData" class="form-control" value="{{$pedido->created_at}}" readonly="readonly">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<input type="submit" class="btn btn-primary mt-3" value="Adicionar Produto(s)">
			</div>
		</div>
	</div>
</div>
</form>
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Produtos do Pedido</h5>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Total Produto</th>
      <th scope="col">Código Produto</th>
      <th scope="col">Nome Produto</th>
      <th scope="col">Remover Produto</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($produtos))
 	@if (count($produtos) > 0)
 		@foreach($produtos as $prod)
        <tr>
          <th scope="row">{{$prod->ID}}</th>
          <td>{{$prod->Total_produto}}</td>
          <td>{{$prod->Produto}}</td>
          <td>{{$prod->produto->Nome}}</td>
          <td><a href="{{route('ped.removeProduto', ['idPedido' => $pedido->id, 'idProduto' => $prod->ID])}}" class="btn btn-success">Remover</a></td>
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
		<a href="{{route('ped.index')}}" class="btn btn-primary">Finalizar</a>
	</div>
</div>


</main>
<!-- /.container -->
@endsection


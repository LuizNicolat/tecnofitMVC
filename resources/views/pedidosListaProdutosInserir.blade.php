@extends('template.master') 
@section('conteudo')

<main role="main" class="container">

<div class="card">
	<div class="card-body">
	<h5 class="card-title">Selecione um dos produtos abaixo para adicionar ao pedido {{$idPedido}}</h5>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SKU</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($produtos))
 	@if (count($produtos) > 0)
 		@foreach($produtos as $produto)
        <tr>
          <th scope="row">{{$produto->id}}</th>
          <td>{{$produto->SKU}}</td>
          <td>{{$produto->Nome}}</td>
          <td><?=str_replace('.', ',', $produto->preco)?></td>
          <td><a href="{{route('prod.salvarProdutos', ['idPedido' => $idPedido, 'idProduto' => $produto->id])}}" class="btn btn-success">Adicionar</a></td>
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

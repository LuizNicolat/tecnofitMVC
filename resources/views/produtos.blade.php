@extends('template.master') 
@section('conteudo')

<main role="main" class="container">
<form action="{{route('prod.insert')}}" method="POST">
@csrf
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Cadastrar Novo Produto</h5>
		<div class="row">
			<div class="col-md-2">
				<label for="inputSKU">SKU</label> <input type="text" name="inputSKU" id="inputSKU"
					class="form-control">
			</div>
			<div class="col-md-5">
				<label for="inputNome">Nome</label> <input type="text"
					name="inputNome" id="inputNome" class="form-control">
			</div>
			<div class="col-md-5">
				<label for="inputPreco">Preço</label> <input type="text"
					name="inputPreco" id="inputPreco" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label for="inputDescricao">Descrição</label> <input type="text"
					name="inputDescricao" id="inputDescricao" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<input type="submit" class="btn btn-primary mt-3" value="Cadastrar">
			</div>
		</div>
	</div>
</div>
</form>
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Produtos Cadastrados</h5>
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
          <td><a href="{{route('prod.editar', ['id' => $produto->id])}}" class="btn btn-info">Editar</a> | <a href="{{route('prod.deletar', ['id' => $produto->id])}}" class="btn btn-danger">Deletar</a></td>
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
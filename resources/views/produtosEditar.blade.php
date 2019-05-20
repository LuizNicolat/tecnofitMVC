@extends('template.master') 
@section('conteudo')

<main role="main" class="container">
<form action="{{route('prod.salvarEditar')}}" method="POST">
@csrf
<div class="card">
	<div class="card-body">
	<h5 class="card-title">Cadastrar Novo Produto</h5>
		<div class="row">
		<input type="hidden" name="idproduto" id="idproduto" value="{{$produtoeditar->id}}">
			<div class="col-md-2">
				<label for="inputSKU">SKU</label> <input type="text" name="inputSKU" id="inputSKU" value="{{$produtoeditar->SKU}}"
					class="form-control">
			</div>
			<div class="col-md-5">
				<label for="inputNome">Nome</label> <input type="text" value="{{$produtoeditar->Nome}}"
					name="inputNome" id="inputNome" class="form-control">
			</div>
			<div class="col-md-5">
				<label for="inputPreco">Preço</label> <input type="text" value="<?=str_replace('.', ',', $produtoeditar->preco)?>"
					name="inputPreco" id="inputPreco" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label for="inputDescricao">Descrição</label> <input type="text" value="{{$produtoeditar->Descricao}}"
					name="inputDescricao" id="inputDescricao" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<input type="submit" class="btn btn-primary mt-3" value="Salvar">
			</div>
		</div>
	</div>
</div>
</form>
</main>
<!-- /.container -->
@endsection
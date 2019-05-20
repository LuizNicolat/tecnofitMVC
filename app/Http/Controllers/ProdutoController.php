<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        
        return view('produtos', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request); */
        
        $produto = new Produto;
        
        $produto->SKU = $request->inputSKU;
        $produto->Nome = $request->inputNome;
        $produto->Descricao = $request->inputDescricao;
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $request->inputPreco);
        $produto->preco = $valor;
        
        $produto->save();
        
        return redirect()->route('prod.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoEditar = Produto::find($id);
        
        return view('produtosEditar', ['produtoeditar' => $produtoEditar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {        
        $produtoAtualizar = Produto::find($request->idproduto);
        
        $produtoAtualizar->SKU = $request->inputSKU;
        $produtoAtualizar->Nome = $request->inputNome;
        $produtoAtualizar->Descricao = $request->inputDescricao;
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $request->inputPreco);
        $produtoAtualizar->preco = $valor;
        
        $produtoAtualizar->save();
        
        return redirect()->route('prod.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $produtoDeletar = Produto::find($id);
       $produtoDeletar->delete();
       
       return redirect()->route('prod.index');
    }
}

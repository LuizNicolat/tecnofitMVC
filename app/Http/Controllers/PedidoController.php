<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\IndicePedido;
use Carbon\Carbon;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = IndicePedido::all();
        
        return view('pedidos', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new IndicePedido;
        $pedido->save();        
        
        Session::put('idPedido', $pedido->id);  
        
        return view('pedidosnovo', ['pedido' =>$pedido]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function addprodutos($idPedido){
        
        $produtos = Produto::all();
        
        return view('pedidosListaProdutosInserir', ['idPedido' => $idPedido, 'produtos' => $produtos]);
    }
    
    public function inserirprodutosPedido($idPedido, $idProduto){
        
        $pedido = new Pedido;
        $prod = Produto::find($idProduto);        
        $pedido->Produto = $idProduto;        
        $pedido->Total_produto = $prod->preco;
        $pedido->indicePedido = $idPedido;
        $pedido->Data = Carbon::now();
        
        $pedido->save();        
        $indicePedido = IndicePedido::find($idPedido);
        $produtos = Pedido::where('indicePedido', $idPedido)->get();
        $qtdprodutosPedido = Pedido::where('indicePedido', $idPedido)->count();
        $valorTotal =$produtos->sum('Total_produto');
        
        return view('pedidosNovo', ['pedido' => $indicePedido, 'produtos' => $produtos, 'qtdProdutos' => $qtdprodutosPedido, 'totalProdutos' => $valorTotal]);
    }
    
    public function removerProdutosPedido($idPedido, $idProduto){
        
        $produto = Pedido::find($idProduto);
        $produto->delete();
        
        $indicePedido = IndicePedido::find($idPedido);
        $produtos = Pedido::where('indicePedido', $idPedido)->get();
        $qtdprodutosPedido = Pedido::where('indicePedido', $idPedido)->count();
        $valorTotal =$produtos->sum('Total_produto');
        
        return view('pedidosNovo', ['pedido' => $indicePedido, 'produtos' => $produtos, 'qtdProdutos' => $qtdprodutosPedido, 'totalProdutos' => $valorTotal]);
    }    
}

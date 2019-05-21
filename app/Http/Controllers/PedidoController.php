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
    
    public function detalhesDoPedido($id){
        
        $indicePedido = IndicePedido::find($id);
        $produtos = Pedido::where('indicePedido', $id)->get();
        $qtdprodutosPedido = Pedido::where('indicePedido', $id)->count();
        $valorTotal =$produtos->sum('Total_produto');
        
        return view('pedidosDetalhes', ['pedido' => $indicePedido, 'produtos' => $produtos, 'qtdProdutos' => $qtdprodutosPedido, 'totalProdutos' => $valorTotal]);
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
    
    public function deletar($id){        
        
        $indicePedido = IndicePedido::find($id);
        $deletar = Pedido::where('indicePedido', $id)->get();
        $indicePedido->delete();
        foreach ($deletar as $del) {
            $del->delete();
        }
        
        return redirect()->route('ped.index');
    }
}

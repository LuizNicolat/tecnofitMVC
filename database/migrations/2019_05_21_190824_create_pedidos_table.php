<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->decimal('Total_produto', 10,2);
            $table->date('Data');
            $table->unsignedBigInteger('Produto');
            $table->unsignedBigInteger('indicePedido');
            
            $table->foreign('Produto')->references('id')->on('Produtos');
            $table->foreign('indicePedido')->references('id')->on('indice_pedidos')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

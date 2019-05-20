<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property float $Total_produto
 * @property string $Data
 * @property integer $Produto
 * @property integer $indicePedido
 * @property string $created_at
 * @property string $updated_at
 * @property IndicePedido $indicePedido
 * @property Produto $produto
 */
class Pedido extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Pedidos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['Total_produto', 'Data', 'Produto', 'indicePedido', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function indicePedido()
    {
        return $this->belongsTo('App\Models\IndicePedido', 'indicePedido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto', 'Produto');
    }
}

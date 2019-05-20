<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $SKU
 * @property string $Nome
 * @property string $Descricao
 * @property float $preco
 * @property string $created_at
 * @property string $updated_at
 */
class Produto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Produtos';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['SKU', 'Nome', 'Descricao', 'preco', 'created_at', 'updated_at'];

}

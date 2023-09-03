<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 * 
 * @property int $id
 * @property int $supplier_has_product_id
 * @property int $in_stock
 * @property float $cost_price
 * @property float $selling_price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Stock extends Model
{

	protected $table = 'stock';

	protected $casts = [
		'supplier_has_product_id' => 'int',
		'in_stock' => 'int',
		'cost_price' => 'float',
		'selling_price' => 'float'
	];

	protected $fillable = [
		'supplier_has_product_id',
		'in_stock',
		'cost_price',
		'selling_price'
	];
}

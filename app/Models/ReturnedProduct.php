<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReturnedProduct
 * 
 * @property int $id
 * @property int $shop_id
 * @property int $stock_id
 * @property int $return_count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ReturnedProduct extends Model
{

	protected $table = 'returned_products';

	protected $casts = [
		'shop_id' => 'int',
		'stock_id' => 'int',
		'return_count' => 'int'
	];

	protected $fillable = [
		'shop_id',
		'stock_id',
		'return_count'
	];
}

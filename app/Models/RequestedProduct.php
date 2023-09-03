<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RequestedProduct
 * 
 * @property int $id
 * @property int $shop_id
 * @property int $product_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class RequestedProduct extends Model
{

	protected $table = 'requested_products';

	protected $casts = [
		'shop_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'shop_id',
		'product_id'
	];
}

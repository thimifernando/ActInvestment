<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Released_to_shop
 * 
 * @property int $id
 * @property int $shop_id
 * @property int $stock_id
 * @property int $from_stock
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ReleasedToShop extends Model
{

	protected $table = 'released_to_shops';

	protected $casts = [
		'shop_id' => 'int',
		'stock_id' => 'int',
		'from_stock' => 'int'
	];

	protected $fillable = [
		'shop_id',
		'stock_id',
		'from_stock'
	];
}

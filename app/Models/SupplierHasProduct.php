<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierHasProduct
 * 
 * @property int $id
 * @property int $supplier_id
 * @property int $product_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class SupplierHasProduct extends Model
{

	protected $table = 'supplier_has_products';

	protected $casts = [
		'supplier_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'supplier_id',
		'product_id'
	];
}

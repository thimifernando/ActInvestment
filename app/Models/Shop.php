<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shop
 * 
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $contact_no
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Shop extends Model
{

	protected $table = 'shops';

	protected $fillable = [
		'name',
		'address',
		'contact_no'
	];
}

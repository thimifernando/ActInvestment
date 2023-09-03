<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
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
class Supplier extends Model
{

	protected $table = 'suppliers';

	protected $fillable = [
		'name',
		'address',
		'contact_no'
	];

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeRequest extends Model
{
    use HasFactory;
    
    public function registered_package()
    {
        return $this->belongsTo(RegisteredPackage::class);
    }
}

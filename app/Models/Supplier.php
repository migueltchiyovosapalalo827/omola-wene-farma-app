<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'city', 'country', 'postalCode'];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }
}

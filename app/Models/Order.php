<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = ['client_name', 'client_address', 'total_product_value', 'total_shipping_value', 'product_id', 'status'];
}

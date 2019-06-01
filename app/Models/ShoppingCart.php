<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = "vp_shoppingcart";
    protected $primaryKey = "cart_id";
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "vp_categories";
    protected $primaryKey = "cate_id";
    
    //khong co field nao dc bao ve. hoan toan co the tuong tac
    protected $guarded = [];
}

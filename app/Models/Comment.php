<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "vp_comments";
    protected $primaryKey = "comm_id";
    
    //khong co field nao dc bao ve. hoan toan co the tuong tac
    protected $guarded = [];
}

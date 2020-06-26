<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id','userId','adrId','total','status','transaction_id'];
    protected $casts = [
        'id' => "string"
    ];
}

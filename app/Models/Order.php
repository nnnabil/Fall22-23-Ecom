<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps   = false;

    
    public function orderdetails(){
        return $this->hasMany(OrderDetail::class,'order_id');
        //general syntax hasMany(model, foreignkey,primarykey)
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','phone');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){
        return $this->hasOne(Customers::class, 'customer_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}

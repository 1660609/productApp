<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'table_cart';
    protected $fillable = [
        'id', 'product_id','user_id','variant','number_product','price',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
        
    }
    public function variants()
    {
        return $this->belongsTo('App\Models\Variant','variant');
    }
    
}

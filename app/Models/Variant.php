<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //
    protected $table = 'table_cart';
    protected $fillable = [
        'id', 'product_id','color','size','quantity','price',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
        
    }
}

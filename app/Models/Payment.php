<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payment';
    protected $fillable = [
        'id', 'product_id','user_id','variant_id','address','phone_number','name','quantity','total_money','paid'
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
        return $this->belongsTo('App\Models\Variant','variant_id');
    }
}

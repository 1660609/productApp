<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    //
    protected $table = 'buy';
    protected $fillable = [
        'id', 'product_id','user_id','address','phone_number','name','quantity','total_money',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
        
    }
}

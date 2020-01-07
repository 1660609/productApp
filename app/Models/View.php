<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //
    protected $table = 'views';
    protected $fillable = [
        'id', 'product_id','user_id','view',
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

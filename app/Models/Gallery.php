<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Gallery extends Model
{
    //
    use SoftDeletes;
    protected $table = 'galleries';
    public $timestamps = false;
    protected $fillable = [
        'gallery_path', 'product_id','gallery_size'
    ];
    public function product()  
    {
            return $this->belongsTo(Products::class);
    }
}

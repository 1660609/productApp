<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
    
class Product extends Model
{
    //
    use SoftDeletes;
    protected $table = 'product';
    protected $fillable = [
        'id_category', 'name','description','content','thumbnail','gallery','price',

    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery','product_id');
        
    }
    public function cart()
    {
        return $this->hasMany('App\Models\Cart','product_id');
    }
    public function view()
    {
        return $this->hasMany('App\Models\View','product_id');
    }
    public function variant()
    {
        return $this->hasMany('App\Models\Variant','product_id');
    }
}

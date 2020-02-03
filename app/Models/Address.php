<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $fillable = [
        'id_user', 'name','phone','address','default'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

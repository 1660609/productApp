<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profiles';
    protected $fillable = [
        'id','first_name','last_name','user_id','description','phone','avatar','DOB','gioitinh','type'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

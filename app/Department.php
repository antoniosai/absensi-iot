<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\User');
    }
}

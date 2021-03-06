<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

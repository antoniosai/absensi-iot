<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rombel()
    {
        return $this->belongsToMany('App\Models\Rombel', 'rombel_siswa');
    }
}

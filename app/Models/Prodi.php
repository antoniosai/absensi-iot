<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'program_studi';

    public $timestamps = false;

    public function rombel()
    {
        return $this->hasMany('App\Models\Rombel');
    }
}

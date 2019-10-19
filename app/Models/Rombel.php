<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = 'rombongan_belajar';

    public function prodi()
    {
        return $this->belongsTo('App\Models\Prodi');
    }

    public function siswa()
    {
        return $this->belongsToMany('App\Models\Siswa', 'rombel_siswa');
    }
}

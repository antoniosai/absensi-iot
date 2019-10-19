<?php

namespace App\Helper;

class DataGenerator {

    const agama = [
        'islam',
        'protestan',
        'katholik',
        'hindu',
        'buddha',
        'konghucu',
    ];

    const kelamin = [
        'l' => 'Laki-laki',
        'p' => 'Perempuan'
    ];

    const golongan_darah = [
        'a', 'b', 'ab', 'o'
    ];

    const bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    const status_progresif = [
        'pending', 'onprogress', 'done'
    ];

    const keterangan = [
        'new' => 'Buat Baru',
        'update' => 'Update Data'
    ];

    // Untuk SMA/sederajat
    const list_tingkat = [
        ['nama' => 'X'],
        ['nama' =>'XI'],
        ['nama' => 'XII']
    ];

    /*
    // Untuk SMP/sederajat
    const list_tingkat = [
        'XII', 'XIII', 'IX'
    ];
    */

    /*
    // Untuk SD/sederajat
    const list_tingkat = [
        'I', 'II', 'III', 'IV, 'V', 'VI'
    ];
    */
}

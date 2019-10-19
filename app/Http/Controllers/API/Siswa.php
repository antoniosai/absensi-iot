<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\User;
use App\Models\Role;
use App\Models\Info;
use App\Models\Rombel;
use App\Models\Siswa as Model;

class Siswa extends Controller
{

    private $tahun_ajaran;
    private $semester;

    public function __construct()
    {
        $info = Info::first();

        $this->tahun_ajaran = $info->tahun_ajaran;
        $this->semester = $info->semester;
    }

    protected function role()
    {
        $role = Role::where('nama', 'siswa')->first();
        return $role;
    }

    public function data()
    {
        // return $this->getRombel(1);
        $siswa = User::where('role_id', $this->role()->id)->get();

        $data = [];

        foreach($siswa as $list)
        {
            $temp = [
                'id' => $list->id,
                'nama' => $list->name,
                'rf_id' => $list->rf_id,
                'nis' => $list->siswa->nis,
                'nik' => $list->siswa->nik,
                'nisn' => $list->siswa->nisn,
                'alamat' => $list->siswa->alamat,
                'ttl' => $list->siswa->tempat_lahir . ', ' . Carbon::parse($list->siswa->tanggal_lahir)->format('d M Y'),

            ];

            if(!$this->getRombel($list->siswa->id))
            {
                $temp['kelas'] = 'Belum terdaftar';
                $temp['span_class'] = 'warning';
            }
            else
            {
                $temp['kelas'] = $this->getRombel($list->siswa->id)->nama;
                $temp['span_class'] = 'primary';
                $temp['kelas_id'] = $this->getRombel($list->siswa->id)->id;
            }

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json([
            'count' => count($siswa),
            'status' => 'success',
            'message' => 'Successfully fetched ' . count($siswa) . ' data(s)',
            'data' => $data
        ], 200);
    }

    public function detail($id)
    {
    }

    private function getRombel($siswa_id)
    {
        $siswa = Model::findOrFail($siswa_id);

        $rombel = $siswa->rombel
        ->where('tahun_ajaran', $this->tahun_ajaran)
        ->where('semester', $this->semester)->first();

        return $rombel;
    }

}

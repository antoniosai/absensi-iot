@extends('layouts.admin.main')

@section('title')
    Manajemen Anggota
@endsection

@section('desc')
    Menambahkan Data Guru, Staff Pengajar dan Siswa
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-striped" id="data-user">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th>RFID</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if($user->role->nama == 'siswa')
                            SISWA - <span class="badge badge-success">{{ $user->department->name }}</span>
                        @else
                        {{ $user->role->nama }}
                        @endif
                    </td>
                    <td>{{ $user->rf_id }}</td>
                    <td>
                        <a href="" class="btn btn-3"></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <center><h3>Tidak Ada Data</h3></center>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


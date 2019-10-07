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
        <div class="panel">
            <header class="panel-heading">
                <span class="tools pull-right">
                    <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">

                {{-- <hr> --}}
                <br>

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
    </div>
</div>
@endsection

@section('top_button')
<div class="clearfix">
    <div class="pull-right">

        <button class="btn btn-default"><i class="fa fa-info-circle"></i> Petunjuk</button>
        <a href="{{ route('admin.absensi') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
</div>
@endsection


@section('styles')
<!--Data Table-->
<link href="/bower_components/datatables/media/css/jquery.dataTables.css" rel="stylesheet">
<link href="/bower_components/datatables-tabletools/css/dataTables.tableTools.css" rel="stylesheet">
<link href="/bower_components/datatables-colvis/css/dataTables.colVis.css" rel="stylesheet">
<link href="/bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
<link href="/bower_components/datatables-scroller/css/scroller.dataTables.scss" rel="stylesheet">
@endsection

@section('scripts')
<!--Data Table-->
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
<script src="/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="/bower_components/datatables-scroller/js/dataTables.scroller.js"></script>

<script>

var dataTable = $('#data-user').DataTable();
</script>

{{-- My Script --}}
<script>
    $('#filter_bulan').change(function(e){
        var bulan = this.value
    });
</script>
@endsection

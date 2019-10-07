@extends('layouts.admin.main')

@section('title')
    Data Progresif
@endsection

@section('desc')

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

                <absen-data></absen-data>
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

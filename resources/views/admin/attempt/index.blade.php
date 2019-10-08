@extends('layouts.admin.main')

@section('title')
    Scan Attempt <small style="color: white">(Daftar percobaan scan RFID ke Sistem)</small>
@endsection

@section('desc')

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <attempt-data></attempt-data>
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

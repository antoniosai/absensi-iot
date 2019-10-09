@extends('layouts.admin.main')

@section('title')
Pengaturan
@endsection

@section('desc')
Pengaturan untuk penggunaan Mesin Absensi
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <setting></setting>
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

@section('scripts')
<script src="/js/app.js"></script>
@endsection

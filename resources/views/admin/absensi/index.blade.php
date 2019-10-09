@extends('layouts.admin.main')

@section('title')
    Data Absensi
@endsection

@section('desc')
    Menampilkan Table Data Absensi
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <absen-data></absen-data>
    </div>
</div>
@endsection


@section('scripts')
<script src="/js/app.js"></script>
@endsection

@extends('layouts.admin.main')

@section('title')
    Scan Attempt
@endsection

@section('desc')
Daftar percobaan scan RFID ke Sistem
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <attempt-data></attempt-data>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/app.js"></script>
@endsection

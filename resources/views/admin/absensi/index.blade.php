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

                <div class="row">

                    <div class="col-md-4">

                        <select name="filter_bulan" id="filter_bulan" class="form-control">
                            @foreach(MY_data::bulan as $key => $value)
                            <option value="{{ $key }}">{{ strtoupper($value) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="month" id="" class="form-control">
                            @for($tahun = 2017; $tahun <= date('Y'); $tahun++)
                            <option value="{{ $tahun }}" @if($tahun == date('Y')) selected @endif>{{ $tahun }}</option>
                        @endfor
                        </select>
                    </div>

                    <div class="col-md-4">

                        <select name="month" id="" class="form-control">
                            @foreach(MY_data::status_progresif as $stat)
                            <option value="{{ $stat }}">{{ strtoupper($stat) }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

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

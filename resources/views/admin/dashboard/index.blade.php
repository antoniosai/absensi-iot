@extends('layouts.admin.main')

@section('title')
    Dashboard
@endsection

@section('desc')
    Halaman Admin
@endsection

@section('content')

<p class="alert alert-success">
    Selamat Datang di <strong>SI PRODUKTIF</strong> (Sistem Informasi Progress Data Kepundudukan Aktif)
</p>

<div class="row">

    <div class="col-md-3 col-sm-6">
        <div class="panel short-states">
            <div class="panel-title">
                <h4> <span class="label label-success pull-right">Pendaftaran Baru</span></h4>
            </div>
            <div class="panel-body">
                <h1 style="text-align: center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-lg btn-success">Klik Disini</a>
                </h1>
                <div class="text-success pull-right">88% <i class="fa fa-level-up"></i></div>
                <small>Annual Income</small>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="panel short-states">
            <div class="panel-title">
                <h4> <span class="label label-danger pull-right">Pending</span></h4>
            </div>
            <div class="panel-body">
                <h1>21/21</h1>
                <small>Bulan September 2019</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="panel short-states">
            <div class="panel-title">
                <h4> <span class="label label-info pull-right">Selesai Ditangani</span></h4>
            </div>
            <div class="panel-body">
                <h1>21/21</h1>
                <div class="text-info pull-right">65%</div>
                <small>Bulan September 2019</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="panel short-states">
            <div class="panel-title">
                <h4> <span class="label label-warning pull-right">Sedang Proses</span></h4>
            </div>
            <div class="panel-body">
                <h1>21/21</h1>
                <div class="text-warning pull-right">77% <i class="fa fa-level-down"></i></div>
                <small>Bulan September 2019</small>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel">
            <header class="panel-heading">
                Project Statistics
                <span class="tools pull-right">
                    <a class="close-box fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div id="b-line" style="height: 370px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1568952877374"><div style="position: relative; overflow: hidden; width: 688px; height: 370px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="688" height="370" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 688px; height: 370px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px/21px sans-serif; padding: 5px; left: 571px; top: 98px;">Thu<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#4aa9e9;"></span>Max: 13<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#eac459;"></span>Min: 2</div></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel">
            <header class="panel-heading">
                Product Sales
                <span class="tools pull-right">
                    <a class="close-box fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div id="b-area" style="height: 370px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1568952877375"><div style="position: relative; overflow: hidden; width: 688px; height: 370px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="688" height="370" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 688px; height: 370px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/assets/js/echarts/echarts-all-3.js"></script>
<script src="{{ asset('assets/js/init-echarts.js') }}"></script>
@endsection

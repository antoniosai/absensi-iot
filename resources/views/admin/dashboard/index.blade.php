@extends('layouts.admin.main')

@section('header')
<table>
    <tr>
        <td>
            <img style="height: 100px" src="{{ asset(App\Info::first()->logo) }}" alt="">
        </td>
        <td>
            <div style="margin-left: 30px; margin-top: -10px">
                <h2>ABSENSI IoT</h2>
                <h3 style="margin-top: -10px">SMK DARUSSALAM TAROGONG KALER</h3>
                <p style="color: white">Kp. Cilame, RT.04/RW.06, Sukajadi, Kec. Tarogong Kaler, Kabupaten Garut, Jawa Barat 44151</p>
            </div>
        </td>
    </tr>
</table>
@endsection

@section('dashboard')
<div class="row" style="margin-top: -12px">

    <div class="col-lg-7">

        <!--Network Line Chart-->
        <!--===================================================-->
        <div id="demo-panel-network" class="panel">
            <div class="panel-heading">
                <div class="panel-control">
                    <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary"
                        data-toggle="panel-overlay" data-target="#demo-panel-network"><i
                            class="demo-psi-repeat-2"></i></button>
                    <div class="dropdown">
                        <button class="dropdown-toggle btn btn-default btn-active-primary" data-toggle="dropdown"
                            aria-expanded="false"><i class="demo-psi-dot-vertical"></i></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <h3 class="panel-title">Network</h3>
            </div>


            <!--chart placeholder-->
            <div class="pad-all">
                <div id="demo-chart-network" style="height: 255px; padding: 0px; position: relative;"><canvas
                        class="flot-base" width="598" height="255"
                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 598.078px; height: 255px;"></canvas>
                    <div class="flot-text"
                        style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis"
                            style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 50px; text-align: center;">
                                5</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 103px; text-align: center;">
                                10</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 159px; text-align: center;">
                                15</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 214px; text-align: center;">
                                20</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 270px; text-align: center;">
                                25</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 326px; text-align: center;">
                                30</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 382px; text-align: center;">
                                35</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 438px; text-align: center;">
                                40</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 494px; text-align: center;">
                                45</div>
                            <div class="flot-tick-label tickLabel"
                                style="position: absolute; max-width: 49px; top: 240px; left: 550px; text-align: center;">
                                50</div>
                        </div>
                    </div><canvas class="flot-overlay" width="598" height="255"
                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 598.078px; height: 255px;"></canvas>
                    <div class="legend">
                        <div
                            style="position: absolute; width: 101px; height: 34px; top: 8px; left: 8px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                        </div>
                        <table style="position:absolute;top:8px;left:8px;;font-size:smaller;color:#545454">
                            <tbody>
                                <tr>
                                    <td class="legendColorBox">
                                        <div style="border:1px solid #ccc;padding:1px">
                                            <div
                                                style="width:4px;height:0;border:5px solid rgb(181,191,197);overflow:hidden">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="legendLabel">Download Speed</td>
                                </tr>
                                <tr>
                                    <td class="legendColorBox">
                                        <div style="border:1px solid #ccc;padding:1px">
                                            <div
                                                style="width:4px;height:0;border:5px solid rgb(37,71,106);overflow:hidden">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="legendLabel">Upload Speed</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!--Chart information-->
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-8">
                        <p class="text-semibold text-uppercase text-main">CPU Temperature</p>
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="media">
                                    <div class="media-left">
                                        <span class="text-3x text-thin text-main">43.7</span>
                                    </div>
                                    <div class="media-body">
                                        <p class="mar-no">°C</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-7 text-sm">
                                <p>
                                    <span>Min Values</span>
                                    <span class="pad-lft text-semibold">
                                        <span class="text-lg">27°</span>
                                        <span class="labellabel-success mar-lft">
                                            <i class="pci-caret-down text-success"></i>
                                            <smal>- 20</smal>
                                        </span>
                                    </span>
                                </p>
                                <p>
                                    <span>Max Values</span>
                                    <span class="pad-lft text-semibold">
                                        <span class="text-lg">69°</span>
                                        <span class="labellabel-danger mar-lft">
                                            <i class="pci-caret-up text-danger"></i>
                                            <smal>+ 57</smal>
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="pad-rgt">
                            <p class="text-semibold text-uppercase text-main">Today Tips</p>
                            <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                diam nonummy nibh euismod tincidunt.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <p class="text-uppercase text-semibold text-main">Bandwidth Usage</p>
                        <ul class="list-unstyled">
                            <li>
                                <div class="media pad-btm">
                                    <div class="media-left">
                                        <span class="text-2x text-thin text-main">754.9</span>
                                    </div>
                                    <div class="media-body">
                                        <p class="mar-no">Mbps</p>
                                    </div>
                                </div>
                            </li>
                            <li class="pad-btm">
                                <div class="clearfix">
                                    <p class="pull-left mar-no">Income</p>
                                    <p class="pull-right mar-no">70%</p>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-info" style="width: 70%;">
                                        <span class="sr-only">70% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="clearfix">
                                    <p class="pull-left mar-no">Outcome</p>
                                    <p class="pull-right mar-no">10%</p>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-primary" style="width: 10%;">
                                        <span class="sr-only">10% Complete</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <!--===================================================-->
        <!--End network line chart-->

    </div>


    <div class="col-md-5">

        <div class="row">

            <div class="col-md-6">

                <div class="panel panel-success panel-colorful">
                    <div class="pad-all media">
                        <div class="media-left">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no media-heading">15<br>Guru</p>
                            <span>Visit Today</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="panel panel-info panel-colorful">
                    <div class="pad-all media">
                        <div class="media-left">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no media-heading">216 Siswa</p>
                            <span>Visit Today</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="panel panel-danger panel-colorful">
                    <div class="pad-all media">
                        <div class="media-left">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no media-heading">216 Siswa</p>
                            <span>Visit Today</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="panel panel-warning panel-colorful">
                    <div class="pad-all media">
                        <div class="media-left">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no media-heading">216 Siswa</p>
                            <span>Visit Today</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/js/demo/dashboard.js"></script>

<script src="/plugins/flot-charts/jquery.flot.min.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.categories.min.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.orderBars.min.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="/plugins/flot-charts/jquery.flot.resize.min.js"></script>

    <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
@endsection

@section('styles')
<!--Demo [ DEMONSTRATION ]-->
@endsection

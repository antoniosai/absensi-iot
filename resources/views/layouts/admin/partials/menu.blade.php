<ul class="nav navbar-nav">
    <li class="{{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i><span> Dashboard </span></a>
    </li>

    <li class="{{ Route::currentRouteNamed('admin.absensi') ? 'active' : '' }}">
        <a href="{{ route('admin.absensi') }}"><i class="fa fa-clock-o"></i><span> Real-Time Absensi </span></a>
    </li>

    <li class="{{ Route::currentRouteNamed('admin.attempt') ? 'active' : '' }}">
        <a href="{{ route('admin.attempt') }}"><i class="fa fa-times"></i><span> Scan Attempts </span></a>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-submenu="" aria-expanded="false">
            <i class="fa fa-database"></i>
            Data Master <span class="fa fa-angle-down"></span>
        </a>

        <ul class="dropdown-menu">
            <li><a tabindex="0" href="{{ route('admin.user') }}"><i class="fa fa-users"></i> Data Anggota</a></li>
            <li><a tabindex="0"><i class="fa fa-building"></i> Data Kelas</a></li>
            <li><a tabindex="0"><i class="fa fa-lock"></i> Data Role/Hak Akses</a></li>

        </ul>
    </li>

    <li class="">
        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-question-circle"></i><span> Bantuan </span></a>
    </li>

</ul>

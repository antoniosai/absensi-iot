<template>
    <div>
        <ul id="mainnav-menu" class="list-group">

            <!--Category name-->
            <li class="list-header">Navigation</li>

            <li :class="{'active-link' : subIsActive('/dashboard')}" exact>
                <router-link :to="{name: 'dashboard'}">
                    <i class="demo-pli-home"></i>
                    <span class="menu-title">
                        Dashboard
                    </span>
                </router-link>
            </li>

            <!--Menu list item-->
            <li :class="{'active-link' : subIsActive('/user_management')}" exact>
                <router-link :to="{name: 'user'}">
                    <i class="demo-pli-male"></i>
                    <span class="menu-title">
                        Manajemen User
                    </span>
                </router-link>
            </li>

            <!--Menu list item-->
            <li :class="{'active-link' : subIsActive('/absensi')}">
                <router-link :to="{ name: 'absensi'}">
                    <i class="fa fa-calendar-o"></i>
                    <span class="menu-title">
                        Absensi
                    </span>
                </router-link>
            </li>

            <li>
                <a href="#">
                    <i class="demo-pli-bar-chart"></i>
                    <span class="menu-title">Report</span>
                    <i class="arrow"></i>
                </a>

                <!--Submenu-->
                <ul class="collapse">
                    <li><a href="index.html">Harian</a></li>
                    <li><a href="dashboard-2.html">Bulanan</a></li>
                    <li><a href="dashboard-3.html">Triwulan</a></li>
                    <li><a href="dashboard-3.html">Semester</a></li>
                    <li><a href="dashboard-3.html">Tahunan</a></li>
                </ul>
            </li>

            <!--Menu list item-->
            <li :class="{'active-link' : subIsActive('/master_data')}" exact>
                <a href="#" aria-expanded="true">
                    <i class="fa fa-briefcase"></i>
                    <span class="menu-title">Master Data</span>
                    <i class="arrow"></i>
                </a>

                <!--Submenu-->
                <ul class="collapse" aria-expanded="false">
                    <li :class="{'active-link' : subIsActive('/master_data/info_lembaga')}">
                        <router-link :to="{name: 'info_lembaga'}">Info Lembaga</router-link>
                    </li>
                    <li><a href="/">Pegawai</a></li>
                    <li :class="{'active-link' : subIsActive('/master_data/program_studi')}">
                        <router-link :to="{name: 'prodi'}">Program Studi</router-link>
                    </li>
                    <li :class="{'active-link' : subIsActive('/master_data/rombel')}">
                        <router-link :to="{name: 'rombel'}">Rombel</router-link>
                    </li>
                    <li :class="{'active-link' : subIsActive('/master_data/siswa')}">
                        <router-link :to="{name: 'siswa'}">Siswa</router-link>
                    </li>
                    <li><a href="dashboard-3.html">Hak Akses</a></li>
                </ul>
            </li>

            <!--Menu list item-->

            <li :class="{'active-link' : subIsActive('/setting')}">
                <router-link :to="{name: 'setting'}">
                    <i class="fa fa-cog"></i>
                    <span class="menu-title">
                        Pengaturan
                    </span>
                </router-link>
            </li>

            <li :class="{'active-link' : subIsActive('/scan_attempt')}">
                <router-link :to="{ name: 'attempt'}">
                    <i class="fa fa-credit-card-alt"></i>
                    <span class="menu-title">
                        Scan Attempts
                    </span>
                </router-link>

            </li>

        </ul>
    </div>
</template>

<script>
export default {
  methods: {

    subIsActive(input) {
      const paths = Array.isArray(input) ? input : [input]
      return paths.some(path => {
        return this.$route.path.indexOf(path) === 0 // current path starts with this path string
      })

    },

    openMenu: function()
    {
      $('.collapse').collapse('show');
    }

  }
}
</script>

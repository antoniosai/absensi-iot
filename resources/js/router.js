import Vue from 'vue'
import Router from 'vue-router'

import store from './store'

import Dashboard from './pages/dashboard/Data'
import Absensi from './pages/absensi/Data'
import Attempt from './pages/attempt/Data'
import User from './pages/user_management/Data'
import Role from './pages/user_management/role/Data'


import Setting from './pages/setting/Data'
import Error404 from './pages/error/404'

// Info lembaga
import Info from './pages/info/Data'

// Program Studi
import Prodi from './pages/prodi/Data'
import ProdiAdd from './pages/prodi/Add'
import ProdiDetail from './pages/prodi/Detail'

// Rombongan Belajar (Rombel)
import Rombel from './pages/rombel/Data'
import RombelAdd from './pages/rombel/Add'
import RombelDetail from './pages/rombel/Detail'

// Data Siswa
import SiswaData from './pages/siswa/Data'
import SiswaDetail from './pages/siswa/Detail'

// Data Master

Vue.use(Router)

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '/' + mm + '/' + yyyy;

let router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [{
            path: "*",
            component: Error404
        },
        {
            path: '/dashboard',
            alias: '/',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true,
                title: "<strong>Dashboard</strong>",
                sub_title: 'Menampilkan Data pada tanggal ' + today
            }
        },
        {
            path: '/setting',
            name: 'setting',
            component: Setting,
            meta: {
                requiresAuth: true,
                title: 'Pengaturan'
            }
        },

        // Info lembaga
        {
            path: '/master_data/info_lembaga',
            name: 'info_lembaga',
            component: Info,
            meta: {
                requiresAuth: true,
                title: 'Pengaturan Informasi Lembaga / Perusahaan'
            }
        },
        {
            path: '/master_data/program_studi',
            name: 'prodi',
            component: Prodi,
            meta: {
                requiresAuth: true,
                title: 'Manajemen Program Studi',
                sub_title: 'Manajemen Program Studi / Jurusan'
            },
            children: [

            ]
        },
        {
            path: '/master_data/program_studi/add',
            name: 'prodi.add',
            component: ProdiAdd,
            meta: {
                title: 'Formulir Menambahkan Program Studi Baru',
                sub_title: ''
            }
        },
        {
            path: '/master_data/program_studi/detail/:id',
            name: 'prodi.detail',
            component: ProdiDetail,
            meta: {
                title: 'Detail Program Studi',
                sub_title: 'Melihat Data keseluruhan tentang Program Studi'
            }
        },

        // Rombel
        {
            path: '/master_data/rombel',
            name: 'rombel',
            component: Rombel,
            meta: {
                requiresAuth: true,
                title: 'Manajemen Rombongan Belajar',
                sub_title: 'Manajemen Rombongan Belajar (Rombel)'
            },
            children: [

            ]
        },
        {
            path: '/master_data/rombel/add',
            name: 'rombel.add',
            component: RombelAdd,
            meta: {
                requiresAuth: true,
                title: 'Formulir Menambahkan Rombongan Belajar Baru',
                sub_title: ''
            }
        },
        {
            path: '/master_data/rombel/detail/:id',
            name: 'rombel.detail',
            component: RombelDetail,
            meta: {
                requiresAuth: true,
                title: 'Detail Rombongan Belajar',
                sub_title: 'Melihat Data keseluruhan tentang Rombongan Belajar'
            }
        },
        // Start Siswa
        {
            path: '/master_data/siswa',
            name: 'siswa',
            component: SiswaData,
            meta: {
                requiresAuth: true,
                title: 'Manajemen Data Siswa'
            }
        },
        {
            path: '/master_data/siswa/detail/:id',
            name: 'siswa.detail',
            component: SiswaDetail,
            meta: {
                requiresAuth: true,
                title: 'Detail Siswa'
            }
        },
        // End Siswa

        {
            path: '/absensi',
            name: 'absensi',
            component: Absensi,
            meta: {
                requiresAuth: true,
                title: 'Data Absensi'
            }
        },
        {
            path: '/user_management',
            name: 'user',
            component: User,
            meta: {
                requiresAuth: true,
                title: 'Manajemen User',
                sub_title: 'Manajamen User yang hanya bisa login ke Aplikasi'
            },
            children: [
                {
                  // UserProfile will be rendered inside User's <router-view>
                  // when /user/:id/profile is matched
                  path: '/user_management/role',
                  name: 'role',
                  component: Role,
                  meta: {
                    title: 'Pengaturan Hak Akses'
                  }
                },
            ]
        },
        {
            path: '/scan_attempt',
            name: 'attempt',
            component: Attempt,
            meta: {
                requiresAuth: true,
                title: 'Percobaan Scan'
            }
        }
        // End Data Master
    ]
})

var vm = this;

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next()
            return
        }
        next('/login')
    } else {
        next()
    }
})

router.beforeResolve((to, from, next) => {
    if (to.path) {
        NProgress.start()
    }
    next()
});


router.afterEach((to, from, next) => {
    NProgress.done()
});

export default router

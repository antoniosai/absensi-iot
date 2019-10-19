<template>
    <div>

        <div class="row">
            <div class="col-md-12">

                <div class="tab-base">

                    <!--Nav Tabs-->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#informasi_sekolah" aria-expanded="true">Informasi Sekolah</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#edit_informasi" aria-expanded="false">
                                Edit Informasi Sekolah
                                <span class="badge badge-purple">3</span>
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#edit_logo" aria-expanded="false">Edit Lambang Sekolah</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tahun_ajaran" aria-expanded="false">Ganti Tahun Ajaran</a>
                        </li>
                    </ul>

                    <!--Tabs Content-->
                    <div class="tab-content">
                        <div id="informasi_sekolah" class="tab-pane fade active in">
                            <div class="row">
                                <div class="col-md-6">
                                    <TableInfo />
                                </div>
                                <div class="col-md-6">
                                    <center>
                                        <h3>Lambang Sekolah</h3>
                                        <hr>
                                    </center>
                                    <img class="center" style="width: 250px; height: 250px" src="/uploads/logo/logo_smk.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div id="edit_informasi" class="tab-pane fade">

                            <UpdateInfo />

                        </div>

                        <div id="edit_logo" class="tab-pane fade">
                            <h1>Halaman edit Logo</h1>
                        </div>

                        <div id="tahun_ajaran" class="tab-pane fade">
                            <TahunAjaran />
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<script>

import UpdateInfo from './Form'
import TableInfo from './Table'
import TahunAjaran from './TahunAjaran'

import swal from 'sweetalert';
import api_url from '../../api_url';


export default {
    name: 'AbsensiData',

    title: 'Pengaturan Informasi Sekolah',

    components: {
        UpdateInfo, TableInfo, TahunAjaran
    },

    mounted() {
        this.fetchData()
    },

    data: () => ({
        info: {},
        form: {}
    }),

    computed: {
    },

    methods: {

        fetchData: function()
        {
            var vm = this

            axios.get(api_url + '/api/info/data')
            .then(function (res) {
                vm.info = res.data
            })

        },

    }

}
</script>

<style scoped>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

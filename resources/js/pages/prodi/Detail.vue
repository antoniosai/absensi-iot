<template>
    <div>
        <div class="row">

            <div class="col-md-12">


                <div class="tab-base">

                    <!--Nav Tabs-->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#info_prodi" aria-expanded="true">Info</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#data_rombel" aria-expanded="false">
                                List Rombongan Belajar (Rombel)
                                <span class="badge badge-purple">{{ prodi.rombel_count }}</span>
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#edit_prodi" aria-expanded="false">Setting</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#delete_prodi" aria-expanded="false">Hapus Prodi</a>
                        </li>
                    </ul>

                    <!--Tabs Content-->
                    <div class="tab-content">
                        <div id="info_prodi" class="tab-pane fade active in">
                            <table class="table table-hover">
                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td><strong>{{ prodi.slug }} - {{ prodi.nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td><strong>{{ prodi.nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td><strong>{{ prodi.nama }}</strong></td>
                                </tr>

                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td><strong>{{ prodi.nama }}</strong></td>
                                </tr>
                            </table>
                        </div>

                        <div id="data_rombel" class="tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-md-4" v-for="rombel in list_rombel" :key="rombel.id">

                                    <div class="panel panel-success panel-colorful">
                                        <div class="pad-all media">
                                            <div class="media-left">
                                                <i class="fa fa-users fa-4x"></i>
                                            </div>
                                            <div class="media-body" style="padding-left: 20px">
                                                <p class="text-2x mar-no media-heading">{{ rombel.nama }}</p>
                                                <span>Prodi {{ rombel.prodi.nama }}</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-xs progress-dark-base mar-no">
                                            <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-light" style="width: 100%"></div>
                                        </div>
                                        <div class="pad-all text-sm bg-trans-dark">
                                            <span class="text-semibold">{{ rombel.rombel_count }}</span> 23
                                            <div class="pull-right">
                                                <router-link :to="{name: 'rombel.detail', params:{id: rombel.id}}" class="" style="color: white">Lihat selengkap nya</router-link>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div id="edit_prodi" class="tab-pane fade">

                            <div class="row">

                                <div class="col-md-8">

                                    <form>
                                        <div class="form-group">
                                            <label for="slug"><span style="color: red">*)</span> Nama Singkatan / Slug</label>
                                            <input type="text" class="form-control" v-model="prodi.slug" placeholder="Contoh: TKJ, AP, TB" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama"><span style="color: red">*)</span> Nama Lengkap Program Studi</label>
                                            <input type="text" class="form-control" v-model="prodi.nama" placeholder="Nama Lengkap Program Studi" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Nama Lengkap Program Studi</label>
                                            <textarea class="form-control" v-model="prodi.keterangan"></textarea>
                                        </div>
                                    </form>

                                </div>

                                <div class="col-md-4">
                                    <p class="alert alert-warning">
                                        <ul>
                                            <li>Formulir dengan tanda <span style="color: red">*)</span> wajib diisi</li>
                                            <li>Isi data dengan sebaik-baik nya dan benar</li>
                                        </ul>
                                    </p>

                                    <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Simpan Perubahan</button>

                                </div>

                            </div>

                        </div>
                        <div id="delete_prodi" class="tab-pane fade">
                            <div class="alert alert-danger">
                                <ul>
                                    <li><h3 style="color: white">Anda sedang berada di menu hapus Program Studi</h3></li>
                                    <li><h3 style="color: white">Data yang sudah dihapus <strong>tidak dapat dikembalikan</strong> kembali</h3></li>
                                </ul>
                                <br>
                                <center>
                                    <button v-on:click="deleteProdi" class="btn btn-lg btn-default"><i class="fa fa-trash"></i> Lanjut Hapus Program Studi</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</template>

<script>

import swal from 'sweetalert';
import axios from 'axios';

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {

    title: 'Tambah Program Studi',

    data: () => ({
        prodi: {},
        list_rombel: [],
        id: ''
    }),

    mounted() {
        this.id = this.$route.params.id
        this.fetchData()
    },

    computed: {

    },

    methods: {
        fetchData: function() {

            var vm = this

            axios.get( api_url + '/api/prodi/detail/' + this.id, headers)
            .then( res => {
                vm.prodi = res.data
                // vm.list_rombel = res.data.rombel
            })

            axios.get( api_url + '/api/rombel/prodi/' + this.id, headers)
            .then( res => {
                vm.list_rombel = res.data
                // vm.list_rombel = res.data.rombel
            })
        },

        update: function() {

        },

        deleteProdi: function() {

            let vm = this
            swal({
                title: "Hapus Program Studi " + this.prodi.nama + " dari Aplikasi?",
                text: "Data-data tidak akan bisa dikembalikan ketika dihapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((save) => {
                if (save) {
                    axios.delete(api_url + '/api/prodi/' + this.id)
                        .then(function (res) {
                            if (res.data.status == 'success') {
                                toastr.success(res.data.message)
                                vm.$router.push('/master_data/program_studi')
                            }
                        })
                        .catch(function (error) {
                        });
                } else {
                    toastr.info('You cancelled Generating new token')
                    // swal("Your imaginary file is safe!");
                }
            });

        }
    }
}
</script>

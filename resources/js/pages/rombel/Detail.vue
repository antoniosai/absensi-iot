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
                            <p class="text-main text-semibold">Second Tab Content</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
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

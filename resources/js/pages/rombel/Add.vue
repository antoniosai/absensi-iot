<template>
    <div>
        <div class="row">

            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-8">
                                <form @submit.prevent="saveData">
                                    <div class="form-group">
                                        <label for="prodi_id">Pilih Program Studi</label>
                                        <select class="form-control" name="prodi_id" v-model="form.prodi_id">
                                            <option v-for="list_prodi in prodi" :key="list_prodi.id" v-bind:value="list_prodi.id">{{ list_prodi.slug }} - {{ list_prodi.nama }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi_id">Pilih Tingkat</label>
                                        <select class="form-control" name="tingkat" v-model="form.tingkat">
                                            <option>X</option>
                                            <option>XI</option>
                                            <option>XII</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Nama Rombongan Belajar</label>
                                        <input type="text" class="form-control" v-model="form.nama" placeholder="Contoh: XI TKJ 2" required>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <p class="alert alert-warning">
                                    <ul>
                                        <li>Isi Data dengan Sebaik-baiknya</li>
                                    </ul>
                                </p>

                                <button v-on:click="reset" class="btn btn-block btn-danger btn-lg"><i class="fa fa-trash"></i> Batal</button>
                                <button v-on:click="save" class="btn btn-block btn-success btn-lg"><i class="fa fa-save"></i> Selesai</button>

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

    title: 'Tambah Rombongan Belajar',

    data: () => ({
        prodi: [],
        form: {
            prodi_id: '',
            tingkat: '',
            nama: '1231',
        }
    }),

    mounted() {
        this.getProdi()
    },

    computed: {

    },

    methods: {

        getProdi: function()
        {
            var vm = this

            axios.get(api_url + '/api/prodi', headers)
            .then(res => {
                vm.prodi = res.data
            })
        },

        save: function(){

            var vm = this

            swal({
                title: "Mengupdate pengaturan sistem?",
                text: "Apakah Anda yakin Sudah mengisi data dengan benar?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((save) => {
                if (save) {

                    axios.post(api_url + '/api/rombel', vm.form, headers)
                    .then(res => {
                        if(res.data.status == 'success')
                        {
                            toastr.success('Berhasil!', res.data.message)

                            vm.$router.push('/master_data/rombel')
                        }
                        else
                        {
                            toastr.warning('Terjadi kesalahan', res.data.message)
                        }
                    })
                    .catch( err => {
                        swal({
                            title: "Good job!",
                            text: err.response.data.message,
                            icon: "warning",
                        })
                    })

                } else {
                    toastr.info('Anda membatalkan penambahan Data')
                }
            });
        },

        reset: function(){
            var vm = this
            vm.form = {
                slug: '',
                nama: ''
            }

            toastr.success('Berhasil mereset formulir', 'Berhasil')
        }
    }
}
</script>

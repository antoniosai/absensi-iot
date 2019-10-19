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
                                        <label for="slug">Nama Singkatan / Slug</label>
                                        <input type="text" class="form-control" v-model="form.slug" placeholder="Contoh: TKJ, AP, TB" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap Program Studi</label>
                                        <input type="text" class="form-control" v-model="form.nama" placeholder="Nama Lengkap Program Studi" required>
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

    title: 'Tambah Program Studi',

    data: () => ({
        form: {
            nama: '',
            slug: ''
        }
    }),

    mounted() {
    },

    computed: {

    },

    methods: {
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

                    axios.post(api_url + '/api/prodi', vm.form, headers)
                    .then(res => {
                        if(res.data.status == 'success')
                        {
                            toastr.success('Berhasil!', res.data.message)

                            vm.$router.push('/master_data/program_studi')

                        }
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

<template>
    <div>
        <div class="row">

            <div class="col-md-8">
                <form>
                    <div class="form-group">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama"><span style="color: red">*)</span> Bentuk Pendidikan</label>
                                    <input type="text" class="form-control" placeholder="Contoh SMK, SMA / SMP" v-model="form.bentuk_pendidikan">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama"><span style="color: red">*)</span> Nama Sekolah</label>
                                    <input type="text" class="form-control" v-model="form.nama">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat"><span style="color: red">*)</span> Alamat</label>
                                    <textarea rows="3" class="form-control" v-model="form.alamat"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_kepemilikan"><span style="color: red">*)</span> Status Kepemilikan</label>
                                    <input type="text" class="form-control" v-model="form.status_kepemilikan">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status"><span style="color: red">*)</span> Status</label>
                                    <input type="text" class="form-control" v-model="form.status">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"><span style="color: red">*)</span> Alamat Email</label>
                                    <input type="email" class="form-control" v-model="form.email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telp"><span style="color: red">*)</span> Nomor Telephone</label>
                                    <input type="text" name="telp" class="form-control" v-model="form.telp">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="handphone">Nomor Handphone</label>
                                    <input type="text" name="handphone" class="form-control" v-model="form.handphone">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="handphone">Fax</label>
                                    <input type="text" name="fax" class="form-control" v-model="form.fax">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" v-model="form.latitude">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" v-model="form.longitude">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="npsn"><span style="color: red">*)</span> Nomor Pokok Sekolah Nasional (NPSN)</label>
                                    <input type="number" class="form-control" v-model="form.npsn">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sk_pendirian_sekolah">SK Pendirian Sekolah</label>
                                    <input type="text" class="form-control" v-model="form.sk_pendirian_sekolah">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_sk_pendirian">Tanggal SK Pendirian</label>
                                    <input type="date" class="form-control" v-model="form.tanggal_sk_pendirian">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sk_izin_operasional">SK Izin Operasional</label>
                                    <input type="text" class="form-control" v-model="form.sk_izin_operasional">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_sk_izin_operasional">Tanggal SK Izin Operasional</label>
                                    <input type="text" class="form-control" v-model="form.tanggal_sk_izin_operasional">
                                </div>
                            </div>

                        </div>

                    </div>
                </form>

            </div>

            <div class="col-md-4">
                <div class="alert alert-warning">
                    <ul>
                        <li>Isi data dengan benar</li>
                        <li>Form dengan tanda <span style="color: red">*)</span> wajib diisi</li>
                    </ul>
                </div>

                <button class="btn btn-primary btn-block" v-on:click="saveData()"><i class="fa fa-check"></i> Simpan</button>

            </div>
        </div>
    </div>
</template>

<script>

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {
    name: 'UpdateInfo',

    data: () => ({
        info: {},
        form: {}
    }),

    mounted() {
        this.fetchData()
        this.listenForChanges()
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
                vm.form = res.data
            })

        },

        handleFileUpload(){

        },

        saveData: function()
        {
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

                    axios.post( api_url + '/api/info/save', vm.form, headers)
                    .then(res => {
                        if(res.data.status == 'success')
                        {
                            toastr.success('Berhasil!', res.data.message)

                            vm.fetchData()
                        }
                    })
                    $('#myModal').modal('hide');
                    // vm.isOpened = false

                } else {
                    toastr.info('Anda membatalkan update Informasi sekolah')
                    // swal("Your imaginary file is safe!");
                }
            });

        },

        listenForChanges() {
            var vm = this;
            Echo.channel('absensi-new')
            .listen('AbsensiItem', (e) => {
                this.fetchData();
            })
        }
    }
}
</script>

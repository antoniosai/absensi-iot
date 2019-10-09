<template>
    <div>

        <div class="row">
            <div class="col-md-8">
                <form>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="nama"><span style="color: red">*)</span> Nama Lembaga</label>
                            <input type="text" name="nama" class="form-control" v-model="form.nama">
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" name="email" class="form-control" v-model="form.email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp">Nomor Telephone</label>
                                    <input type="text" name="telp" class="form-control" v-model="form.telp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="handphone">Nomor Handphone</label>
                                    <input type="text" name="handphone" class="form-control" v-model="form.handphone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mac">Upload Logo Baru</label>
                            <input type="file" name="logo" id="logo" class="form-control" ref="file" v-on:change="handleFileUpload()">
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" v-model="form.latitude">
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" v-model="form.longitude">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_awal_jam_keluar">Batas Awal Jam Keluar</label>
                                    <input type="time" class="form-control" v-model="form.batas_awal_jam_keluar">
                                </div>
                                <div class="form-group">
                                    <label for="batas_akhir_jam_keluar">Batas Akhir Jam Keluar</label>
                                    <input type="time" class="form-control" v-model="form.batas_akhir_jam_keluar">
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

import swal from 'sweetalert';


export default {
    name: 'AbsensiData',

    mounted() {
        this.fetchData()
        this.listenForChanges()
    },

    data: () => ({
        items: [],
        departments: [],
        roles: [],
        isOpened: true,
        form: {
            nama: '',
            logo: '',
            alamat: '',
            latitude: '',
            longitude: '',
            email: '',
            handphone: '',
            telp: ''
        }
    }),

    computed: {
        showDepartment: function()
        {
            var vm = this;

            if(vm.form.role_id == 1 && vm.form.role_id == '')
            {
                return false
            }
            else
            {
                return true
            }
        }
    },

    methods: {

        fetchData: function()
        {
            var vm = this

            axios.get('/info/data')
            .then(function (res) {
                // handle success
                var data = res.data
                vm.items = data
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

                    axios.post('/setting/save', vm.form)
                    .then(res => {
                        console.log(res)
                        if(res.data.status == 'success')
                        {
                            toastr.success('Berhasil!', res.data.message)

                            vm.fetchData()
                        }
                    })
                    $('#myModal').modal('hide');
                    // vm.isOpened = false

                } else {
                    toastr.info('Anda membatalkan penambahan Data')
                    // swal("Your imaginary file is safe!");
                }
            });

        },

        listenForChanges() {
            var vm = this;
            console.log('listening for change')
            Echo.channel('absensi-new')
            .listen('AbsensiItem', (e) => {
                this.fetchData();
            })
        }
    }

}
</script>

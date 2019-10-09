<template>
    <div>

        <div class="row">
            <div class="col-md-8">
                <form>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="mac">MAC Address</label>
                            <input type="text" name="mac_address" class="form-control" v-model="form.mac_address">
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_awal_jam_masuk">Batas Awal Jam Masuk</label>
                                    <input type="time" class="form-control" v-model="form.batas_awal_jam_masuk">
                                </div>
                                <div class="form-group">
                                    <label for="batas_akhir_jam_masuk">Batas Akhir Jam Masuk</label>
                                    <input type="time" class="form-control" v-model="form.batas_akhir_jam_masuk">
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
            mac: '',
            batas_awal_jam_masuk: '',
            batas_akhir_jam_masuk: '',
            batas_awal_jam_keluar: '',
            batas_akhir_jam_keluar: '',
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

            axios.get('/setting/data')
            .then(function (res) {
                // handle success
                var data = res.data
                vm.items = data
                vm.form = {
                    mac_address: data.mac_address,
                    batas_awal_jam_masuk: data.batas_awal_jam_masuk,
                    batas_akhir_jam_masuk: data.batas_akhir_jam_masuk,
                    batas_awal_jam_keluar: data.batas_awal_jam_keluar,
                    batas_akhir_jam_keluar: data.batas_akhir_jam_keluar,
                }
            })

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

<template>
    <div>

        <div class="tab-base">

            <!--Nav Tabs-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="true">Home <span
                            class="badge badge-purple">27</span></a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#tahun_ajaran" aria-expanded="false">Tahun Ajaran</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#demo-lft-tab-3" aria-expanded="false">Setting</a>
                </li>
            </ul>

            <!--Tabs Content-->
            <div class="tab-content">
                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                    <p class="text-main text-semibold">First Tab Content</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                </div>
                <div id="tahun_ajaran" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <div id="demo-lft-tab-3" class="tab-pane fade">
                    <p class="text-main text-semibold">Third Tab Content</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">

                            <div class="form-group">
                                <label for="mac">MAC Address</label>
                                <div class="row" id="form_mac">
                                    <div class="col-md-8">
                                        <input type="text" name="mac_address" class="form-control" v-model="form.mac_address">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="clearfix">
                                            <div class="pull-right">
                                                <button class="btn btn-info" v-on:click="addMacForm()">
                                                    <i class="fa fa-plus"></i> Tambah MAC Baru
                                                </button>
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        </div>

    </div>
</template>

<script>

import swal from 'sweetalert';
import api_url from '../../api_url';
import headers from '../../config/axios_header';


export default {
    name: 'AbsensiData',

    title: 'Pengaturan',

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
        },


    },

    methods: {

        fetchData: function()
        {
            var vm = this

            axios.get(api_url + '/api/setting/data', headers)
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

                    axios.post(api_url + '/api/setting/save', vm.form, headers)
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
                    toastr.info('Anda membatalkan penambahan Data')
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
        },

        addMacForm: function(data, event)
        {
            var html = '';
            $('#form_mac').append('<attempt-data></attempt-data>');
        }
    }

}
</script>

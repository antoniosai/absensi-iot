<template>

    <div>

        <table class="table table-condenssed table-striped table-hover convert-data-table" id="data_progresif">
            <thead>
                <tr>
                    <th>MAC ORIGINs</th>
                    <th>RF ID</th>
                    <th>ATTEMPT TIME</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{ item.mac_origin }}</td>
                    <td>{{ item.rf_id }}</td>
                    <td v-html="item.created_at"></td>
                    <td v-if="item.status == 'registered'" v-html="item.message"></td>
                    <td v-else>
                        <button class="btn btn-primary" v-on:click="openModal(item.rf_id)">Daftarkan</button>
                    </td>
                </tr>
            </tbody>

        </table>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pengguna Kartu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" v-model="form.name" class="form-control" placeholder="Isi dengan Nama Lengkap Pengguna Kartu" required>
                            </div>

                            <div class="form-group">
                                <label for="">RF ID</label>
                                <input type="text" v-model="form.rf_id" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control" v-model="form.email" placeholder="Alamat email pengguna">
                            </div>

                            <div class="form-group">
                                <label for="">Pilih Role</label>
                                <select name="role_id" v-model="form.role_id" class="form-control">
                                    <option v-for="role in roles" :value="role.id" :key="role.id">{{ role.nama }}</option>
                                </select>
                            </div>

                            <div class="form-group" v-if="showDepartment">
                                <label for="">Pilih Kelas <small>(Kosongkan Jika Pengguna adalah Bukan Siswa)</small></label>
                                <select name="department_id" v-model="form.department_id" class="form-control">
                                    <option v-for="department in departments" :value="department.id" :key="department.id">{{ department.name }}</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" v-model="form.password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" v-model="form.password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="clearfix">
                            <div class="pull-right">
                                <button v-on:click="saveData()" class="btn btn-primary">Simpan</button>
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


export default {
    name: 'AbsensiData',

    mounted() {
        this.fetchData()
        this.fetchInitData()
        this.listenForChanges()
    },

    data: () => ({
        items: [],
        departments: [],
        roles: [],
        isOpened: true,
        form: {
            name: '',
            rf_id: '',
            role_id: '',
            department_id: '',
            email: '',
            password: '',
            password_confirmation: ''
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

            axios.get('/api_v1/attempt')
            .then(function (res) {
                // handle success
                vm.items = res.data
            })

        },

        fetchInitData: function()
        {
            var vm = this
            // Fetch Department Data
            axios.get('/api_v1/department')
            .then(res => {
                vm.departments = res.data
            })

            // Fetch Roles Data
            axios.get('/api_v1/role')
            .then(res => {
                vm.roles = res.data
            })
        },

        openModal: function(rf_id)
        {
            var vm = this

            vm.form.rf_id = rf_id

            $('#myModal').modal('show');
            // vm.isOpened = true

        },

        saveData: function()
        {
            var vm = this

            swal({
                title: "Menambah Pengguna Kartu?",
                text: "Apakah Anda yakin Akan menambahkan pengguna kartu ke dalam database?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((save) => {
                if (save) {

                    axios.post('/api_v1/user', vm.form)
                    .then(res => {
                        console.log(res)
                        if(res.data.status == 'success')
                        {
                            console.log('Saved successfully')

                            // Show success message
                            toastr.success('Berhasil!', res.data.message)

                            vm.fetchData()

                            // Empty back the form
                            vm.form = {
                                name: '',
                                rf_id: '',
                                role_id: '',
                                department_id: '',
                                email: '',
                                password: '',
                                password_confirmation: ''
                            }

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

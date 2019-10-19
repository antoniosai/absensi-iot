<template>
    <div>
        <div class="row">

            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">

                        <div class="pull-right">
                            <button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Role</button>
                        </div>

                        <div style="margin-top: 60px"></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Nama Role</th>
                                    <th>Jumlah Pengguna</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="role in roles" :key="role.id">
                                    <td>{{ role.id }}</td>
                                    <td>{{ role.nama }}</td>
                                    <td>{{ role.jumlah_user }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            </div>

        </div>
    </div>
</template>

<script>

import swal from 'sweetalert';

import api_url from '../../../api_url'

export default {
    name: 'AbsensiData',

    mounted() {
        this.fetchData()
    },

    data: () => ({
        roles: [],
    }),

    computed: {
    },

    methods: {

        fetchData: function()
        {
            var vm = this

            axios.get(api_url + '/api/role')
            .then(function (res) {
                // handle success
                vm.roles = res.data
            })

        },

    }

}
</script>

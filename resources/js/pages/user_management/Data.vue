<template>
    <div>
        <div class="row">

            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">

                        <div class="pull-right">
                            <router-link :to="{name: 'role'}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Pengguna</router-link>
                        </div>

                        <div style="margin-top: 60px"></div>
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat Email</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Terakhir Diupdate</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.created_at }}</td>
                                    <td>{{ user.updated_at }}</td>
                                    <td>{{ user.id }}</td>
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

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {
    name: 'AbsensiData',

    title: 'Manajemen User',

    mounted() {
        this.fetchData()
    },

    data: () => ({
        users: [],
    }),

    computed: {
    },

    methods: {

        fetchData: function()
        {
            var vm = this

            axios.get(api_url + '/api/user', headers)
            .then(function (res) {
                // handle success
                vm.users = res.data
            })

        },

    }

}
</script>

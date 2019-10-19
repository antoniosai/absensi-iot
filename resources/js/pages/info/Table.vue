<template>
    <div>
        <table class="table table-hover table-striped">
            <tr>
                <th>Nama Sekolah</th>
                <td>:</td>
                <td>{{ info.nama }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>:</td>
                <td>{{ info.status }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ info.alamat }}</td>
            </tr>
            <tr>
                <th>No. Handphone</th>
                <td>:</td>
                <td>{{ info.handphone }}</td>
            </tr>
            <tr>
                <th>No. Telp</th>
                <td>:</td>
                <td>{{ info.telp }}</td>
            </tr>
            <tr>
                <th>Fax</th>
                <td>:</td>
                <td>{{ info.fax }}</td>
            </tr>
            <tr>
                <th>NPSN</th>
                <td>:</td>
                <td>{{ info.npsn }}</td>
            </tr>

            <tr>
                <th>Bentuk Pendidikan</th>
                <td>:</td>
                <td>{{ info.bentuk_pendidikan }}</td>
            </tr>
            <tr>
                <th>Status Kepemilikan</th>
                <td>:</td>
                <td>{{ info.status_kepemilikan }}</td>
            </tr>
            <tr>
                <th>SK Pendirian Sekolah</th>
                <td>:</td>
                <td>{{ info.sk_pendirian_sekolah }}</td>
            </tr>
            <tr>
                <th>Tanggal SK Pendirian</th>
                <td>:</td>
                <td>{{ info.tanggal_sk_pendirian }}</td>
            </tr>
            <tr>
                <th>SK Izin Operasional</th>
                <td>:</td>
                <td>{{ info.sk_izin_operasional }}</td>
            </tr>
            <tr>
                <th>Tanggal SK Izin Operasional</th>
                <td>:</td>
                <td>{{ info.tanggal_sk_izin_operasional }}</td>
            </tr>

        </table>
    </div>
</template>

<script>

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {
    name: 'TableInfo',

    mounted() {
        this.fetchData()
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
                vm.info = res.data
            })

        },

    }


}
</script>

<style scoped>
    th {
        height: 40px;
        width: 210px;
        padding-left: 10px;
    }
    td {
        padding-left: 20px
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

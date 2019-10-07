<template>
    <table class="table table-condenssed table-striped table-hover convert-data-table" id="data_progresif">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items">
                <td>{{ item.name }}</td>
                <td>{{ item.department }}</td>
                <td>{{ item.jam_masuk }}</td>
                <td>{{ item.jam_keluar }}</td>
                <td>{{ item.keterangan }}</td>
            </tr>
        </tbody>

    </table>
</template>

<script>
export default {
    name: 'AbsensiData',

    mounted() {
        this.fetchData()
    },

    data: () => ({
        items: []
    }),

    methods: {

        fetchData: function()
        {
            var vm = this

            axios.get('/api_v1/absensi')
            .then(function (res) {
                // handle success
                vm.items = res.data
            })

        },

        listenForChanges() {
            var vm = this

            Echo.channel('absensi-new')
            .listen('App\Events\AbsensiItem', (e) => {
                vm.fetchData()
            })
        }
    }

}
</script>

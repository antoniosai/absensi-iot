<template>
    <table class="table table-condenssed table-striped table-hover convert-data-table" id="data_progresif">
        <thead>
            <tr>
                <th>MAC Origin</th>
                <th>RF ID</th>
                <th>ATTEMPT TIME</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items">
                <td>{{ item.mac_origin }}</td>
                <td>{{ item.rf_id }}</td>
                <td>{{ item.created_at }}</td>
            </tr>
        </tbody>

    </table>
</template>

<script>
export default {
    name: 'AbsensiData',

    mounted() {
        this.fetchData()
        this.listenForChanges()
    },

    data: () => ({
        items: []
    }),

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

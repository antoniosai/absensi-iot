<template>
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
            <tr v-for="item in items">
                <td>{{ item.mac_origin }}</td>
                <td>{{ item.rf_id }}</td>
                <td v-html="item.created_at"></td>
                <td v-html="item.message"></td>
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

    computed: {

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

        checkIfRegistered(rf_id)
        {
            var vm = this
            var message = "321";
            // return message + rf_id;

            axios.get('/api_v1/attempt/check/'+rf_id)
            .then(function (res) {
                console.log(res.data.message);
                var message = res.data.message
                return message;
            })

            message = 'test';

            return message;

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

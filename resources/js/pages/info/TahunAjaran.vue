<template>
    <div>
        <h2>Tahun Ajaran</h2>

        <form @submit.prevent="save()">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select v-model="form_data.tahun_ajaran" class="form-control">
                            <option v-for="tahun_ajaran in data.tahun_ajaran" :key="tahun_ajaran" v-bind:value="tahun_ajaran">{{ tahun_ajaran }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select v-model="form_data.semester" class="form-control">
                            <option v-for="semester in data.semester" :key="semester" v-bind:value="semester">{{ semester }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ganti Tahun Ajaran</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</template>

<script>

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {

    name: 'TahunAjaran',

    data: () => ({
        data: {
            tahun_ajaran: [],
            semester: []
        },
        form_data: {
            tahun_ajaran: '',
            semester: '2'
        }
    }),

    mounted() {
        this.fetchData()
    },

    computed: {

    },

    watch: {

    },

    methods: {

        fetchData: function() {

            var vm = this

            axios.get( api_url + '/api/tahun_ajaran', headers)
            .then( res => {
                console.log(res.data)
                vm.data.tahun_ajaran = res.data.tahun_ajaran
                vm.data.semester = res.data.semester

                // console.log(res)
                // vm.form_data.tahun_ajaran = res.data.tahun_ajaran
                // vm.form_data.semester = res.data.semester
            })

            axios.get( api_url + '/api/info/data', headers)
            .then( res => {
                vm.form_data.tahun_ajaran = res.data.tahun_ajaran
                vm.form_data.semester = res.data.semester
            })

        },

        save: function() {
            axios.post( api_url + '/api/tahun_ajaran/update', this.form_data, headers )
            .then( res => {

                if(res.data.status == 'success')
                {
                    toastr.success(res.data.message + '<br><br> Akan merefresh browser dalam 3 detik', 'Berhasil')
                    setInterval(function(){window.location.reload()}, 3000)
                }

            })
        }

    }


}
</script>

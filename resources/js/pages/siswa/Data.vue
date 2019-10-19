<template>
    <div>
        <vue-good-table
            styleClass="vgt-table condensed"
            :columns="columns"
            :line-numbers="true"
            :rows="rows"
            :search-options="{
                enabled: true,
                placeholder: 'Cari Data Siswa Berdasarkan NIK, Nama, Kelas, TTL'
            }"
            :sort-options="{
                enabled: true,
                initialSortBy: {field: 'nama', type: 'asc'}
            }">

            <div slot="table-actions">

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Export
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">PDF</a></li>
                        <li><a href="#">CSV</a></li>
                        <li><a href="#">Excel</a></li>
                    </ul>
                    <button class="btn btn-primary" style="margin-right: 13px"><i class="fa fa-plus"></i> Tambah Siswa Baru</button>
                </div>
            </div>

            <div slot="table-row" slot-scope="props">

                <span v-if="props.column.field == 'nama'">
                    <span>{{ props.row.nama }}</span>
                </span>

                <span v-if="props.column.field == 'nik'">
                    <span>{{ props.row.nik }}</span>
                </span>

                <span v-if="props.column.field == 'ttl'">
                    <span>{{ props.row.ttl }}</span>
                </span>

                <span v-if="props.column.field == 'kelas'">
                    <span class="badge badge-warning" v-if="props.row.span_class == 'warning'">{{props.row.kelas}}</span>
                    <span class="badge badge-primary" v-else>{{props.row.kelas}}</span>
                </span>

                <span v-if="props.column.field == 'rf_id'">
                    <button class="btn btn-sm btn-warning" v-if="!props.row.rf_id">{{ 'Belum Terdaftar' }}</button>
                    <span class="badge badge-default" v-else>{{ props.row.rf_id }}</span>
                </span>
                <span v-if="props.column.field == 'action'">
                    <div class="btn-group">
                        <router-link :to="{name: 'siswa.detail', params:{id: props.row.id}}" class="btn btn-sm btn-info"><i class="fa fa-info"></i> {{ props.row.id }}</router-link>
                    </div>
                </span>
            </div>
        </vue-good-table>

    </div>
</template>

<script>

import swal from 'sweetalert';
import axios from 'axios';

import 'vue-good-table/dist/vue-good-table.css'
import { VueGoodTable } from 'vue-good-table';

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {

    title: 'Manajemen Data Siswa',

    data() {
        return {
            columns: [
                {
                    label: 'NIK',
                    field: 'nik',
                },
                {
                    label: 'Nama Lengkap',
                    field: 'nama',
                },
                {
                    label: 'Kelas',
                    field: 'kelas',
                },
                {
                    label: 'RF ID',
                    field: 'rf_id',
                },
                {
                    label: 'Tempat Tanggal Lahir',
                    field: 'ttl',
                },
                {
                    label: 'After',
                    field: 'action'
                },
            ],
            rows: [],
        };
    },

    mounted() {
        this.fetchData()
        // this.initData()
    },

    components: {
        VueGoodTable
    },

    computed: {

    },

    watch: {
        filter_data:  {
            handler(val){
                var vm = this
                // vm.filterData()
            },
            deep: true

        }
    },

    methods: {
        fetchData: function(){

            var vm = this

            axios.get(api_url + '/api/siswa', headers)
            .then(res => {
                console.log(res.data.data)
                vm.rows = res.data.data
            })
        },


        // Get Data Tingkat & Prodi
        initData: function() {
            var vm = this

            // Prodi
            axios.get( api_url + '/api/prodi', headers)
            .then( res => {
                // vm.filter.prodi = res.data
            })

            axios.get( api_url + '/api/data_dasar/tingkat', headers)
            .then( res => {
                // vm.filter.tingkat = res.data
            })
        },

        filterData: function() {
            var vm = this
            axios.post( api_url + '/api/rombel/filter', vm.filter_data, headers)
            .then( res => {
                // vm.items = res.data
                // console.log(res.data)
            })
        }
    }
}
</script>

<template>
    <div>

        <div class="panel">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-7 col-xl-7">
                        <h4>Menampilkan {{ items.length }} Data dari filter</h4>
                    </div>
                    <div class="col-md-5 col-xl-5">
                        <div class="clearfix">
                            <div class="pull-right">
                                <div class="btn-gsroup">
                                    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#searchForm"><i class="fa fa-search"></i> Filter Data</button>
                                    <router-link class="btn btn-primary" :to="{name: 'rombel.add'}"><i class="fa fa-plus"></i> Tambah Rombel Baru</router-link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div id="searchForm" class="collapse">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <fieldset class="col-md-12">

                                        <legend>Pencarian / Filter Data</legend>

                                        <form @submit.prevent="filterData">

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="search_query">Kata Kunci</label>
                                                        <input type="text" class="form-control" v-model="filter_data.search_query" placeholder="Kata Kunci Pencarian">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="prodi_id">Program Studis</label>
                                                        <select class="form-control" v-model="filter_data.prodi_id">
                                                            <option v-for="filter_prodi in filter.prodi" :key="filter_prodi.id" v-bind:value="filter_prodi.id">{{ filter_prodi.nama }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Tingkat</label>
                                                        <select class="form-control" v-model="filter_data.tingkat">
                                                            <option v-for="filter_tingkat in filter.tingkat" :key="filter_tingkat.id" v-bind:value="filter_tingkat.nama">{{ filter_tingkat.nama }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>



                                        </form>
                                        <div class="clearfix">
                                            <div class="pull-right">
                                                <button v-on:click="fetchData()" class="btn btn-warning btn-lg"><i class="fa fa-undo"></i> Reset</button>
                                                <button v-on:click="filterData()" class="btn btn-success btn-lg"><i class="fa fa-search"></i> Filter Data</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12" v-if="search">
                                            sd
                                        </div>

                                    </fieldset>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

                <br>
                <div class="row">

                    <div class="col-lg-4 col-md-6" v-for="rombel in items" :key="rombel.id">

                        <div class="panel panel-info panel-colorful">
                            <div class="pad-all media">
                                <div class="media-left">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="media-body" style="padding-left: 20px">
                                    <p class="text-2x mar-no media-heading">{{ rombel.nama }}</p>
                                    <span>Prodi {{ rombel.prodi.nama }}</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-dark-base mar-no">
                                <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-light" style="width: 100%"></div>
                            </div>
                            <div class="pad-all text-sm bg-trans-dark">
                                <span class="text-semibold">{{ rombel.siswa_count }}</span> Siswa
                                <div class="pull-right">
                                    <router-link :to="{name: 'rombel.detail', params:{id: rombel.id}}" class="" style="color: white">Lihat selengkap nya</router-link>
                                </div>
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
import axios from 'axios';

import api_url from '../../api_url'
import headers from '../../config/axios_header'

export default {

    title: 'Program Studi / Jurusan',

    data: () => ({
        items: [],
        search: false,
        search_query: '',
        filter_data: {
            search_query: '',
            tingkat: '',
            prodi_id: ''
        },
        filter: {
            prodi: [],
            tingkat: []
        },
    }),

    mounted() {
        this.fetchData()
        this.initData()
    },



    computed: {

    },

    watch: {
        filter_data:  {
            handler(val){
                var vm = this
                vm.filterData()
            },
            deep: true

        }
    },

    methods: {
        fetchData: function(){

            var vm = this

            axios.get(api_url + '/api/rombel', headers)
            .then(res => {
                vm.items = res.data
            })
        },


        // Get Data Tingkat & Prodi
        initData: function() {
            var vm = this

            // Prodi
            axios.get( api_url + '/api/prodi', headers)
            .then( res => {
                vm.filter.prodi = res.data
            })

            axios.get( api_url + '/api/data_dasar/tingkat', headers)
            .then( res => {
                vm.filter.tingkat = res.data
            })
        },

        filterData: function() {
            var vm = this
            axios.post( api_url + '/api/rombel/filter', vm.filter_data, headers)
            .then( res => {
                vm.items = res.data
                // console.log(res.data)
            })
        }
    }
}
</script>

<style>
    fieldset
	{
		border: 1px solid #ddd !important;
		margin: 0;
		xmin-width: 0;
		padding: 10px;
		position: relative;
		border-radius:4px;
		background-color:#f5f5f5;
		padding-left:10px!important;
	}

		legend
		{
			font-size:14px;
			font-weight:bold;
			margin-bottom: 0px;
			width: 35%;
			border: 1px solid #ddd;
			border-radius: 4px;
			padding: 5px 5px 5px 10px;
			background-color: #ffffff;
		}
</style>

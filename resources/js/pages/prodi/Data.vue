<template>
    <div>

        <div class="panel">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="search_query" placeholder="Pencarian Cepat">
                    </div>
                    <div class="col-md-3">
                        <div class="clearfix">
                            <div class="pull-right">
                                <router-link class="btn btn-primary btn-block" :to="{name: 'prodi.add'}"><i class="fa fa-plus"></i> Tambah Prodi Baru</router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">

                    <div class="col-md-4" v-for="prodi in items" :key="prodi.id">

                        <div class="panel panel-info panel-colorful">
                            <div class="pad-all media">
                                <div class="media-left">
                                    <i class="fa fa-building-o fa-4x"></i>
                                </div>
                                <div class="media-body" style="padding-left: 20px">
                                    <p class="text-2x mar-no media-heading">{{ prodi.slug }}</p>
                                    <span>{{ prodi.nama }}</span>
                                </div>
                            </div>
                            <div class="progress progress-xs progress-dark-base mar-no">
                                <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-light" style="width: 100%"></div>
                            </div>
                            <div class="pad-all text-sm bg-trans-dark">
                                <span class="text-semibold">{{ prodi.rombel_count }}</span> Rombel
                                <div class="pull-right">
                                    <router-link :to="{name: 'prodi.detail', params:{id: prodi.id}}" class="" style="color: white">Lihat selengkap nya</router-link>
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
        search_query: ''
    }),

    mounted() {
        this.fetchData()
    },



    computed: {

    },

    watch: {
        search_query: function () {
            var vm = this

            if(vm.search_query != '')
            {
                axios.get(api_url + '/api/prodi/search/' + vm.search_query, headers)
                .then(res => {
                    vm.items = res.data
                })
            }
            else
            {
                vm.fetchData()
            }
        }
    },

    methods: {
        fetchData: function(){

            var vm = this

            axios.get(api_url + '/api/prodi', headers)
            .then(res => {
                vm.items = res.data
            })
        }
    }
}
</script>

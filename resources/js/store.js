import Vue from 'vue'
import Vuex from 'vuex'

import axios from 'axios'
import api_url from './api_url'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    status: '',
    token: localStorage.getItem('token') || '',
    user: localStorage.getItem('user') || {}
  },
  mutations: {

    auth_request(state) {
      state.status = 'loading'
    },
    auth_success(state, {token, user}) {
      state.status = 'success'
      state.token = token
      state.user = user
    },
    auth_error(state) {
      state.status = 'error'
    },
    logout(state) {
      state.status = ''
      state.token = ''
      localStorage.removeItem('user')
      state.user = {}
    },


  },
  actions: {


    login({ commit }, user) {
      return new Promise((resolve, reject) => {
        commit('auth_request')
        axios({
          url: api_url + '/api/login',
          data: user,
          method: 'POST'
        })
        .then(resp => {
          let token = resp.data.token
          let user = resp.data.user

          localStorage.setItem('token', token)
          localStorage.setItem('user', JSON.stringify(user));

          axios.defaults.headers.common['Authorization'] = token

          commit('auth_success', {token, user})

          resolve(resp)
        })
        .catch(err => {
          commit('auth_error')
          localStorage.removeItem('token')
          reject(err)
        })
      })
    },


    logout({commit}){
      return new Promise((resolve, reject) => {
        commit('logout')
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        delete axios.defaults.headers.common['Authorization']
        resolve()
      })
    }


  },

  getters : {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status,
    user: state => state.user
  }

})

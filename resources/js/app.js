
require('./bootstrap');

window.Vue = require('vue');

import store from './store'
import router from './router'
import titleMixin from './titleMixin'

Vue.mixin(titleMixin)

Vue.component('admin-layout', require('./layouts/default.vue').default);

const app = new Vue({
    el: '#app',
    store,
    router
});


require('./bootstrap');
window.Vue = require('vue');

window.axios = require('axios');
Vue.prototype.$http = window.axios;


//boostrap-vu
import  BootstrapVue from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
import  IconsPlugin from 'bootstrap-vue'
Vue.use(IconsPlugin)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

	Vue.component('home', require('./views/Home.vue').default);

const app = new Vue({

    el: '#app',

});

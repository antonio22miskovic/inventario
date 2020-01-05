//importaciones
import Vue from 'vue'


//componentes
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//booststrap
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

//instancia de Vue
const app = new Vue({
    el: '#ins',
});

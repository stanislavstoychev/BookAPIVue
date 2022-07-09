require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
//inputs file for routes
import { routes } from './routes';
// register jw pagination component globally
import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);
// Notification 
import Notification from './Helpers/Notification';
window.Notification = Notification
//Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;

window.Reload = new Vue();

const router = new VueRouter({
    routes,
    mode: 'history'
  })


const app = new Vue({
    el: '#app',
    router,
});

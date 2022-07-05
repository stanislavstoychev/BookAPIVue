require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import App from './components/App.vue';

const app = new Vue({
    el: '#app',
    components: {App}
});

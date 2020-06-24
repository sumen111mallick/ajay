

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

let Myheader =  require('./components/Myheader.vue').default;
let Myfooter =  require('./components/Myfooter.vue').default;

let Home =  require('./components/Home.vue').default;
let Profile =  require('./components/Profile.vue').default;

const routes = [
    { path: '/home', component: Home },
    { path: '/profile', component: Profile }
  ]

  const router = new VueRouter({
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Myfooter}
});

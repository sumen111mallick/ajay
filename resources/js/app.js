

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let Myheader =  require('./components/Myheader.vue').default;
let Myfooter =  require('./components/Myfooter.vue').default;

let Home =  require('./components/Home.vue').default;
let Vendor =  require('./components/vendor/Vendor.vue').default;
let BillingAddress =  require('./components/billing/Billing.vue').default;
let ShippingAddress = require('./components/shipping/Shipping.vue').default;
let Vehicle = require('./components/vehicle/Vehicle.vue').default;
let Item = require('./components/item/Item.vue').default;
let Personal =  require('./components/Personal.vue').default;

const routes = [
    { path: '/home', component: Home },
    { path: '/personal', component: Personal },
    { path: '/vendor', component: Vendor},
    { path: '/billingaddress', component: BillingAddress},
    { path: '/shippingaddress', component: ShippingAddress},
    { path: '/item', component: Item},
    { path: '/vehicle', component: Vehicle}
  ]

  const router = new VueRouter({
   
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Myfooter}
});

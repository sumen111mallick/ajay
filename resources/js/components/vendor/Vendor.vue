<template>
<div>
    <nav class="panel">
    <p class="panel-heading">
      Vendors
      <button class="button is-link is-outlined" @click="openAddVendor">
        Add New Vendor
      </button>
    </p>
    <div class="panel-block">
      <p class="control has-icons-left">
        <input class="input" type="text" placeholder="Search">
        <span class="icon is-left">
          <i class="fas fa-search" aria-hidden="true"></i>
        </span>
      </p>
    </div>
    
    
    <table class="table is-fullwidth">
    <thead>
      <tr>
        <th><abbr title="Serial No.">S.No</abbr></th>
        <th>Vendor</th>
        <th><abbr title="Unique">Vendor Code</abbr></th>
        <th>Active</th>
        <th></th>
        
      </tr>
    </thead>
  
    <tbody>
      <tr v-for="(item,key) in vendorList" :key="item.id">
        <td>{{key+1}}</td>
        <td>{{item.vendor_name}}</td>
        <td>{{item.vendor_code}}</td>
        <td v-if="item.status==1">Yes</td>
        <td v-else>No</td>
        <td><span class="tag is-info" @click="openupdateVendor(key)">Edit</span></td>
      </tr>
    
    </tbody>
  </table>
    
  </nav>
  <Addvendor :openmodal='addActive' @closeModal='closeModal'></Addvendor>
  <Updatevendor :openmodal='updateActive' @closeModal='closeModal' ></Updatevendor>
</div>
</template>

<script>
let Addvendor = require('./Addvendor.vue').default;
let Updatevendor = require('./Updatevendor.vue').default;
export default {
  components:{Addvendor,Updatevendor},
  data(){
    return{
        addActive: '',
        vendorList:{},
        errors:{},
        updateActive:''
    }
  },
  mounted(){
         axios.post('/vendorlist')
                .then((response)=>this.vendorList = response.data)
                .catch((error)=>console.log(this.errors = error.response.data.errors));
  },
  methods:{
    openAddVendor(){
      this.addActive = 'is-active';
    },
    closeModal(){
      this.addActive ='';
      this.updateActive ='';
    },
    openupdateVendor(key){
      this.$children[1].list = this.vendorList[key];
      this.updateActive = 'is-active';
    }
  }
}
</script>
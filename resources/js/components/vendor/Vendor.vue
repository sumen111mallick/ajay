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
        <th>Action</th>
        
      </tr>
    </thead>
  
    <tbody>
      <tr>
        <th>10</th>
        <td><a href="https://en.wikipedia.org/wiki/Chelsea_F.C." title="Chelsea F.C.">Chelsea</a></td>
        <td>38</td>
        <td>12</td>
        
      </tr>
    
    </tbody>
  </table>
    
  </nav>
  <Addvendor :openmodal='addActive' @closeModal='closeModal'></Addvendor>
</div>
</template>

<script>
let Addvendor = require('./Addvendor.vue').default;
export default {
  components:{Addvendor},
  data(){
    return{
    addActive: ''
    }
  },
  methods:{
    openAddVendor(){
      this.addActive = 'is-active';
    },
    closeModal(){
      this.addActive ='';
    }
  }
}
</script>
<template>
    <div>
    <nav class="panel">
    <p class="panel-heading">
      Billing Address
      <button class="button is-link is-outlined is-pulled-right" @click="openAddModal">
        Add New Shipping Address
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
        <th>Vendor Code</th>
        <th>address</th>
        <th>Project Name</th>
        <th>Project Location</th>
        <th>State</th>
        <th>State Code</th>
        <th>GSTIN</th>
        
        <th>Active</th>
        <th></th>
        
      </tr>
    </thead>
  
    <tbody>
      <tr v-for="(item,key) in shippingList" :key="item.id">
        <td>{{key+1}}</td>
        <td>{{item.vendor.vendor_name}}</td>
        <td>{{item.vendor_code}}</td>
        <td>{{item.address}}</td>
        <td>{{item.project_name}}</td>
        <td>{{item.project_location}}</td>
        <td>{{item.state}}</td>
        <td>{{item.state_code}}</td>
        <td>{{item.gstin}}</td>
        
        <td v-if="item.status==1">Yes</td>
        <td v-else>No</td>
        <td><span class="tag is-info" >Edit</span></td>
      </tr>
    
    </tbody>
  </table>
    
  </nav>
 <Addshipping :openModal='addActive' @closeModal='closeModal'></Addshipping>
</div>

</template>
<script>
let Addshipping = require('./Addshipping.vue').default;
export default {
    components:{ Addshipping },
    data(){
        return{
            shippingList:{},
            errors:{},
            addActive:'',
        }
    },
    mounted(){
        axios.post('shippinglist')
        .then((response)=>this.shippingList = response.data)
        .catch((error)=>this.errors = error.response.data.errors);
    },
    methods:{
        openAddModal(){
            this.addActive = 'is-active';
        },
        closeModal(){
            this.addActive = '';
        }
    }
}
</script>
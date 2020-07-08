<template>
    <div>
    <nav class="panel">
    <p class="panel-heading">
      Vehicle Details
      <button class="button is-link is-outlined is-pulled-right" @click="openAddModal">
        Add New Vehicle
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
        <th>Vehicle Type</th>
        <th>Vehicle No</th>
        <th>Active</th>
        <th></th>
        
      </tr>
    </thead>
  
    <tbody>
      <tr v-for="(item,key) in vehicleList" :key="item.id">
        <td>{{key+1}}</td>
        <td>{{item.type}}</td>
        <td>{{item.vehicle_no}}</td>
        
        <td v-if="item.status==1">Yes</td>
        <td v-else>No</td>
        <td><span class="tag is-info" @click="openUpdate(key)" >Edit</span></td>
      </tr>
    
    </tbody>
  </table>
    
  </nav>
 <Addvehicle :openModal='addActive' @closeModal='closeModal'></Addvehicle>
 <Updatevehicle :openModal='updateActive' @closeModal='closeModal'></Updatevehicle>
</div>

</template>
<script>
let Addvehicle = require('./Addvehicle.vue').default;
let Updatevehicle = require('./Updatevehicle.vue').default;
export default {
    components:{ Addvehicle,Updatevehicle },
    data(){
        return{
            vehicleList:{},
            errors:{},
            addActive:'',
            updateActive:''
        }
    },
    mounted(){
        axios.post('vehiclelist')
        .then((response)=>this.vehicleList = response.data)
        .catch((error)=>this.errors = error.response.data.errors);
    },
    methods:{
        openAddModal(){
            this.addActive = 'is-active'
        },
        closeModal(){
            this.addActive = '',
            this.updateActive = '',
            axios.post('vehiclelist')
          .then((response)=>this.vehicleList = response.data)
          .catch((error)=>this.errors = error.response.data.errors);
        },
        openUpdate(key){
          this.$children[1].list = this.vehicleList[key],
          this.updateActive = 'is-active';
        }
    }
}
</script>
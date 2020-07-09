<template>
    <div>
    <nav class="panel">
    <p class="panel-heading">
      Items
      <button class="button is-link is-outlined is-pulled-right" @click="openAddModal">
        Add New Item
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
        <th>Item</th>
        <th>Rate</th>
        <th>Active</th>
        <th></th>
        
      </tr>
    </thead>
  
    <tbody>
      <tr v-for="(item,key) in list" :key="item.id">
        <td>{{key+1}}</td>
        <td>{{item.item_name}}</td>
        <td>{{item.rate}}</td>
             
        <td v-if="item.status==1">Yes</td>
        <td v-else>No</td>
        <td><span class="tag is-info" @click="openUpdate(key)">Edit</span></td>
      </tr>
    
    </tbody>
  </table>
    
  </nav>
 <Additem :openModal='addActive' @closeModal='closeModal'></Additem>
 <Updateitem :openModal='updateActive' @closeModal='closeModal'></Updateitem>
</div>
</template>
<script>
let Additem = require('./Additem.vue').default;
let Updateitem = require('./Updateitem.vue').default;
export default {
    components:{Additem,Updateitem},
    data(){
        return{
            list:{},
            addActive:'',
            updateActive:''
        }
    },
    mounted(){
        axios.post('itemlist')
        .then((response)=>console.log(this.list = response.data))
    },
    methods:{
        openUpdate(key){
            this.$children[1].list = this.list[key];
            this.updateActive='is-active'
        },
        openAddModal(){
            this.addActive  = 'is-active'
        },
        closeModal(){
             this.addActive = '',
            this.updateActive = '',
            axios.post('itemlist')
             .then((response)=>console.log(this.list = response.data))
        }
    }
}
</script>
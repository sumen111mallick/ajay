<template>
   <div class="modal" :class='openModal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add New Shipping Address</p>
      <button class="delete" aria-label="close" @click="close"></button>
    </header>
    <section class="modal-card-body">
        Vendor Name
        <div class="field">
                <div class="select is-info is-fullwidth">
                    <select  v-model="list.vendor_code">
                        <option value="" >Select Vendor</option>
                        <option v-for="vendor in vendorList" :key="vendor.vendor_code" :value="vendor.vendor_code" >{{vendor.vendor_name}}</option>
                        </select>
                </div>
            </div>
        
        <div class="field">
            Vendor Code
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.vendor_code}" type="text" placeholder="Vendor Code" v-model="list.vendor_code" disabled>
            </div>
            <small v-if="errors.vendor_code" class="has-text-danger">{{errors.vendor_code[0]}}</small>
        </div>
        <div class="field">
            Address
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.address}" type="text" placeholder="Address" v-model="list.address">
            </div>
             <small v-if="errors.address" class="has-text-danger">{{errors.address[0]}}</small>
        </div>
        <div class="field">
            Project Name
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.project_name}"  type="text" placeholder="Project Name" v-model="list.project_name">
            </div>
            <small v-if="errors.project_name" class="has-text-danger">{{errors.project_name[0]}}</small>
        </div>
         <div class="field">
            Project Location
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.project_location}"  type="text" placeholder="Project Location" v-model="list.project_location">
            </div>
            <small v-if="errors.project_location" class="has-text-danger">{{errors.project_location[0]}}</small>
        </div>
        <div class="field">
            State
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.state}"  type="text" placeholder="State" v-model="list.state">
            </div>
            <small v-if="errors.state" class="has-text-danger">{{errors.state[0]}}</small>
        </div>
        <div class="field">
            State Code
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.state_code}"  type="text" placeholder="State Code" v-model="list.state_code">
            </div>
            <small v-if="errors.state_code" class="has-text-danger">{{errors.state_code[0]}}</small>
        </div>
        <div class="field">
            GSTIN
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.gstin}"  type="text" placeholder="GSTIN" v-model="list.gstin">
            </div>
            <small v-if="errors.gstin" class="has-text-danger">{{errors.gstin[0]}}</small>
        </div>
        <div class="field">
            <div class="control">
                <label class="label">Active</label>
            </div>
            <div class="control">
                <div class="select is-info" :class="{'is-danger':errors.status}">
                    <select v-model="list.status">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <small v-if="errors.status" class="has-text-danger">{{errors.status[0]}}</small>
        </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="update">Save changes</button>
      <button class="button" @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
    props:['openModal'],
    data(){
        return{
            list:{},
            
           
            errors:{}
        }
    },
    
    methods:{
        close(){
           this.list['vendor_code']='',
            this.list['address']='',
            this.list['project_name']='',
            this.list['project_location']='',
            this.list['state']='',
            this.list['state_code']='',
            this.list['gstin']='',
            this.list['status']='1',
            this.error={},
            this.$emit('closeModal')
        },
        update(){
             axios.patch(`/shipping/${this.list.id}`,this.$data.list).then((response)=>{
                 this.errors={},
                 this.close()})
                .catch((error)=>console.log(this.errors = error.response.data.errors));  
        }
    },
    mounted(){
             axios.post('/vendorlist')
            .then((response)=>this.vendorList = response.data);
    },
}
</script>
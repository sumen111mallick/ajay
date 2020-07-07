<template>
   <div class="modal" :class='openmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add New Vendor</p>
      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
        <div class="field">
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.vendor_name}" type="text" placeholder="Vendor Name" v-model="list.vendor_name">
            </div>
            <small v-if="errors.vendor_name" class="has-text-danger">{{errors.vendor_name[0]}}</small>
        </div>
        <div class="field">
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.vendor_code}" type="text" placeholder="Vendor Code" v-model="list.vendor_code">
            </div>
            <small v-if="errors.vendor_code" class="has-text-danger">{{errors.vendor_code[0]}}</small>
        </div>
        <div class="field">
            <div class="control">
                <label class="label">Active</label>
            </div>
            <div class="control">
                <div class="select is-info">
                    <select v-model="list.status">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="save">Save changes</button>
      <button class="button" @click='close'>Cancel</button>
    </footer>
  </div>
</div>
</template>

<script>
export default {
    props:['openmodal'],
    data(){
        return{
            list:{
                vendor_name:'',
                vendor_code:'',
                status:'1'
            },
            errors:{}
        }
    },
    methods:{
        close(){
            this.$emit('closeModal')
        },
        save(){
                axios.post('/vendor',this.$data.list).then((response)=>{
                    this.close(),
                    this.$parent.vendorList.push(response.data),
                    this.list['vendor_name']='',
                    this.list['vendor_code']='',
                    this.list['status']='1'
                            
                })
                .catch((error)=>console.log(this.errors = error.response.data.errors));
        }
    }
}
</script>
<template>
   <div class="modal" :class='openModal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add New Vehicle</p>
      <button class="delete" aria-label="close" @click="close"></button>
    </header>
    <section class="modal-card-body">
        <div class="field">
            <div class="control">
                <label class="label">Vehicle Type</label>
            </div>
            <div class="control">
                <div class="select is-info" :class="{'is-danger':errors.type}">
                    <select v-model="list.type">
                        <option value="Tampo">Tampo</option>
                        
                    </select>
                    
                </div>
            </div>
            <small class="has-text-danger" v-if="errors.type">{{errors.type[0]}}</small>
        </div>
       
        <div class="field">
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.vehicle_no}" type="text" placeholder="Vehicle No" v-model="list.vehicle_no">
            </div>
            <small class="has-text-danger" v-if="errors.vehicle_no">{{errors.vehicle_no[0]}}</small>
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
            <small class="has-text-danger" v-if="errors.status">{{errors.status[0]}}</small>
        </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="save">Save changes</button>
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
            list:{
                type:'',
                vehicle_no:'',
                status:'1'
            },
            errors:{}
        }
    },
    methods:{
        close(){
            this.list.type='',
            this.list.vehicle_no='',
            this.list.status='1',
            this.errors={},
            this.$emit('closeModal')
        },
        save(){
            axios.post('/vehicle',this.$data.list)
            .then((response)=>{
                this.close(),
                this.list.type='',
                this.list.vehicle_no='',
                this.list.status='1',
                this.errors={}
            })
            .catch((error)=>console.log(this.$data.errors=error.response.data.errors));
        }
    }
}
</script>
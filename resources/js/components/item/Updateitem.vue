<template>
   <div class="modal" :class='openModal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add New Item</p>
      <button class="delete" aria-label="close" @click="close"></button>
    </header>
    <section class="modal-card-body">

        <div class="field">
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.item_name}" type="text" placeholder="Item Name" v-model="list.item_name">
            </div>
            <small class="has-text-danger" v-if="errors.item_name">{{errors.item_name[0]}}</small>
        </div>
       
        <div class="field">
            <div class="control">
                <input class="input is-info" :class="{'is-danger':errors.rate}" type="text" placeholder="Rate" v-model="list.rate">
            </div>
            <small class="has-text-danger" v-if="errors.rate">{{errors.rate[0]}}</small>
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
            list:{
                
            },
            errors:{}
        }
    },
    methods:{
        close(){
            
            this.$emit('closeModal')
        },
        update(){
            axios.patch(`/item/${this.list.id}`,this.$data.list)
            .then((response)=>{
                this.errors={},
                this.close()})
            .catch((error)=>console.log(this.$data.errors=error.response.data.errors));
        }
    }
}
</script>
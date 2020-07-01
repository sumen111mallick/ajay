<template>
   <div class="modal" :class='openmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
        <div class="field">
            <div class="control">
                <input class="input is-info" type="text" placeholder="Vendor Name" v-model="list.vendorName">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input class="input is-info" type="text" placeholder="Vendor Code" v-model="list.vendorCode">
            </div>
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
                vendorName:'',
                vendorCode:'',
                status:'1'
            }
        }
    },
    methods:{
        close(){
            this.$emit('closeModal')
        },
        save(){
                axios.post('/vendor',this.$data.list).then((response)=>this.close())
                .catch((error)=>console.log(error));
        }
    }
}
</script>
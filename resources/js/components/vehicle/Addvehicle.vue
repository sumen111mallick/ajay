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
                <div class="select is-info">
                    <select >
                        <option value="Tampo">Tampo</option>
                        
                    </select>
                </div>
            </div>
        </div>
       
        <div class="field">
            <div class="control">
                <input class="input is-info"  type="text" placeholder="Vehicle No" >
            </div>
            
        </div>
        <div class="field">
            <div class="control">
                <label class="label">Active</label>
            </div>
            <div class="control">
                <div class="select is-info">
                    <select >
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" >Save changes</button>
      <button class="button" @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
    props:['openModal'],
    methods:{
        close(){
            this.$emit('closeModal')
        }
    }
}
</script>
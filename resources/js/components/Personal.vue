<template>
   <nav class="panel">
  <p class="panel-heading">
    Personal Details
  </p>
  
  <article v-if="messages.success" class="message is-success" >
  <div class="message-body">
    {{messages.success}}
  </div>
</article>
  <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth
">
   <tbody>
       <tr>
            <td>Bank Account Name</td>
            <td>
                <input class="input is-info"   type="text" placeholder="Bank Account Name" v-model="list.bank_acc_name">
            </td>
       </tr>
     <tr>
            <td>Bank Account No</td>
            <td><input class="input is-info"   type="text" placeholder="Bank Account No" v-model="list.bank_acc_no" ></td>
       </tr>
        <tr>
            <td>Account Type</td>
            <td><input class="input is-info"   type="text" placeholder="Account Type" v-model="list.bank_acc_type"></td>
       </tr>
        <tr>
            <td>Bank Name</td>
            <td><input class="input is-info"   type="text" placeholder="Bank Name" v-model="list.bank_name"></td>
       </tr>
        <tr>
            <td>Branch</td>
            <td><input class="input is-info"   type="text" placeholder="Branch" v-model="list.bank_branch_name"></td>
       </tr>
        <tr>
            <td>IFSC</td>
            <td><input class="input is-info"   type="text" placeholder="IFSC" v-model="list.bank_ifsc"></td>
       </tr>
        <tr>
            <td>GSTIN</td>
            <td><input class="input is-info"   type="text" placeholder="GSTIN" v-model="list.gstin"></td>
       </tr>
        <tr>
            <td>CIN</td>
            <td><input class="input is-info"   type="text" placeholder="CIN" v-model="list.cin"></td>
       </tr>
       <tr>
            <td></td>
            <td><button class="button is-success is-rounded" @click="save">Update</button>
                </td>
       </tr>
  </tbody>
</table>
</nav>
</template>

<script>
export default {
    data(){
        return{
            list:{
                bank_acc_name:'',
                bank_acc_no:'',
                bank_acc_type:'',
                bank_name:'',
                bank_branch_name:'',
                bank_ifsc:'',
                gstin:'',
                cin:''
            },
            errors:{},
            messages:{}
        }
    },
    mounted(){
        axios.post('/personaldetail')
        .then((response)=>{
            this.list= response.data
        })
        .catch((error)=>console.log(this.errors=error.response.data.errors))
    },
    methods:{
        save(){
            axios.patch(`/personal/${this.list.id}`,this.$data.list)
            .then((response)=>{
                   this.messages.success='Data is Updated',
                    axios.post('/personaldetail')
                    .then((response)=>{
                     this.list= response.data
                     })
            })
            .catch((error)=>console.log('error'))
        }
    }
    
}
</script>
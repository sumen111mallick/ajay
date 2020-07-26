<template>
    <div>
    <nav class="panel">
    <p class="panel-heading">
      Invoices
      <router-link to="/invoice/add"><button class="button is-link is-outlined is-pulled-right">
        Add New Invoice
      </button></router-link>
      
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
        <th>Invoice No</th>
        <th>Invoice Date</th>
        <th>Invoice Billed To</th>
        <th>Amount before tax</th>
        <th>tax</th>
        <th>Invoice Value</th>
        <th>Payment Status</th>
        <th></th>
        
      </tr>
    </thead>
  
    <tbody>
      <tr v-for="(item,key) in list.data" :key="item.id">
        <td>{{key+1}}</td>
        <td>{{item.invoice_no}}</td>
        <td>{{item.invoice_date}}</td>
        <td>{{item.billed_to_name}}</td>
        <td>{{item.money_before_tax}}</td>   
        <td>{{item.money_tax_cgst + item.money_tax_sgst + item.money_tax_igst}}</td>
        <td>{{item.money_after_tax}}</td>
        
        <td v-if="item.payment_status==1">Paid</td>
        <td v-else>Unpaid</td>   
        
        <td><router-link :to="{ path: '/invoice/view', params: { userId: item.invoice_no }}"><span class="tag is-success" >view</span></router-link>  <span class="tag is-info" >Edit</span></td>
      </tr>
    
    </tbody>
  </table>
    <pagination :data="list" @pagination-change-page="getResults"></pagination>
  </nav>
</div>
</template>
<script>
Vue.component('pagination', require('laravel-vue-bulma-paginator'));

export default {
    
    data(){
        return{
            list:{},
            
        }
    },
    mounted(){
        axios.post('invoicelist')
        .then((response)=>console.log(this.list = response.data))
    },
    methods:{
        
        getResults(page=1){
            axios.post('invoicelist?page=' + page)
				.then(response => {
					this.list = response.data;
				});
        }
    }
}
</script>
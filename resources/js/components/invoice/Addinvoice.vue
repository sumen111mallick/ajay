<template>
    <div class="container">
        <nav class="panel ">
            <p class="panel-heading">
                        Generate invoice
            
            </p>
            
            <br>
            
            <div class="columns">
                <div class="column">
                   <div class="field">
                    <label class="label">Select Vendor</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select v-model="list.vendorCode">
                                <option>Select dropdown</option>
                                <option v-for="vendor in vendorList" :key="vendor.vendor_code" :value="vendor.vendor_code">{{vendor.vendor_name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Vendor Code</label>
                        <div class="control">
                            <input class="input" type="text" v-model="list.vendorCode" placeholder="Vendor Code" disabled>
                        </div>
                    </div> 
                    <div class="field">
                        <label class="label">Invoice Date</label>
                        <div class="control">
                            <input class="input" type="date" v-model="invoice_date">
                        </div>
                    </div>
                </div>  
                 <div class="column">
                    <div class="field">
                        <label class="label">PO No</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="PO No" v-model="list.po_no">
                        </div>
                    </div> 
                    <div class="field">
                        <label class="label">PO Date</label>
                        <div class="control">
                            <input class="input" type="date" v-model="list.po_date">
                        </div>
                    </div> 
                    <div class="field">
                        <label class="label">Job No</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Job No" v-model="list.job_no">
                        </div>
                    </div> 
                </div> 
            </div>  
            <div class="columns">
                <div class="column">
                    <nav class="panel is-primary">
                        <p class="panel-heading">
                            Billed To
                        </p>
                        <div class="panel-block">
                            
                            <div class="select is-fullwidth">
                                <select v-model="billedDropdown">
                                <option>Select dropdown</option>
                                <option v-for="(item,index) in billedToList" :key="item.id" :value="index">{{item.vendor.vendor_name}},{{item.address}}</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="Vendor Name" v-model="list.billedTo.vendorName" disabled>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <textarea class="textarea" placeholder="Address" v-model="list.billedTo.address" disabled></textarea>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="State" v-model="list.billedTo.state" disabled>
                                    <input class="input"  type="text" placeholder="State Code" v-model="list.billedTo.stateCode" disabled>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="GSTIN" v-model="list.billedTo.gstin" disabled>
                                </div>                                 
                        </div>
                    </nav>
                </div>
                <div class="column">
                    <nav class="panel is-primary">
                        <p class="panel-heading">
                            Shipped To
                        </p>
                        <div class="panel-block">
                            
                            <div class="select is-fullwidth">
                                <select v-model="shippedDropdown">
                                <option>Select dropdown</option>
                                <option v-for="(item,index) in shippedToList" :key="item.id" :value="index">{{item.vendor.vendor_name}},{{item.address}}</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="Vendor Name" v-model="list.shippedTo.vendorName" disabled>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <textarea class="textarea" placeholder="Address" v-model="list.shippedTo.address" disabled></textarea>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="State" v-model="list.shippedTo.state" disabled>
                                    <input class="input"  type="text" placeholder="State Code" v-model="list.shippedTo.stateCode" disabled>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="GSTIN" v-model="list.shippedTo.gstin" disabled>
                                </div>                                 
                        </div>
                    </nav>
                </div>
                <div class="column">
                    <nav class="panel is-primary">
                        <p class="panel-heading">
                            Transportation
                        </p>
                        <div class="panel-block">
                             <div class="select is-fullwidth">
                                <select v-model="list.vehicleMode">
                                    <option>Select Vehicle</option>
                                 <option v-for="(item) in vehicleModeList" :key="item.id" :value="item.type">{{item.type}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-block">
                             <div class="select is-fullwidth">
                                <select v-model="list.vehicleNo">
                                <option>Select Vehicle</option>
                                <option v-for="(item) in vehicleList" :key="item.id" :value="item.vehicle_no">{{item.vehicle_no}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="GR No." v-model="list.gr_no" >
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="date" placeholder="Date of Supply" v-model="list.dateOfSupply">
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="Place of Supply" v-model="list.placeOfSupply">
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="Project Name" v-model="list.shippedTo.projectName" disabled>
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    <input class="input"  type="text" placeholder="Project Location" v-model="list.shippedTo.projectLocation" disabled>
                                </div>                                
                        </div>
                    </nav>
                </div>
                
            </div>
            <div class="columns">
                <div class="column is-two-thirds">
                    <table class="table is-fullwidth">
                    <thead>
                        <tr>
                        <th>Sno</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Job No</th>
                        <th>QTY</th>
                        <th>Unit/Days</th>
                        <th>Rate</th>
                        <th>Amount</th>
                        <th></th>
                        
                        </tr>
                    </thead>
  
                    <tbody>
                        <tr v-for="(item,index) in list.invoiceItem" :key="item.id">
                            <td>{{index+1}}</td>
                            <td>{{item.itemName}}</td>
                            <td>{{item.itemDescription}}</td>
                            <td>{{item.itemJobNo}}</td>
                            <td>{{item.itemQuantity}}</td>
                            <td>{{item.itemDays}}</td>
                            <td>{{item.itemRate}}</td>
                            <td>{{item.itemRate * item.itemQuantity * item.itemDays}}</td>
                            <td><span class="tag is-danger" @click="deleteFromInvoiceItemList(index)">Delete</span></td>
                        </tr>
                    </tbody>
                    
                    </table>
                    <div class="columns">
                        <div class="column"></div>
                        <div class="column"></div>
                        <div class="column">
                            <table>
                                <tr>
                                    <td>Amount Before Tax:</td>
                                    <td>{{list.AmountBeforeTax}}</td>
                                </tr>
                                <tr>
                                    <td>IGST (18%):</td>
                                    <td>{{list.taxIgst}}</td>
                                </tr>
                                <tr>
                                    <td>SGST (9%):</td>
                                    <td>{{list.taxSgst}}</td>
                                </tr>
                                <tr>
                                    <td>CGST (9%):</td>
                                    <td>{{list.taxCgst}}</td>
                                </tr>
                                <tr>
                                    <td>Total Amount:</td>
                                    <td>{{list.totalAmount}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <nav class="panel is-primary">
                        <p class="panel-heading">
                            Choose Items
                        </p>
                        <div class="panel-block">
                            
                            <div class="select is-fullwidth">
                                <select v-model="taxDropdown">
                                <option>Select dropdown</option>
                                <option value="IGST">IGST</option>
                                <option value="SGST/CGST">SGST/CGST</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="panel-block">
                            
                            <div class="select is-fullwidth">
                                <select v-model="itemDropdown">
                                <option>Select dropdown</option>
                                <option v-for="(item,index) in itemList" :key="item.id" :value="index">{{item.item_name}},({{item.rate}})</option>
                                </select>
                            </div>
                            
                        </div>
                        <p v-if="errors.length" class="has-text-danger">
                                <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                                </ul>
                            </p>
                       <div class="panel-block">                           
                                <div class="control">
                                    Item Name
                                    <input class="input"  type="text" placeholder="Item Name" v-model="itemInputName" disabled>
                                </div>                                  
                        </div>
                         
                        <div class="panel-block">                           
                                <div class="control">
                                    Description
                                    <input class="input"  type="text" placeholder="Description" v-model="itemInputDescription" >
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    Item Job No
                                    <input class="input"  type="text" placeholder="Item Job No" v-model="itemInputJobNo" >
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    Rate
                                    <input class="input"  type="number" placeholder="Rate" v-model="itemInputRate" step=".01" >
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    Quantity
                                    <input class="input"  type="number" placeholder="Quantity" v-model="itemInputQuantity" >
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                    Days
                                    <input class="input"  type="text" placeholder="Days" v-model="itemInputDays" >
                                </div>                                  
                        </div>
                        <div class="panel-block">                           
                                <div class="control">
                                   <button class="button is-success" @click="AddItem">Add Item</button>
                                </div>                                  
                        </div>
                    </nav>
                    
                </div>
                
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data(){
        return{
            errors:{},
            vendorList:{},
            billedToList:{},
            billedDropdown:'',
             shippedToList:{},
            shippedDropdown:'',
            itemList:{},
            itemDropdown:'',
            itemInputId:'',
            itemInputName:'',
            itemInputDescription:'',
            itemInputJobNo:'',
            itemInputRate:'',
            itemInputQuantity:'',
            itemInputDays:'',
            taxDropdown:'',
            list:{
                AmountBeforeTax:0,
                taxMode:'',
                taxIgst:0,
                taxSgst:0,
                taxCgst:0,
                totalAmount:0,
                invoiceItem:[],
                billedTo:{
                    vendorName:'',
                    address:'',
                    state:'',
                    stateCode:'',
                    gstin:'',
                },
                shippedTo:{
                    vendorName:'',
                    address:'',
                    state:'',
                    stateCode:'',
                    gstin:'',
                    projectName:'',
                    projectLocation:''
                },
                vehicleMode:'',
                vehicleNo:'',
                vendorCode:'',
                po_no:'',
                po_date:'',
                job_no:'',
                gr_no:'',
                dateOfSupply:'',
                placeOfSupply:''
            },
            
           vehicleModeList:{},
            vehicleList:{},



            vendorCode:'',
            invoice_date:''
            
        }
    },
    methods:{
        fetchVendorList(){
            axios.post('/invoicevendorlist')
            .then((response)=>{this.vendorList = response.data
            })
            
        },
        fetchBilledTo(val){
            axios.post('/invoicebilledlist',{vendorcode: val})
            .then((response)=>this.billedToList = response.data)
        },
        fetchShippedTo(val){
            axios.post('/invoiceshippedlist',{vendorcode: val})
            .then((response)=>this.shippedToList = response.data)
        },
        fetchTransportationMode(){
            axios.post('/invoicevehiclemodelist')
            .then((response)=>this.vehicleModeList = response.data)
        },
        fetchVehicleNo(val){
             axios.post('/invoicevehiclelist',{vehicleMode: val})
            .then((response)=>this.vehicleList = response.data)
        },
        itemsList(){
            axios.post('/invoiceitemlist')
            .then((response)=>this.itemList = response.data)
        },
        generateNewRow( InputId,InputName,InputDescription,InputJobNo,InputRate,InputQuantity,InputDays){
            return{
                itemId: InputId,
                itemName:InputName,
                itemDescription:InputDescription,
                itemJobNo:InputJobNo,
                itemRate:InputRate,
                itemQuantity:InputQuantity,
                itemDays:InputDays
            }

        },
        AddItem(){
            if(this.itemInputId && this.itemInputName && this.itemInputDescription && this.itemInputJobNo && this.itemInputRate && this.itemInputQuantity && this.itemInputDays){
            var productSelected = this.generateNewRow(this.itemInputId,this.itemInputName,this.itemInputDescription,this.itemInputJobNo,this.itemInputRate,this.itemInputQuantity,this.itemInputDays);
            this.list.invoiceItem.push(productSelected);
            this.itemInputDescription='',
            this.itemInputJobNo='',
            
            this.itemInputQuantity='',
            this.itemInputDays='',
            this.errors={},
            this.calculate()
           
            }
            else{
                this.errors=["incomplete form"]
            }
        },
        deleteFromInvoiceItemList(index){
            this.$delete(this.list.invoiceItem,index),
            this.calculate()
        },
        calculate(){
            var price = 0;
            this.list.invoiceItem.forEach(function(item){
                price +=item.itemRate *item.itemQuantity *item.itemDays
            })
            this.list.AmountBeforeTax = price;
            if(this.taxDropdown == 'IGST'){
                this.list.taxMode = 'IGST',
                this.list.taxIgst = this.list.AmountBeforeTax * 0.18,
                this.list.totalAmount = this.list.AmountBeforeTax + this.list.taxIgst,
                this.list.taxSgst='',
                this.list.taxCgst=''
            }
            else if(this.taxDropdown == 'SGST/CGST'){
                this.list.taxMode = 'SGST/CGST',
                this.list.taxSgst = this.list.AmountBeforeTax * 0.09,
                this.list.taxCgst = this.list.AmountBeforeTax * 0.09,
                this.list.totalAmount = this.list.AmountBeforeTax + this.list.taxSgst + this.list.taxCgst,
                
                this.list.taxIgst=''
            }
            
        }
        
    },
    mounted(){
        this.fetchVendorList();
        this.fetchTransportationMode();
        this.itemsList();
    },
    watch:{
        'list.vendorCode':function(val) {
                    this.fetchBilledTo(val);
                    this.list.billedTo.vendorName="";
                    this.list.billedTo.address = "";
                    this.list.billedTo.state = "";
                    this.list.billedTo.stateCode = "";
                    this.list.billedTo.gstin ="";
                    this.billedDropdown="";
                
                    this.fetchShippedTo(val);
                    this.list.shippedTo.vendorName="";
                    this.list.shippedTo.address = "";
                    this.list.shippedTo.state = "";
                    this.list.shippedTo.stateCode = "";
                    this.list.shippedTo.gstin ="";
                    this.list.shippedTo.projectName = "";
                    this.list.shippedTo.projectLocation="";
                    this.shippedDropdown="";
               },
        billedDropdown:function(val){
            this.list.billedTo.vendorName = this.billedToList[val].vendor.vendor_name;
            this.list.billedTo.address = this.billedToList[val].address;
            this.list.billedTo.state = this.billedToList[val].state;
            this.list.billedTo.stateCode = this.billedToList[val].state_code;
            this.list.billedTo.gstin = this.billedToList[val].gstin;
        },
        shippedDropdown:function(val){
            this.list.shippedTo.vendorName = this.shippedToList[val].vendor.vendor_name;
            this.list.shippedTo.address = this.shippedToList[val].address;
            this.list.shippedTo.state = this.shippedToList[val].state;
            this.list.shippedTo.stateCode = this.shippedToList[val].state_code;
            this.list.shippedTo.gstin = this.shippedToList[val].gstin;
            this.list.shippedTo.projectName = this.shippedToList[val].project_name;
            this.list.shippedTo.projectLocation = this.shippedToList[val].project_location;
        },
        'list.vehicleMode':function(val){
            this.fetchVehicleNo(val);
        },
        itemDropdown:function(val){
            this.itemInputId = this.itemList[val].id,
            this.itemInputName = this.itemList[val].item_name,
            this.itemInputRate=this.itemList[val].rate
            
        },
        'list.job_no':  function(val){
            this.itemInputJobNo = this.list.job_no;
        },
        taxDropdown: function(val){
            this.calculate()
        }  

    }
}
</script>
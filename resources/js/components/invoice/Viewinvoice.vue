<template>
    <div class="container">
        <nav class="panel ">
            <p class="panel-heading">
                        Generate invoice
            
            </p>
            
            <br>
            <div class="column">
                <p v-if="mainerrors" class="has-text-danger">
                                <ul>
                                <li v-for="error in mainerrors" :key="error">{{ error }}</li>
                                </ul>
                            </p>
            </div>
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
                            <input class="input" type="date" v-model="list.invoice_date">
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
                            <td v-if="item.itemDays=='days'">{{item.itemRate * item.itemQuantity * item.itemDays}}</td>
                            <td v-else>{{item.itemRate * item.itemQuantity}}</td>
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
                                <select v-model="unitDays">
                                <option>Select dropdown</option>
                                <option value="unit">Unit</option>
                                <option value="days">Days</option>
                                </select>
                            </div>
                            
                        </div>
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
                                    Unit/Days
                                    <input class="input"  type="text" placeholder="Unit/Days" v-model="itemInputDays" >
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
             <div class="column">
                <div class="control">
                 <button class="button is-link" @click="submitInvoice">Submit Invoice</button>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    
}
</script>
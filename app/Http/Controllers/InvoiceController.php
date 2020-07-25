<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Invoice;
use App\InvoiceItem;
use App\Vendor;
use App\Billing;
use App\Shipping;
use App\Vehicle;
use App\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function invoiceList()
    {
        return Invoice::latest()->paginate(10);
    }

    public function invoiceVendorList()
    {
        return Vendor::latest()->get();
    }

    public function invoiceBilledList(Request $request)
    {
        //return $request->vendorcode;
        return Billing::with('vendor')->where('vendor_code',$request->vendorcode)->get();
    }
    
    public function invoiceShippedList(Request $request)
    {
        //return $request->vendorcode;
        return Shipping::with('vendor')->where('vendor_code',$request->vendorcode)->get();
    }
    
    public function invoiceVehicleModeList()
    {
        //return $request->vendorcode;
        return Vehicle::select('type')->groupBy('type')->get();
    }

    public function invoiceVehicleList(Request $request)
    {
        //return $request->vendorcode;
        return Vehicle::where('type',$request->vehicleMode)->get();
    }

    public function invoiceItemList()
    {
        //return $request->vendorcode;
        return Item::all();
    }
    
    public function getInvoiceNo()
    {
        $date=Carbon::today();;

    //echo "<br> Month: ".date_format($date,"m");
    if (date_format($date,"m") >= 4) {//On or After April (FY is current year - next year)
        $financial_year = (date_format($date,"Y")) . '-' . (date_format($date,"y")+1);
    } else {//On or Before March (FY is previous year - current year)
        $financial_year = (date_format($date,"Y")-1) . '-' . date_format($date,"y");
    }

    //return $financial_year;
    $row = Invoice::where('invoice_no','LIKE','%'.$financial_year.'%')->select('invoice_no')->orderBy('invoice_no','DESC')->first();
    if($row){
        $value2 = substr($row->invoice_no, 11, 15);//separating numeric part
        $value2 = $value2 + 1;//Incrementing numeric part
        $value2 = "AI/".$financial_year."/" . str_pad($value2,4,'0',STR_PAD_LEFT);//concatenating incremented value
        return $value2;
    }
    else{
        return "AI/".$financial_year."/0001";
    }
    }
    public function generateInvoice(InvoiceRequest $request)
    {
        //return $request->all();
        $invoiceNo =  $this->getInvoiceNo();   
        $invoice = new Invoice;
        $invoice->invoice_no = $invoiceNo;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->vendor_code = $request->vendorCode;
        $invoice->cost_centre_no = '';
        $invoice->po_no = $request->po_no;
        $invoice->po_date = $request->po_date;
        $invoice->job_no = $request->job_no;
        $invoice->billed_to_name = $request->billedTo['vendorName'];
        $invoice->billed_to_address = $request->billedTo['address'];
        $invoice->billed_to_state = $request->billedTo['state'];
        $invoice->billed_to_state_code = $request->billedTo['stateCode'];
        $invoice->billed_to_gstin = $request->billedTo['gstin'];
        $invoice->shipped_to_name = $request->shippedTo['vendorName'];
        $invoice->shipped_to_address = $request->shippedTo['address'];
        $invoice->shipped_to_state = $request->shippedTo['state'];
        $invoice->shipped_to_state_code = $request->shippedTo['stateCode'];
        $invoice->shipped_to_gstin = $request->shippedTo['gstin'];
        $invoice->shipped_to_project_name = $request->shippedTo['projectName'];
        $invoice->shipped_to_project_location = $request->shippedTo['projectLocation'];
        $invoice->transportation_mode = $request->vehicleMode;
        $invoice->transportation_vehicle_no = $request->vehicleNo;
        $invoice->transportation_gr_no = $request->gr_no;
        $invoice->transportation_date_of_supply = $request->dateOfSupply;
        $invoice->transportation_place_of_supply = $request->placeOfSupply;
        $invoice->money_before_tax = $request->AmountBeforeTax;
        $invoice->money_tax_mode = $request->taxMode;
        $invoice->money_tax_sgst = $request->taxSgst;
        $invoice->money_tax_cgst = $request->taxCgst;
        $invoice->money_tax_igst = $request->taxIgst;
        $invoice->money_after_tax = $request->totalAmount;
        $invoice->payment_status = 0;
        $invoice->save();
        
        foreach($request->invoiceItem as $item)
        {
            $invoiceItem = new InvoiceItem;
            $invoiceItem->invoice_id = $invoice->invoice_no;
            $invoiceItem->item_id = $item['itemId'];
            $invoiceItem->item_name = $item['itemName'];
            $invoiceItem->item_quantity = $item['itemQuantity'];
            $invoiceItem->item_rate = $item['itemRate'];
            $invoiceItem->item_job_no = $item['itemJobNo'];
            $invoiceItem->item_desc = $item['itemDescription'];
            $invoiceItem->item_days = $item['itemDays'];
            $invoiceItem->save();
        }
         

    }
}

<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Vendor;
use App\Billing;
use App\Shipping;
use App\Vehicle;
use App\Item;
use Illuminate\Http\Request;

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
        //
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
    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
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
    public function store(BillingRequest $request)
    {
        $billing = new Billing;
        $billing->vendor_code = $request->vendor_code;
        $billing->address = $request->address;
        $billing->state = $request->state;
        $billing->state_code = $request->state_code;
        $billing->gstin = $request->gstin;
        $billing->cost_centre_no = $request->cost_centre_no;
        $billing->status = $request->status;
        $billing->save();
        //dd($billing::with('vendor')->get());
        return $billing;
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(BillingRequest $request)
    {
        $billing = Billing::find($request->id);
        $billing->vendor_code = $request->vendor_code;
        $billing->address = $request->address;
        $billing->state = $request->state;
        $billing->state_code = $request->state_code;
        $billing->gstin = $request->gstin;
        $billing->cost_centre_no = $request->cost_centre_no;
        $billing->status = $request->status;
        $billing->save();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }

    public function billingList()
    {
        return Billing::with('vendor')->latest()->get();
    }
}

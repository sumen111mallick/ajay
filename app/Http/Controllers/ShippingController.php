<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
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
    public function store(ShippingRequest $request)
    {
        $shipping = new Shipping;
        $shipping->vendor_code = $request->vendor_code;
        $shipping->address = $request->address;
        $shipping->state = $request->state;
        $shipping->state_code = $request->state_code;
        $shipping->gstin = $request->gstin;
        $shipping->project_name = $request->project_name;
        $shipping->project_location = $request->project_location;
        $shipping->status = $request->status;
        $shipping->save();
        //dd($billing::with('vendor')->get());
        return $shipping;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingRequest $request)
    {
        $shipping = shipping::find($request->id);
        $shipping->vendor_code = $request->vendor_code;
        $shipping->address = $request->address;
        $shipping->state = $request->state;
        $shipping->state_code = $request->state_code;
        $shipping->gstin = $request->gstin;
        $shipping->project_name = $request->project_name;
        $shipping->project_location = $request->project_location;
        $shipping->status = $request->status;
        $shipping->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
    public function shippingList()
    {
        return Shipping::with('vendor')->latest()->get();
    }
}

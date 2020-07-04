<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Vendor;
use Illuminate\Http\Request;


class VendorController extends Controller
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

    public function vendorList()
    {
        return Vendor::latest()->get();
    } 

    public function store(VendorRequest $request)
    {
        
        $vendor = new Vendor;
        $vendor->vendor_name = $request->vendor_name;
        $vendor->vendor_code = $request->vendor_code;
        $vendor->status = $request->status;
        
        $vendor->save();
        return $vendor;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request)
    {
        $vendor = Vendor::find($request->id);
        $vendor->vendor_name = $request->vendor_name;
        $vendor->vendor_code = $request->vendor_code;
        $vendor->status = $request->status;
        
        $vendor->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}

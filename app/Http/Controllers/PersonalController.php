<?php

namespace App\Http\Controllers;

use App\personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
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
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personal $personal)
    {
        $data = personal::find($personal->id);
        $data->bank_acc_name    =   $request->bank_acc_name;
        $data->bank_acc_no    =   $request->bank_acc_no;
        $data->bank_acc_type    =   $request->bank_acc_type;
        $data->bank_branch_name    =   $request->bank_branch_name;
        $data->bank_ifsc    =   $request->bank_ifsc;
        $data->bank_name    =   $request->bank_name;
        $data->cin    =   $request->cin;
        $data->gstin    =   $request->gstin;
        $data->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(personal $personal)
    {
        //
    }

    public function personalDetail()
    {
        return personal::first();
    }
}

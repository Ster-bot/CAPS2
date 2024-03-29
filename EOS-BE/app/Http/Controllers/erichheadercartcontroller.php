<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customercart;

class erichheadercartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return customercart::all();
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
        $dataGet = $request->register;
        //$getData = customercart::where('Email', $dataGet);
        $getData = customercart::all();
        //$getData = customercart::find($dataGet);

        //return "this is return";
        //return $request->register;
        return $getData->where('Email', $dataGet)->values();
        //return $getData;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getData = customercart::all();
        $dataGet = $request->itemupdate["item_email"];
        $existingItem = customercart::find($id);
        $existingQty = customercart::where('id', $id)->pluck('Quantity');
        foreach($existingQty as $value){
            $qty = $value;
        }
        $add = $request->itemupdate["item_quantity"]-1;

        if(true){
            $existingItem->id = $id;
            $existingItem->Email = $request->itemupdate["item_email"];
            $existingItem->Quantity = $add;
            $existingItem->ItemCode = $request->itemupdate["item_code"];
            $existingItem->save();

            //return $existingItem;
            return $getData->where('Email', $dataGet)->values();
        }
        else{
            return $getData->where('Email', $dataGet)->values();;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

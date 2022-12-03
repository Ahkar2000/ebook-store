<?php

namespace App\Http\Controllers;

use App\Models\BuyerList;
use App\Http\Requests\StoreBuyerListRequest;
use App\Http\Requests\UpdateBuyerListRequest;

class BuyerListController extends Controller
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
     * @param  \App\Http\Requests\StoreBuyerListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuyerListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerList $buyerList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerList $buyerList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuyerListRequest  $request
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuyerListRequest $request, BuyerList $buyerList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyerList  $buyerList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerList $buyerList)
    {
        //
    }
}

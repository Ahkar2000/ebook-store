<?php

namespace App\Http\Controllers;

use App\Models\Recharge;
use App\Http\Requests\StoreRechargeRequest;
use App\Http\Requests\UpdateRechargeRequest;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.recharge');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRechargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRechargeRequest $request)
    {
        $recharge = new Recharge();
        $recharge->user_id = Auth::id();
        $recharge->amount = $request->amount;
        $recharge->lastId = $request->lastId;
        $recharge->bank = $request->bank;

        $imgName = uniqid()."_ss.".$request->file('tphoto')->extension();
        $request->file('tphoto')->storeAs("public/ss/",$imgName);

        $recharge->tphoto = $imgName;
        $recharge->save();
        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function show(Recharge $recharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function edit(Recharge $recharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRechargeRequest  $request
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRechargeRequest $request, Recharge $recharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recharge $recharge)
    {
        //
    }
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
    public function rechargeList()
    {
        return view('dashboard.recharge-list');
    }
}

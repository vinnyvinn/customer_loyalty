<?php

namespace Loyalty\Controllers;

use Illuminate\Http\Request;
use Loyalty\LoyaltyPoint;
use Loyalty\Policy;
use Loyalty\Customer;
use Response;

class LoyaltyPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loyaltypoints.index');
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
        LoyaltyPoint::enroll($request->customer_id);
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
        //
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

    public function loyaltycustomers()
    {
      return view('loyaltypoints.customers');
    }

    public function customers(Request $request)
    {
      if(isset($request->customer_transferring)){

        LoyaltyPoint::transferPoints($request->points, $request->customer_transferring, $request->customer_transfered);

      }elseif(isset($request->points)){

        LoyaltyPoint::redeemPoints($request->points, $request->customer_id);

      }elseif(isset($request->amount)){

        LoyaltyPoint::earnPoints($request->amount, $request->customer_id);
      }
      return Response::json([
        'customers' => Customer::with(['loyalty_points'])->has('loyalty_points')->latest()->get(),
      ]);
    }
}

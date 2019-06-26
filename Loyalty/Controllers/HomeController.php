<?php

namespace Loyalty\Controllers;
use Illuminate\Http\Request;
use Loyalty\LoyaltyPoint;
use Loyalty\CustomerTransaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
          'loyaltypoints' => LoyaltyPoint::all(),
          'accumulation' => CustomerTransaction::where('transaction', CustomerTransaction::DEBIT)->get(),
          'redeem' => CustomerTransaction::where('transaction', CustomerTransaction::REDEEM)->get(),
          'disenroll' => CustomerTransaction::where('transaction', CustomerTransaction::DISENROLL)->get(),
        ]);
    }
}

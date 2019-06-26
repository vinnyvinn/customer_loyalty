<?php

namespace Loyalty\Controllers;

use Illuminate\Http\Request;
use Loyalty\Customer;
use Loyalty\CustomerTransaction;
use Loyalty\LoyaltyPoint;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
      return view('reports.index', [
        'loyaltypoints' => LoyaltyPoint::with('customers')->orderby('points', 'desc')->get(),
      ]);
    }

    public function highest()
    {
      $pdf = PDF::loadView('reports.highest', [
        'loyaltypoints' => LoyaltyPoint::with('customers')->orderby('points', 'desc')->get(),
      ]);
      return $pdf->download('highest-point-holders.pdf');
    }

    public function accumulate()
    {
      return view('reports.accumulate', [
        'accumulated' => CustomerTransaction::where('transaction', CustomerTransaction::DEBIT)->get(),
      ]);
    }

    public function accumulated()
    {
      $pdf = PDF::loadView('reports.accumulated', [
        'accumulated' => CustomerTransaction::where('transaction', CustomerTransaction::DEBIT)->get(),
      ]);
      return $pdf->download('accumulated-points.pdf');
    }

    public function redeemed()
    {
        return view('reports.redeemed', [
          'redeemed' => CustomerTransaction::where('transaction', CustomerTransaction::REDEEM)->get(),
        ]);
    }

    public function redeem()
    {
      $pdf = PDF::loadView('reports.redeem', [
        'redeemed' => CustomerTransaction::where('transaction', CustomerTransaction::REDEEM)->get(),
      ]);
      return $pdf->download('redeemed-points.pdf');
    }

    public function disenrolled()
    {
      return view('reports.disenrolled', [
        'disenrolled' => CustomerTransaction::where('transaction', CustomerTransaction::DISENROLL)->get(),
      ]);
    }
}

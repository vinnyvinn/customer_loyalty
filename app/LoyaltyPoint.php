<?php

namespace App;
use App\Customer;
use App\Policy;
use Illuminate\Database\Eloquent\Model;

class LoyaltyPoint extends Model
{
    protected $fillable = ['customer_id', 'points'];

    public function customers()
    {
      return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    //LoyaltyPoints functions

    public static function enroll($customer_id)
    {
      if(LoyaltyPoint::where('customer_id', $customer_id)->count()){

        $points = LoyaltyPoint::where('customer_id', $customer_id)->first();

        CustomerTransaction::create([
          'customer_id' => $customer_id,
          'amount' => 0,
          'points' => $points->points,
          'transaction' => CustomerTransaction::DISENROLL
        ]);

        $points->delete();

      }else{
        $policy = Policy::find(3);

        LoyaltyPoint::create([
          'customer_id' => $customer_id,
          'points' => $policy->points,
        ]);

        CustomerTransaction::create([
          'customer_id' => $customer_id,
          'amount' => 0,
          'points' => $policy->points,
          'transaction' => CustomerTransaction::ENROLL
        ]);
      }
    }

    public static function earnPoints($amount, $customer_id)
    {
        $points = LoyaltyPoint::where('customer_id', $customer_id)->first();
        $policy = Policy::find(1);
        $points_earned = ($amount * ($policy->points / $policy->amount));
        $points->points = $points->points +  $points_earned;
        $points->save();

        CustomerTransaction::create([
          'customer_id' => $customer_id,
          'amount' => $amount,
          'points' => $points_earned,
          'transaction' => CustomerTransaction::DEBIT
        ]);
    }

    public static function redeemPoints($points_redeemed, $customer_id)
    {
      $points = LoyaltyPoint::where('customer_id', $customer_id)->first();
      $policy = Policy::find(2);
      $points->points = $points->points - $points_redeemed;
      $points->save();
      $amount = $policy->amount * $points_redeemed;
      $customer = Customer::where('id', $customer_id)->first();
      $customer->balance = $customer->balance + $amount;
      $customer->save();

      CustomerTransaction::create([
        'customer_id' => $customer->id,
        'amount' => $amount,
        'points' => $points_redeemed,
        'transaction' => CustomerTransaction::REDEEM
      ]);
    }

    public static function transferPoints($points, $transferring, $receiving)
    {
      $points_from = LoyaltyPoint::where('customer_id', $transferring)->first();
      $points_to = LoyaltyPoint::where('customer_id', $receiving)->first();
      $points_from->points = $points_from->points - $points;
      $points_to->points = $points_to->points + $points;
      $points_from->save();
      $points_to->save();

      CustomerTransaction::create([
        'customer_id' => $transferring,
        'amount' => 0,
        'points' => $points,
        'transaction' => CustomerTransaction::TRANSFERING
      ]);

      CustomerTransaction::create([
        'customer_id' => $receiving,
        'amount' => 0,
        'points' => $points,
        'transaction' => CustomerTransaction::RECEIVING
      ]);
    }
}

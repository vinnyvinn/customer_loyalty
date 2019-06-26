<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'address', 'gender', 'balance'];

    public function loyalty_points()
    {
      return $this->hasOne(LoyaltyPoint::class);
    }
}

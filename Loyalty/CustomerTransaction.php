<?php

namespace Loyalty;

use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    protected $fillable = ['customer_id', 'amount', 'points', 'transaction'];

    const ENROLL = 'Enroll';
    const DEBIT = 'Transaction';
    const TRANSFERING = 'Transferring';
    const RECEIVING = 'Receiving';
    const REDEEM = 'Redeem';
    const DISENROLL = 'Disenroll';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}

<?php

namespace App\Models;

use App\Traits\managementPlaceToPayTrait;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use managementPlaceToPayTrait;

    protected $fillable = [
        'transaction_code',
        'transaction_status',
        'transaction_request_id',
        'transaction_process_url',
        'transaction_message_request',
        'transaction_payment_response',
        'transaction_message_payment',
        'transaction_message_response',
        'transaction_created',
        'transaction_expired',
        'order_id',
    ];

    //Accesors
    public function getExpiredTimeAttribute()
    {
        return strtotime($this->transaction_expired) - strtotime($this->transaction_created);
    }

    //Relations
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function consecutivo()
    {
        return $this->morphOne('App\Models\Consecutivo','consecutable');
    }
}

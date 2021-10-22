<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'customer_document_type',
        'customer_document_number',
        'order_reference',
        'order_amount',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consecutivo(){
        return $this->morphOne('App\Models\Consecutivo','consecutable');
    }
}

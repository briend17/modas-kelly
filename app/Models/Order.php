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

    //Accesors
    public function getStatusDisplayAttribute()
    {
        $status = '';
        switch ($this->status) {
            case 'CREATED':
                $status = 'PENDIENTE';
            break;
            case 'PAYED':
                $status = 'PAGADA';
            break;
            case 'REJECTED':
                $status = 'RECHAZADA';
            break;
            default:
                $status = 'INCOMPLETA';
            break;
        }
        return $status;
    }
    public function getStatusColorAttribute()
    {
        $color = '';
        switch ($this->status) {
            case 'PAYED':
                $color = ' text-green-700 bg-green-100 ';
            break;
            default:
                $color = ' text-red-700 bg-red-100 ';
            break;
        }
        return $color;
    }
    //Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consecutivo()
    {
        return $this->morphOne('App\Models\Consecutivo','consecutable');
    }
}

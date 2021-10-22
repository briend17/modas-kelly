<?php

namespace App\Observers;

use App\Models\Consecutivo;
use App\Models\Order;
use App\Models\User;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //Obtener codigo de referencia de la orden y actualizar en la tabla
        $referencia = Consecutivo::getConsecutivo($order,$order->user_id);
        $order->order_reference = $referencia;
        //aplicar status por defecto de la orden
        $order->status = 'CREATED';
        $order->save();

        //Actualizar campos customer en user, para futuras compras
        $user = User::find($order->user_id);
        $user->mobile = $order->customer_mobile;
        $user->document_type = $order->customer_document_type;
        $user->document_number = $order->customer_document_number;
        $user->save();
    }
}

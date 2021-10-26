<?php

namespace App\Observers;

use App\Models\Consecutivo;
use App\Models\Order;
use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function created(Transaction $transaction)
    {
         //obtener consecutivo y actualizar
      $consecutivo = Consecutivo::getConsecutivo($transaction,\Auth::id());
      $placetopay = Transaction::getPlaceToPay($transaction->order_id,$transaction->id);

      $transaction->transaction_code = $consecutivo;
      $transaction->transaction_request_id =  $placetopay->requestId();
      $transaction->transaction_process_url = $placetopay->processUrl();
      $transaction->transaction_message_request = $placetopay->status()->message();
      $transaction->save();

    }

    /**
     * Handle the Transaction "updated" event.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return void
     */
    public function updated(Transaction $transaction)
    {
        $status = ($transaction->transaction_status == 'APPROVED')? 'PAYED' : $transaction->transaction_status;
        $order = Order::findOrFail($transaction->order_id);
        $order->status = $status;
        $order->save();
    }
}

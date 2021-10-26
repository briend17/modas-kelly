<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $request->ord;
        $transaction = Transaction::where('order_id',$order)->whereNull('transaction_status')->first();
        if(empty($transaction) || $transaction->expired_time <= 0)
        {
            try{
                DB::beginTransaction();
                    $transaction = Transaction::registerTransaction($order);
                DB::commit();
            }catch(Exception $e){
                DB::rollback();
            }
        }

        return redirect()->away($transaction->transaction_process_url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        Transaction::placeToPayResponse($transaction);

        return redirect(route('orders.show', ["order" => $transaction->order_id]));
    }
}

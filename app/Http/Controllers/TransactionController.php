<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Receive request external and redirect.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //recibir la respuesta de palcetopay
        //redireccionar al metodo update
        dd($request->all());
    }

    public function receivePay(Request $request)
    {
        //recibir la respuesta de palcetopay
        //actualizar transaction, order(observer) y redireccionar al metodo show de order
        $status = "CREATED";
        $status_rand = rand(1,2);
        switch ($status_rand) {
            case 1:
                $status = "PAYED";
            break;
            case 2:
                $status = "REJECTED";
            break;
        }
        //session(['status' => $status]);
        $order = Order::find(session('order'));
        $order->status = $status;
        $order->save();
        return redirect(route('orders.show', ["order" => session("order")]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar si la referencia tiene una transaccion abierta
        //si existe, obtener url de pago
        //sino obtener url pago desde placetopay y guardar la transaccion
        //redireccionar al sitio de pago
        //dd($request->all());
        return view('placetopay');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //gestionar actualizacion de la transaccion
        // - Realizar verificación del request placetopay
        // hacer update de la transaccion
        //redirigir al update de la orden con la referencia y el status a actualizar
    }
}

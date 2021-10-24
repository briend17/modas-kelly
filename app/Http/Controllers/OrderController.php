<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const ORDER_AMOUNT = 89000;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Order::select('*');
        if(\Auth::user()->profile == 'Cliente') $orders = $query->where('user_id',\Auth::id());
        $orders = $query->orderBy('id','desc')->get();
        //dd($orders);
        return view('orders.index',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $input = $request->all();
            $input['user_id'] = \Auth::id();
            $input['order_amount'] = self::ORDER_AMOUNT;
            //dd($input);

            DB::beginTransaction();
            $order = Order::create($input);
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
        return redirect(route('orders.show',['order' => $order->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        session(["order" => $order->id]);
        //dd('00');
        return view('orders.show',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        /*
            hacer update a status pedido
        - redireccionar a show
         */
        dd(session('status'));
        $order->status = session("status");
        $order->save();
        return redirect()->action('OrderController@show', $order->id);
    }
}

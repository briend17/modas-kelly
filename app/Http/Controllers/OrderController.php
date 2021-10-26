<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Order;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;

class OrderController extends Controller
{
    const ORDER_AMOUNT = 89000;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Order::select('*');
        if(\Auth::user()->profile == 'Cliente') $orders = $query->where('user_id',\Auth::id());
        $orders = $query->orderBy('id','desc')->get();

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
    public function show(Request $request,Order $order)
    {
        return view('orders.show',compact('order'));
    }
}

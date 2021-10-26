<?php
namespace App\Traits;

use DB;
use App\Models\Consecutivo;
use App\Models\Order;
use App\Models\Transaction;
use Dnetix\Redirection\PlacetoPay;

trait managementPlaceToPayTrait {

   public static function initPlaceToPay()
   {
      return new PlacetoPay([
         'login' => config('services.placetopay.login'), // Provided by PlacetoPay
         'tranKey' => config('services.placetopay.secret_key'), // Provided by PlacetoPay
         'baseUrl' => config('services.placetopay.base_url'), // Provided by PlacetoPay
      ]);
   }

   public static function getPlaceToPay($order,$transaction)
   {
      $order = Order::select('id','order_reference','order_amount')->where('id',$order)->first();
      $placetopay = Transaction::initPlaceToPay();
      $reference = $order->order_reference;
      $description = "Pago de pedido: ".$reference;

      $request = [
         "payment" => [
             "reference" => $reference,
             "description" => $description,
             "amount" => [
                 "currency" => "COP",
                 "total" => $order->order_amount,
             ],
         ],
         "expiration" => date("c", strtotime("+1 days")),
         "returnUrl" => route('transactions.show',['transaction' => $transaction]),
         "ipAddress" => "127.0.0.1",
         "userAgent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36",
      ];

      return $placetopay->request($request);
   }

   public static function registerTransaction($order)
   {
      $transaction = Transaction::create([
          'transaction_created' => date("c"),
          'transaction_expired' => date("c", strtotime("+1 days")),
          'order_id' => $order,
      ]);

      return $transaction;
   }

   public static function placeToPayResponse($transaction)
   {
      try{
         DB::beginTransaction();
             //Obtener instancia placetopay
             $placetopay = Transaction::initPlaceToPay();
             //cosultar status de la transaccion segun si requiestID
             $response = $placetopay->query($transaction->transaction_request_id);
             //actualizar valores del response del sitio placetopay
             $transaction->transaction_status = $response->status()->status();
             $transaction->transaction_payment_response = json_encode($response->payment());
             $transaction->transaction_message_payment = (count($response->payment()))? $response->payment()[0]->status()->message() : null;
             $transaction->transaction_message_response = $response->status()->message();
             $transaction->save();
         DB::commit();
     }catch(Exception $e){
         DB::rollback();
     }
   }

}

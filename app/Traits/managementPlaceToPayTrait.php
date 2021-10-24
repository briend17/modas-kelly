<?php
namespace App\Traits;

trait managementPlaceToPayTrait {
     // if (function_exists('random_bytes')) {
        //     $nonce = bin2hex(random_bytes(16));
        // } elseif (function_exists('openssl_random_pseudo_bytes')) {
        //     $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        // } else {
        //     $nonce = mt_rand();
        // }

        // $nonceBase64 = base64_encode($nonce);

        // $seed = date('c');

        // $secretKey = '024h1IlD'; //De este parámetro tengo la duda si es el correcto

        // $tranKey = base64_encode(sha1($nonce . $seed  . $secretKey, true));


        // $data_api = [
        //     'login' => '6dd490faf9cb87a9862245da41170ff2', // Provided by PlacetoPay
        //     'tranKey' => $tranKey, // Provided by PlacetoPay
        //     'baseUrl' => 'https://test.placetopay.com/redirection/api/session',
        //     'seed' => $seed,
        //     'nonce' => $nonceBase64,
        //     'secret' => '024h1IlD'
        //     //'timeout' => 10, // (optional) 15 by default
        // ];
        // $placetopay = new PlacetoPay([
        //     'login' => '6dd490faf9cb87a9862245da41170ff2', // Provided by PlacetoPay
        //     'tranKey' => $tranKey, // Provided by PlacetoPay
        //     'baseUrl' => 'https://test.placetopay.com/redirection/api/session',
        //     'seed' => $seed,
        //     'nonce' => $nonceBase64,
        //     'secret' => '024h1IlD'
        //     //'timeout' => 10, // (optional) 15 by default
        // ]);
        // dd($data_api);
        // $reference = '1';
        // $request = [
        //     "payment" => [
        //         "reference" => $reference,
        //         "description" => "Testing payment",
        //         "amount" => [
        //             "currency" => "USD",
        //             "total" => 120,
        //         ],
        //     ],
        //     "expiration" => date("c", strtotime("+2 days")),
        //     "returnUrl" => "http://127.0.0.1:8000/orders/?order=" . $reference,
        //     "ipAddress" => "127.0.0.1",
        //     "userAgent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36",
        // ];

        // $response = $placetopay->request($request);
        // if ($response->isSuccessful()) {
        //     // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
        //     // Redirect the client to the processUrl or display it on the JS extension
        //     $response->processUrl();
        // } else {
        //     // There was some error so check the message and log it
        //     $response->status()->message();
        // }
        // dd($response);
}

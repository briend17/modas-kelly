<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-200">
        @php
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $document_type = Auth::user()->document_type;
            $document_number = Auth::user()->document_number;
            $mobile = Auth::user()->mobile;
        @endphp
        <div class="bg-yellow-500 w-full fixed top-0 px-6 py-4 h-20 sm:block">
            <h2 class="text-3xl md:text-5xl fixed text-white text-center w-full">Placetopay</h2>
        </div>
        <div class="mt-32 mx-auto w-10/12 md:w-1/2  h-auto bg-white rounded shadow-lg">
            <form method="POST" action="{{ route('transaction.index') }}">
                <!-- header -->
                <div class="px-4 py-3 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-600 w-full text-center">Datos de la compra</h2>
                </div>

                <!-- body -->
                <div class="w-full p-3">
                    @csrf
                    <!-- customer document type -->
                    <div>
                        <x-label for="document_type" :value="__('Tipo de documento')" />

                        <x-select id="document_type" class="block mt-1 w-full" name="customer_document_type" :value="$document_type" required />
                    </div>
                    <!-- customer document number -->
                    <div>
                        <x-label for="document_number" :value="__('Número de documento')" />

                        <x-input id="document_number" class="block mt-1 w-full" type="number" name="customer_document_number" :value="$document_number" required />
                    </div>
                    <!-- customer Name -->
                    <div>
                        <x-label for="name" :value="__('Nombre')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="customer_name" :value="$name" required />
                    </div>

                    <!-- customer mobile -->
                    <div class="mt-4">
                        <x-label for="order_mobile" :value="__('Total a pagar')" />
                        <strong class="font-medium text-md ml-3">
                            $89.000
                        </strong>
                    </div>
                </div>
                <!-- header -->
                <div class="px-4 py-3 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-600 w-full text-center">Seleccione medio de pago</h2>
                </div>

                <!-- body -->
                <div class="w-full p-3">
                    <!-- customer document type -->
                    <div class="flex justify-around">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="1" checked>
                            <span class="ml-2">Visa</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="2">
                            <span class="ml-2">Master card</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="3">
                            <span class="ml-2">Dinners club</span>
                        </label>
                    </div>
                    <!-- customer card number -->
                    <div>
                        <x-label for="card_number" :value="__('Número de tarjeta')" />

                        <x-input id="card_number" class="block mt-1 w-full" type="number" name="customer_card_number" required />
                    </div>
                    <!-- customer cvc -->
                    <div>
                        <x-label for="cvc" :value="__('CVC')" />

                        <x-input id="cvc" maxlength="3" minlength="3" pattern="^[0-9]{3}" title="Código numérico de 3 dígitos" class="block mt-1 w-full" type="text" name="customer_cvc"  required />
                    </div>

                    <!-- footer -->
                    <div class="bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">
                        Procesar el pago
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
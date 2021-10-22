<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedido ').$order->order_reference }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex-wrap items-top justify-center py-4 sm:pt-0" >
                    <h2 class="text-center font-bold text-xl">Resumen del pedido</h2>
                    <hr>
                    <table class="table-fixed">
                      <thead>
                        <tr>
                          <th class="w-1/2 text-left">Cliente</th>
                          <td class="w-1/4 text-left">{{ $order->customer_name }}</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="text-left">Documento identidad</th>
                          <td>{{ $order->customer_document_type }} - {{ $order->customer_document_number }}</td>
                        </tr>
                        <tr>
                          <th class="text-left">e-mail</th>
                          <td>{{ $order->customer_email }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">
                                Celular
                            </th>
                          <td>{{ $order->customer_mobile }}</td>
                        </tr>
                      </tbody>
                    </table>
                    <hr><br>
                    <div class="group w-1/2">
                        <div class="bg-gray-200 rounded-lg overflow-hidden ">
                          <img src="{{ asset('img/blusas.jpg') }}" alt="Person using a pen to cross a task off a productivity paper card." class="h-1/2 object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                          Blusa terciopelo, colección de otoño.
                        </h3>
                        <div class="flex justify-between items-center">
                            <p class="mt-1 text-lg font-medium text-gray-900">
                              $89.000
                            </p>
                        </div>
                      </div>
                      <hr><br>
                     <button type="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">Continuar con el pago
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
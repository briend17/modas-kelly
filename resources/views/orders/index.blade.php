<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de pedidos
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex-wrap items-top justify-center py-4 sm:pt-0" >
                    <!-- component -->
                    <section class="container mx-auto p-6 font-mono">
                      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                          <table class="w-4/5 mx-auto my-3">
                            <thead>
                              <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Fecha</th>
                                <th class="px-4 py-3">Referencia</th>
                                <th class="px-4 py-3">Monto</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Opciones</th>
                              </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($orders as $order)
                              <tr class="text-gray-700">
                                <td class="px-4 py-3 border">
                                  <div class="flex items-center text-sm">
                                    <div>
                                      <p class="font-semibold text-black">{{ $order->created_at->format('d-m-Y') }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                    {{ $order->order_reference }}
                                </td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                  $89.000
                                </td>
                                <td class="px-4 py-3 text-sm border">
                                    <span class="px-2 py-1 font-semibold leading-tight{{ $order->status_color }}rounded-sm"> {{ $order->status_display }} </span>
                                </td>
                                <td class="px-4 py-3 text-sm border">
                                    <a href="{{ route('orders.show',['order' => $order->id]) }}" class="bg-blue-500 hover:bg-blue-600 px-2   py-1 rounded text-white focus:outline-none">Ver pedido
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
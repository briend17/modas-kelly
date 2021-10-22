<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo de productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="relative flex items-top justify-center bg-gray-400 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="min-height: 50vh;">
                    <!-- component -->
                        <div class="bg-white">
                          <div class="max-w-2xl mx-auto py-1 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">

                            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                            @foreach(range(1, 3) as $product)
                              <a href="#" class="group">
                                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                  <img src="{{ asset('img/blusas.jpg') }}" alt="Person using a pen to cross a task off a productivity paper card." class="w-full h-full object-center object-cover group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">
                                  Blusa terciopelo, colección de otoño.
                                </h3>
                                <div class="flex justify-between items-center">
                                    <p class="mt-1 text-lg font-medium text-gray-900">
                                      $89.000
                                    </p>
                                    <div class="p-3">
                                        <button onclick="openModal(true)" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">
                                            Comprar
                                        </button>
                                    </div>
                                </div>
                              </a>
                              @endforeach
                              <!-- More products... -->
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal-order
        :title="__('Confirmar orden')"
        :name="Auth::user()->name"
        :email="Auth::user()->email"
        :document_number="Auth::user()->document_number"
    />
</x-app-layout>

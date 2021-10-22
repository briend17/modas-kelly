<!-- component -->
@props(['title','name','email','document_number'])
<!-- overlay -->
<div id="modal_overlay" class="hidden absolute inset-0 h-full w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

<!-- modal -->
<div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2  h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

    <!-- button close -->
    <button
    onclick="openModal(false)"
    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
    &cross;
    </button>

    <form method="POST" action="{{ route('orders.store') }}">
    <!-- header -->
    <div class="px-4 py-3 border-b border-gray-200">
    <h2 class="text-xl font-semibold text-gray-600">{{ $title }}</h2>
    </div>

    <!-- body -->
    <div class="w-full p-3">
        @csrf
        <!-- customer document type -->
        <div>
            <x-label for="document_type" :value="__('Tipo de documento')" />

            <x-select id="document_type" class="block mt-1 w-full" name="customer_document_type" required autofocus />
        </div>
        <!-- customer document number -->
        <div>
            <x-label for="document_number" :value="__('Número de documento')" />

            <x-input id="document_number" class="block mt-1 w-full" type="number" name="customer_document_number" :value="$document_number??''" required />
        </div>
        <!-- customer Name -->
        <div>
            <x-label for="name" :value="__('Nombre')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="customer_name" :value="$name" required />
        </div>

        <!-- customer  Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="customer_email" :value="$email" required />
        </div>
        <!-- customer mobile -->
        <div class="mt-4">
            <x-label for="order_mobile" :value="__('Número celular')" />

            <x-input id="order_mobile" class="block mt-1 w-full" type="tel" name="customer_mobile" required />
        </div>

    </div>

    <!-- footer -->
    <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
    <button type="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">    Guardar
    </button>
    <button
        onclick="openModal(false)"
        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">
        Cerrar
    </button>
    </div>
    </form>
</div>

</div>

<script>
const modal_overlay = document.querySelector('#modal_overlay');
const modal = document.querySelector('#modal');

function openModal (value){
    const modalCl = modal.classList
    const overlayCl = modal_overlay

    if(value){
    overlayCl.classList.remove('hidden')
    setTimeout(() => {
        modalCl.remove('opacity-0')
        modalCl.remove('-translate-y-full')
        modalCl.remove('scale-150')
    }, 100);
    } else {
    modalCl.add('-translate-y-full')
    setTimeout(() => {
        modalCl.add('opacity-0')
        modalCl.add('scale-150')
    }, 100);
    setTimeout(() => overlayCl.classList.add('hidden'), 300);
    }
}
</script>
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
    <body class="antialiased bg-pink-400">
      @if (Route::has('login'))
        <div class="fixed top-0 px-6 py-4 sm:block">
            <h2 class="text-3xl md:text-5xl fixed text-white">Modas Kelly</h2>
            <div class="fixed right-5">
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="text-md text-white dark:text-gray-500 hover:text-gray-300">Ingresar</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="md:inline-block hidden ml-4 text-md text-white hover:text-gray-300 dark:text-gray-500">Regístrate</a>
                    @endif
                @endif
            </div>
        </div>
      @endif
            <!-- component -->
      <section>
        <div class="text-white py-20">
          <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
            <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                <h1 class="text-3xl md:text-5xl p-2 text-yellow-300 tracking-loose">Viste a la moda</h1>
                <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">Los mejores estilos y diseños para ti.
                </h2>
                <p class="text-sm md:text-base text-gray-50 mb-4">Explore sus diseños favoritos, y disfrute de una gran experiencia.</p>
                <a href="{{ route('login') }}" class="bg-yellow-300 hover:bg-gray-500 text-black hover:text-yellow-300 rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent">
                    Ingresẹ ahora
                </a>
            </div>
            <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-50 ml-0 md:ml-12 lg:w-2/3  justify-center">
              <div class="h-48 flex flex-wrap content-center">
                <div class="flex justify-center items-center">
                    <img class="block top-10 mt-24 md:mt-0 p-8 md:p-0 rounded-3xl md:w-4/5"  src="{{ asset('img/portada.jpg') }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
</html>

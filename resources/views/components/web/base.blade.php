<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="container mx-auto px-4 py-6">

            @if (session('error'))
                <div class="border border-solid rounded-md bg-rose-500 ">
                    {{ session('error') }}
                </div>
            @endif

            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Технологии Яндекса</h1>
                    </div>

                    <div class="w-full mb-20 flex-col items-center text-center">
                        <a href="{{route('campaign-get')}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Все компании</a>
                        <a href="{{route('agens-clients-create')}}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Создать клиента</a>
                    </div>

                    <div class="flex flex-wrap -m-4">
                        <div class="pb-5 w-full ">
                            <div class="border border-gray-200 p-6 rounded-lg bg-slate-100">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
    </body>
</html>

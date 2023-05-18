<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:left-0 p-6">
                <x-application-logo />
            </div>

            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                <img class="w-full" alt="" src="{{ $product['data']['image'] }}" />
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="flex justify-between items-center">
                    <div class="border-b border-gray-200 pb-6">
                        <p class="text-sm leading-none text-gray-600 ">{{ $product['data']['brand'] }}</p>
                        <h1 class="text-3xl font-semibold lg:leading-6 leading-7 text-gray-800 mt-2">
                            {{ $product['data']['name'] }}</h1>
                    </div>
                    <a class="pt-1 pl-5 pb-1 pr-5 bg-gray-800 hover:bg-gray-700 rounded text-white"
                        href="{{ route('home') }}">Return</a>
                </div>
                <div>
                    <h2 class="mt-4 text-2xl">Specifications</h2>
                    <p class="text-base leading-4 mt-7 text-gray-600">OS: {{ $product['data']['os'] }}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">CPU: {{ $product['data']['cpu'] }}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">GPU: {{ $product['data']['gpu'] }}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Screen Size:
                        {{ $product['data']['screenSize'] }}"</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Resolution: {{ $product['data']['resolution'] }}
                    </p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Camera Megapixels:
                        {{ $product['data']['cameraMegapixels'] }} MP</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Camera Quality:
                        {{ $product['data']['cameraQuality'] }}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">RAM: {{ $product['data']['ram'] }} GB</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Internal Storage:
                        {{ $product['data']['internalStorage'] }} GB</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Battery Capacity:
                        {{ $product['data']['batteryCapacity'] }} mAh</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Sim Type: {{ $product['data']['simType'] }}</p>
                    <p class="text-base leading-4 mt-4 text-gray-600">Price:
                        {{ number_format($product['data']['price'], 2) }} €</p>
                </div>
                @if ($product['data']['hidden'] == false)
                    @auth
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product['data']['id'] }}" name="id">
                            <input type="hidden" value="{{ $product['data']['name'] }}" name="name">
                            <input type="hidden" value="{{ $product['data']['price'] }}" name="price">
                            <input type="hidden" value="{{ $product['data']['image'] }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button
                                class="rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 mt-5">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register') }}"
                            class="rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 mt-5">Register
                            to add product to cart</a>
                    @endauth
                @else
                    <button
                        class="rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 mt-5">
                        Product not available
                    </button>
                @endif
            </div>
        </div>
    </div>
</body>

</html>

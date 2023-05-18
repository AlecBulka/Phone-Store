<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        @foreach ($orders as $order)
            <div class="p-6 flex space-x-2 shadow-md mt-6 bg-white rounded-lg divide-y">
                <div class="flex-1">
                    <p class="text-lg text-gray-900">
                        Order Number: {{ $order->id }}
                    </p>
                    <p class="text-lg text-gray-900">
                        Order Date: {{ $order->updated_at->format('d-m-Y') }}
                    </p>
                    <p class="text-lg text-gray-900">
                        Products:
                    </p>
                    <div class="flex justify-evenly flex-wrap mb-5">
                        @for ($i = 0; $i < count($order->products); $i++)
                            @foreach ($products['data'] as $product)
                                @if ($product['id'] == $order->products[$i])
                                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                                        <img class="m-2 h-24 w-28 rounded-md border object-contain object-center"
                                            src="{{$product['image']}}"
                                            alt="" />
                                        <div class="flex w-full flex-col px-4 py-4">
                                            <span class="font-semibold">{{ $product['name'] }}</span>
                                            <span class="float-right text-gray-400">x{{ $order->quantities[$i] }}</span>
                                            <p class="text-lg font-bold">{{ number_format($product['price'], 2) }} €</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endfor

                    </div>
                    <p class="text-lg text-gray-900">
                        Total Cost: {{ number_format($order->totalCost, 2) }} €
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

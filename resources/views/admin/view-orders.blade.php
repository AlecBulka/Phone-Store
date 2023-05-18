<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Order Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Products Ordered
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Cost
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="bg-white hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $order->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $order->created_at->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ array_sum($order->quantities) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($order->totalCost, 2) }} €
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Brand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Internal Storage
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Hide/Display</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products['data'] as $product)
                        <tr class="bg-white hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product['brand'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product['internalStorage'] }} GB
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($product['price'], 2) }} €
                            </td>
                            @if ($product['hidden'] == false)
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('admin-hide-product', $product['id']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input class="font-medium text-blue-600 hover:underline cursor-pointer" type="submit"
                                            value="Hide">
                                    </form>
                                </td>
                            @else
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('admin-display-product', $product['id']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input class="font-medium text-blue-600 hover:underline cursor-pointer" type="submit"
                                            value="Display">
                                    </form>
                                </td>
                            @endif
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin-edit-product', $product['id']) }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin-delete-product', $product['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="font-medium text-red-600 hover:underline cursor-pointer"
                                        type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
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
                    @foreach ($users as $user)
                        <tr class="bg-white hover:bg-gray-50">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$user->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$user->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$user->role->role}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('admin-edit-user', $user)}}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{route('admin-delete-user', $user)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="font-medium text-red-600 hover:underline cursor-pointer" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

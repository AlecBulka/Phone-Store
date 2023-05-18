<x-app-layout>
    <section class="bg-white">
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Edit user</h2>
            <form action="{{ route('admin-update-user', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Name" required="" value="{{ $user->name }}">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Email" required="" value="{{ $user->email }}">
                    </div>
                    <div>
                        <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="role_id" name="role_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            @foreach ($roles as $role)
                                @if ($role->id == $user->role_id)
                                <option value="{{$role->id}}" selected="">{{$role->role}}</option>
                                @else
                                <option value="{{$role->id}}">{{$role->role}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg bg-gray-800 rounded-lg hover:bg-gray-600">
                    Update User
                </button>
            </form>
        </div>
    </section>

</x-app-layout>

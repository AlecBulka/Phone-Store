<x-app-layout>
    <section class="bg-white">
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new product</h2>
            <form action="{{ route('admin-store-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product name" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand</label>
                        <input type="text" name="brand" id="brand"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product brand" required="">
                    </div>
                    <div class="w-full">
                        <label for="os" class="block mb-2 text-sm font-medium text-gray-900">OS</label>
                        <input type="text" name="os" id="os"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product OS" required="">
                    </div>
                    <div class="w-full">
                        <label for="cpu" class="block mb-2 text-sm font-medium text-gray-900">CPU</label>
                        <input type="text" name="cpu" id="cpu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product CPU" required="">
                    </div>
                    <div class="w-full">
                        <label for="gpu" class="block mb-2 text-sm font-medium text-gray-900">GPU</label>
                        <input type="text" name="gpu" id="gpu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product GPU" required="">
                    </div>
                    <div class="w-full">
                        <label for="screenSize" class="block mb-2 text-sm font-medium text-gray-900">Screen Size</label>
                        <input type="number" name="screenSize" id="screenSize"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Screen Size" required="">
                    </div>
                    <div class="w-full">
                        <label for="resolution" class="block mb-2 text-sm font-medium text-gray-900">Resolution</label>
                        <input type="string" name="resolution" id="resolution"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Resolution" required="">
                    </div>
                    <div class="w-full">
                        <label for="cameraMegapixels" class="block mb-2 text-sm font-medium text-gray-900">Camera
                            Megapixels</label>
                        <input type="number" name="cameraMegapixels" id="cameraMegapixels"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Camera Megapixels" required="">
                    </div>
                    <div class="w-full">
                        <label for="cameraQuality" class="block mb-2 text-sm font-medium text-gray-900">Camera
                            Quality</label>
                        <input type="string" name="cameraQuality" id="cameraQuality"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Camera Quality" required="">
                    </div>
                    <div class="w-full">
                        <label for="ram" class="block mb-2 text-sm font-medium text-gray-900">RAM</label>
                        <input type="number" name="ram" id="ram"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product RAM" required="">
                    </div>
                    <div class="w-full">
                        <label for="internalStorage" class="block mb-2 text-sm font-medium text-gray-900">Internal
                            Storage</label>
                        <input type="number" name="internalStorage" id="internalStorage"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Internal Storage" required="">
                    </div>
                    <div class="w-full">
                        <label for="batteryCapacity" class="block mb-2 text-sm font-medium text-gray-900">Battery
                            Capacity</label>
                        <input type="number" name="batteryCapacity" id="batteryCapacity"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Battery Capacity" required="">
                    </div>
                    <div class="w-full">
                        <label for="simType" class="block mb-2 text-sm font-medium text-gray-900">SIM Type</label>
                        <input type="text" name="simType" id="simType"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product SIM Type" required="">
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Product Price" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900"
                            for="image">Image</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="image" name="image" type="file" required="">

                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg bg-gray-800 rounded-lg hover:bg-gray-600">
                    Add product
                </button>
            </form>
        </div>
    </section>

</x-app-layout>

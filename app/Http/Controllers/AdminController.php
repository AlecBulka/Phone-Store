<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class AdminController extends Controller
{

    public function viewProducts()
    {
        $products = Http::withToken(env('API_TOKEN'))
        ->get('https://phone-api.alecbulka.com/api/phones');
        return view('admin.view-products', [
            'products' => $products->json()
        ]);
    }

    public function createProduct()
    {
        return view('admin.create-product');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'os' => ['required', 'string'],
            'cpu' => ['required', 'string'],
            'gpu' => ['required', 'string'],
            'screenSize' => ['required', 'numeric'],
            'resolution' => ['required', 'string'],
            'cameraMegapixels' => ['required', 'integer'],
            'cameraQuality' => ['required', 'string'],
            'ram' => ['required', 'integer'],
            'internalStorage' => ['required', 'integer'],
            'batteryCapacity' => ['required', 'integer'],
            'simType' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:5120']
        ]);

        $image = $request->file('image');

        $multipart = [
            [
                'name' => 'name',
                'contents' => $request->name,
            ],
            [
                'name' => 'brand',
                'contents' => $request->brand,
            ],
            [
                'name' => 'os',
                'contents' => $request->os,
            ],
            [
                'name' => 'cpu',
                'contents' => $request->cpu,
            ],
            [
                'name' => 'gpu',
                'contents' => $request->gpu,
            ],
            [
                'name' => 'screenSize',
                'contents' => $request->screenSize,
            ],
            [
                'name' => 'resolution',
                'contents' => $request->resolution,
            ],
            [
                'name' => 'cameraMegapixels',
                'contents' => $request->cameraMegapixels,
            ],
            [
                'name' => 'cameraQuality',
                'contents' => $request->cameraQuality,
            ],
            [
                'name' => 'ram',
                'contents' => $request->ram,
            ],
            [
                'name' => 'internalStorage',
                'contents' => $request->internalStorage,
            ],
            [
                'name' => 'batteryCapacity',
                'contents' => $request->batteryCapacity,
            ],
            [
                'name' => 'simType',
                'contents' => $request->simType,
            ],
            [
                'name' => 'price',
                'contents' => $request->price,
            ],
            [
                'name'     => 'image',
                'contents' => file_get_contents($image),
                'filename' => $image->getClientOriginalName(),
            ]
        ];

        $body = [
            'headers' => [
                'Accept' => 'multipart/form-data',
                'Authorization' => 'Bearer ' . env('API_TOKEN'),
            ],
            'multipart' => $multipart,
        ];

       $client = new Client();

       $req = $client->request('POST', 'https://phone-api.alecbulka.com/api/phones', $body);

        return redirect(route('admin-view-products'));
    }

    public function editProduct(int $id)
    {
        $product = Http::withToken(env('API_TOKEN'))
        ->get('https://phone-api.alecbulka.com/api/phones/' . $id);
        return view('admin.edit-product', [
            'product' => $product->json()
        ]);
    }

    public function updateProduct(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => ['string'],
            'brand' => ['string'],
            'os' => ['string'],
            'cpu' => ['string'],
            'gpu' => ['string'],
            'screenSize' => ['numeric'],
            'resolution' => ['string'],
            'cameraMegapixels' => ['integer'],
            'cameraQuality' => ['string'],
            'ram' => ['integer'],
            'internalStorage' => ['integer'],
            'batteryCapacity' => ['integer'],
            'simType' => ['string'],
            'price' => ['numeric']
        ]);

        Http::withToken(env('API_TOKEN'))->put('https://phone-api.alecbulka.com/api/phones/' . $id, $validated);

        return redirect(route('admin-view-products'));
    }

    public function deleteProduct(int $id)
    {
        Http::withToken(env('API_TOKEN'))
        ->delete('https://phone-api.alecbulka.com/api/phones/' . $id);
        return redirect(route('admin-view-products'));
    }

    public function hideProduct(int $id)
    {
        Http::withToken(env('API_TOKEN'))
        ->put('https://phone-api.alecbulka.com/api/hide/' . $id);
        return redirect(route('admin-view-products'));
    }

    public function displayProduct(int $id)
    {
        Http::withToken(env('API_TOKEN'))
        ->put('https://phone-api.alecbulka.com/api/display/' . $id);
        return redirect(route('admin-view-products'));
    }

    public function viewUsers()
    {
        return view('admin.view-users', [
            'users' => User::all()
        ]);
    }

    public function createUser()
    {
        return view('admin.create-user', [
            'roles' => Role::all()
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:'.User::class],
            'password' => ['required'],
            'role_id' => ['required', 'integer']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        event(new Registered($user));

        return redirect(route('admin-view-users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['string'],
            'email' => ['email'],
            'role_id' => ['integer']
        ]);

        $user->update($validated);

        return redirect(route('admin-view-users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect(route('admin-view-users'));
    }

    public function viewOrders()
    {
        return view('admin.view-orders', [
            'orders' => Order::latest()->get()
        ]);
    }
}

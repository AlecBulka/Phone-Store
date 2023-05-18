<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $products = Http::withToken(env('API_TOKEN'))
        ->get('https://phone-api.alecbulka.com/api/phones');
        return view('home', [
            'products' => $products->json()
        ]);
    }

    public function show(int $id)
    {
        $product = Http::withToken(env('API_TOKEN'))
        ->get('https://phone-api.alecbulka.com/api/phones/' . $id);
        return view('product', [
            'product' => $product->json()
        ]);
    }
}

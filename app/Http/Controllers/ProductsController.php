<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/CreateView', [
            'status' => session(('status')),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->all();

        if ($request->image) {
            $path = $request->image->store('products');
        }

        $products = Product::create([
            'product_name' => $request['product_name'],
            'description' => $request['description'],
            'path_image' => $path
        ]);


        $products->save();

        return to_route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();

        return Inertia::render('Products/Edit', [
            'status' => session('status'),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('id',$id)->update([
            'product_name' => $request['product_name'],
            'description' => $request['description']
        ]);


        return to_route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->delete();

        return to_route('products.index');
    }
}

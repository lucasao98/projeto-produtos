<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Provider;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Providers/Index', [
            'providers' => Provider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Providers/CreateView', [
            'status' => session(('status')),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->all();

        $provider = Provider::create([
            'provider_name' => $request['provider_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'product_id' => $request['product_id']
        ]);


        $provider->save();

        return to_route('providers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $provider = Provider::where('id', $id)->first();

        return Inertia::render('Providers/Edit', [
            'status' => session('status'),
            'provider' => $provider,
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $provider = Provider::where('id',$id)->update([
            'provider_name' => $request['provider_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);


        return to_route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provider = Provider::where('id', $id)->delete();

        return to_route('providers.index');
    }
}

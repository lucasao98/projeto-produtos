<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $providers = DB::table('providers',)
        ->join('products','providers.product_id','=','products.id')->get();

        return Inertia::render('Dashboard', [
            'providers' => $providers
        ]);
    }
}

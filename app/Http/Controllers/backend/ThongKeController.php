<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductFeedback;
use App\Models\ProductService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $products = Product::where('status', 1)->get();
        $orders = Order::all();
        $services = ProductService::all();
        $feedbacks = ProductFeedback::all();
        $roleSpa = Role::where('name', 'ADMIN')->first();
        $spas = User::where('role_id', $roleSpa->id)->get();
        return view('backend/pages/thong-ke/index', compact(
            'users',
            'spas',
            'products',
            'orders',
            'services', 'feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        // Only admin can create/edit/delete
        $this->middleware(function ($request, $next) {
            $adminOnly = ['products.create','products.store','products.edit','products.update','products.destroy'];
            if (in_array($request->route()->getName(), $adminOnly) && Auth::user()->role !== 'admin') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|integer',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|integer',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query();

        $products = $products->latest()->paginate(20);
        return view('admin.products.all' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Product $product )
    {
       $Validdata =  $request->validate([
           'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'inventory' => 'required',

        ]);

       $product =  auth()->user()->products()->create($Validdata);

       return redirect(route('admin.products.index'));



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $Validdata =  $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'inventory' => 'required',

        ]);

       $product->update($Validdata);

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}

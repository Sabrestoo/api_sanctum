<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return mixed
     */
    public function show(Product $product)
    {
        return Product::find($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $product = Product::find($product->getKey());
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->getKey());
    }
    /**
     * Search for the specified resource from storage.
     *
     * @param string $searchTerm
     * @return \Illuminate\Http\Response
     */
    public function search($searchTerm)
    {
        return Product::where('name', 'like', '%' . $searchTerm . '%')->get();
    }

}


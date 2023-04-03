<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::orderBy('updated_at', 'desc')->get()->toArray();
    }

    public function store(Request $request)
    {
        $product = new Product([
            'id' => $request->input('id'),
            'type' => $request->input('types'),
            'model' => $request->input('model'),
            'brand' => $request->input('brand'),
            'capacity' => $request->input('capacity')
        ]);
        $product->save();
        return response()->json('Product created!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted!');
    }
}

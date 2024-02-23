<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a new product
        return view('admin.product.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'brand' => 'required|string',
            'color' => 'required|string',
            'origin' => 'required|string',
            'material' => 'required|string',
            'status' => 'required|string',
            'product_code' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'size' => 'required|string',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->Name_sneaker = $request->name;
        $product->Quantity = $request->quantity;
        $product->Brand = $request->brand;
        $product->Color = $request->color;
        $product->Origin = $request->origin;
        $product->Material = $request->material;
        $product->Status_Sneaker = $request->status;
        $product->Product_Code = $request->product_code;
        $product->Price = $request->price;
        $product->Size = $request->size;
        $product->save();

        // Redirect back with success message
        return back()->with('success', 'Product uploaded successfully.');
    }
}

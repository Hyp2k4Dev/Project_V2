<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Postimage;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }
    public function addImage()
    {
        // Return the view for creating a new product
        return view('admin.product.add_image');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully');
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->file('image')->getSize() > 2048 * 1024) {
            return redirect()->back()->with('error', 'Kích thước hình ảnh không được vượt quá 2MB.');
        }

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

        // Save the image to storage and get its path
        $imagePath = $request->file('image')->store('product_images');

        // Assign the image path to the product's Image attribute
        $product->Image = $imagePath;

        // Save the product
        $product->save();

        // Redirect back with success message
        return back()->with('success', 'Product uploaded successfully.');
    }


    public function viewImage()
    {
        $imageData = Postimage::all();
        return view('Image.view_image', compact('imageData'));
    }
}

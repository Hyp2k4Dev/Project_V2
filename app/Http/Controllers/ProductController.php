<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Size;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        dd($products);
        return view('admin.dashboard', compact('products'));
    }

    public function addImage()
    {
        return view('admin.product.add_image');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'Name_sneaker' => 'required|string',
            'Quantity' => 'required|integer',
            'Brand' => 'required|string',
            'Color' => 'required|string',
            'Origin' => 'required|string',
            'Material' => 'required|string',
            'Status_Sneaker' => 'required|string',
            'Price' => 'required|numeric',
            'Size' => 'required|string',
        ]);


        if ($request->filled('Product_Code')) {
            $validatedData['Product_Code'] = $request->input('Product_Code');
        }

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully');
    }



    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'like', "%$keyword%")->get();
        return view('search-results', compact('products'));
    }

    public function store(Request $request)
    {
        $productCode = 'HTH-' . $request->input('product_code');
        $request->merge(['product_code' => $productCode]);
        $request->validate([
            // Your validation rules here
        ]);

        // Store product image
        $destinationPath = 'public/product_images';
        $randomize = rand(111111, 999999);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $randomize . '.' . $extension;
        $imagePath = $request->file('image')->storeAs($destinationPath, $fileName);

        // Create new product
        $product = new Product();
        $product->Name_sneaker = $request->name;
        $product->Description = $request->description;
        $product->Quantity = $request->quantity;
        $product->Brand = $request->brand;
        $product->Color = $request->color;
        $product->Origin = $request->origin;
        $product->Material = $request->material;
        $product->Status_Sneaker = $request->status;
        $product->Product_Code = $request->product_code;
        $product->Price = $request->price;
        $product->Size = $request->size;
        $product->Image = Storage::url("$destinationPath/$fileName");
        $product->save();

        // Create size entry for the product
        $size = new Size();
        $size->product_id = $product->id;
        $size->product_code = $product->Product_Code;
        $size->size_name = $request->size;
        $size->quantity = $request->quantity;
        $size->save();

        return back()->with('success', 'Product uploaded successfully.');
    }

    public function viewImage()
    {
        $imageData = Postimage::all();
        return view('Image.view_image', compact('imageData'));
    }
}

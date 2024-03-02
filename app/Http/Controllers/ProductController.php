<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'brand' => 'required|string',
            'color' => 'required|string',
            'origin' => 'required|string',
            'material' => 'required|string',
            'status' => 'required|string',
            'product_code' => 'required|string|unique:products',
            'price' => 'required|numeric|min:0',
            'size' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $existingProduct = Product::where('Size', $request->size)->first();
        if ($existingProduct) {
            return back()->with('error', 'Sản phẩm có cùng kích cỡ đã tồn tại.');
        }

        if ($request->file('image')->getSize() > 2048 * 1024) {
            return redirect()->back()->with('error', 'Kích thước hình ảnh không được vượt quá 2MB.');
        }

        // Kiểm tra các thông tin trừ tên sản phẩm có trùng lặp không
        $duplicatedFields = [
            'Brand' => $request->brand,
            'Color' => $request->color,
            'Origin' => $request->origin,
            'Material' => $request->material,
            'Status_Sneaker' => $request->status,
            'Price' => $request->price,
            'Size' => $request->size,
        ];

        foreach ($duplicatedFields as $field => $value) {
            $existingProduct = Product::where($field, $value)->first();
            if ($existingProduct) {
                return back()->with('error', "Thông tin '$field' đã tồn tại cho sản phẩm khác.");
            }
        }

        $destinationPath = 'public/product_images';
        $randomize = rand(111111, 999999);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $randomize . '.' . $extension;
        $imagePath = $request->file('image')->storeAs($destinationPath, $fileName);

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
        $product->Image = Storage::url("$destinationPath/$fileName");
        $product->save();

        return back()->with('success', 'Product uploaded successfully.');
    }

    public function viewImage()
    {
        $imageData = Postimage::all();
        return view('Image.view_image', compact('imageData'));
    }
}

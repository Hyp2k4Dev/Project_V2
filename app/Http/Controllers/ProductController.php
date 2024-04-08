<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::with('sizes')->get();
        return view('admin.dashboard', compact('products', 'user'));
    }

    public function addImage()
    {
        $user = Auth::user();

        return view('admin.product.addProduct', compact('user'));
    }
    public function productList()
    {
        $user = Auth::user();
        $product = Product::get();
        return view('admin.productList', compact('product', 'user'));
    }
    public function info($id)
    {
        $user = Auth::user();
        $product = Product::with('sizes')->findOrFail($id);
        return view('admin.product.infoProduct', compact('product', 'user'));
    }
    public function edit($id)
    {
        $user = Auth::user();
        $product = Product::with('sizes')->findOrFail($id);
        return view('admin.product.edit', compact('product', 'user'));
    }


    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'Name_sneaker' => 'required|string',
        //     'Brand' => 'required|string',
        //     'Color' => 'required|string',
        //     'Origin' => 'required|string',
        //     'Material' => 'required|string',
        //     'Status_Sneaker' => 'required|string',
        //     'Product_Code' => 'required|string',
        //     'Price' => 'required|numeric|min:0',
        //     'Image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'sizes.*.size' => 'required|string',
        //     'sizes.*.quantity' => 'required|numeric|min:0',
        // ]);

        $product = Product::findOrFail($id);
        $product->Name_sneaker = $request->input('Name_sneaker');
        $product->Description = $request->input('Description');
        $product->Brand = $request->input('Brand');
        $product->Color = $request->input('Color');
        $product->Origin = $request->input('Origin');
        $product->Material = $request->input('Material');
        $product->Status_Sneaker = $request->input('Status_Sneaker');
        $product->Price = $request->input('Price');
        $destinationPath = 'product_images';

        if ($request->hasFile('Image')) {
            if ($product->Image) {
                $oldImagePath = str_replace('/storage/', '', $product->Image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $image = $request->file('Image');
            $imageName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();

            $randomize = rand(111111, 999999);
            $imageName = $randomize . '.' . $extension;

            while (Storage::disk('public')->exists($destinationPath . '/' . $imageName)) {
                $randomize = rand(111111, 999999);
                $imageName = $randomize . '.' . $extension;
            }

            $imagePath = $image->storeAs($destinationPath, $imageName, 'public');
            $product->Image = '/storage/' . $imagePath;
        }

        $product->save();

        $sizes = $request->input('sizes', []);

        $currentSizes = $product->sizes->pluck('size_name')->toArray();

        foreach ($sizes as $sizeData) {
            $sizeName = $sizeData['size'];
            $quantity = $sizeData['quantity'];

            $size = Size::where('product_id', $product->id)
                ->where('size_name', $sizeName)
                ->first();

            if (!$size) {
                $size = new Size([
                    'size_name' => $sizeName,
                    'quantity' => $quantity,
                    'product_id' => $product->id,
                ]);
            } else {
                $size->quantity = $quantity;
            }

            $size->save();

            if (($key = array_search($sizeName, $currentSizes)) !== false) {
                unset($currentSizes[$key]);
            }
        }

        foreach ($currentSizes as $sizeName) {
            $sizeToDelete = Size::where('product_id', $product->id)
                ->where('size_name', $sizeName)
                ->delete();
        }
        return redirect("/admin/dashboard")->with('success', 'Successfully updated the product.');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'brand' => 'required|string',
            'color' => 'required|string',
            'origin' => 'required|string',
            'material' => 'required|string',
            'status' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sizes.*.size' => 'required|string',
            'sizes.*.quantity' => 'required|numeric|min:1',
        ]);


        $destinationPath = 'public/product_images';
        $randomize = rand(111111, 999999);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $randomize . '.' . $extension;

        do {
            $productCode = 'HTH-' . mt_rand(1000, 999999);
        } while (Product::where('Product_Code', $productCode)->exists());

        $product = new Product();
        $product->Name_sneaker = $request->name;
        $product->Description = $request->description;
        $product->Brand = $request->brand;
        $product->Color = $request->color;
        $product->Origin = $request->origin;
        $product->Material = $request->material;
        $product->Status_Sneaker = $request->status;
        $product->Product_Code = $productCode;
        $product->Price = $request->price;
        $request->file('image')->storeAs($destinationPath, $fileName);
        $product->Image = Storage::url("$destinationPath/$fileName");

        $product->save();

        $product_id = $product->id;
        $sizes = $request->input('sizes', []);
        if (!is_array($sizes)) {
            $sizes = [$sizes];
        }
        $sizeQuantities = [];

        foreach ($sizes as $sizeData) {
            $size = $sizeData['size'];
            $quantity = $sizeData['quantity'];

            if (!isset($sizeQuantities[$size])) {
                $sizeQuantities[$size] = 0;
            }

            $sizeQuantities[$size] += $quantity;
        }
        foreach ($sizeQuantities as $size => $quantity) {
            $sizeModel = new Size([
                'size_name' => $size,
                'quantity' => $quantity,
                'product_id' => $product_id,
            ]);

            $sizeModel->save();
        }

        return redirect("/admin/product/add-product")->with('success', 'Product uploaded successfully.');
    }


    public function viewImage()
    {
        $imageData = Postimage::all();
        return view('Image.view_image', compact('imageData'));
    }

    public function getProducts()
    {
        return Product::all();
    }

    public function showProductDetails($id)
    {
        $productDetails = Product::with('sizes')->findOrFail($id);

        return view('frontend.productdetails', compact('productDetails'));
    }
}

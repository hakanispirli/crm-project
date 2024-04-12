<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Products()
    {
        return view('product.all_product');
    }

    public function AddProducts()
    {
        return view('product.add_product');
    }

    public function GetProduct()
    {
        $product = Product::with('brand')->get();
        return response()->json(['success' => true, 'product' => $product]);
    }

    public function EditProduct($id)
    {
        $brand = Brand::all();
        $product = Product::find($id);
        return view('product.edit_product', compact('product','brand'));
    }

    public function StoreProduct(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'stock' => 'required|max:10',
            'price' => 'required|max:10',
            'description' => 'max:255',
        ];

        $request->validate($rules);

        Product::insert([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Ürün Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('products')->with($notification);
    }

    public function StoreBrand(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = new Brand();
        $brand->name = $validatedData['name'];
        $brand->save();

        return response()->json(['success' => true, 'message' => 'Marka başarıyla eklendi']);
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;

        Product::find($product_id)->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Ürün Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('products')->with($notification);

    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        $notification = array(
            'message' => 'Ürün Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('products')->with($notification);
    }
}

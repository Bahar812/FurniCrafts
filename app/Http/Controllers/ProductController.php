<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function loadAllProduct(){
        $all_product = Product::orderBy('created_at', 'desc')->paginate();

        return  view('admin.pageProduct',  compact('all_product'));
    }

    public function loadAddProduct(){
        $categories = Category::get();
        return view('admin.addProduct', compact('categories'));
    }

    public function addProduct(Request $request){
        $request->validate([
            'Nama_Product' => 'required|string|max:255',
            'Price' => 'required|numeric',
            'Description' => 'required|string',
            'Stock' => 'required|integer',
            'CategoryID' => 'required|integer|exists:category,id',
            'Img_Detail_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Img_Detail_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Img_Detail_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->Nama_Product = $request->Nama_Product;
        $product->Price = $request->Price;
        $product->Description = $request->Description;
        $product->Stock = $request->Stock;
        $product->CategoryID = $request->CategoryID;
        $product->ItemID = (string) Str::uuid();  // Generate UUID

        if ($request->hasFile('Img_Detail_1')) {
            $imagePath1 = $request->file('Img_Detail_1')->store('images', 'public');
            $product->Img_Detail_1 = 'storage/' . $imagePath1;
        }

        if ($request->hasFile('Img_Detail_2')) {
            $imagePath2 = $request->file('Img_Detail_2')->store('images', 'public');
            $product->Img_Detail_2 = 'storage/' . $imagePath2;
        }

        if ($request->hasFile('Img_Detail_3')) {
            $imagePath3 = $request->file('Img_Detail_3')->store('images', 'public');
            $product->Img_Detail_3 = 'storage/' . $imagePath3;
        }

        $product->save();

        return redirect()->Route('LoadProduct')->with('success', 'Product added successfully');
    }

    public function deleteProduct($id) {

        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('LoadProduct')->with('success', 'Product deleted successfully');
        }
        return redirect()->route('LoadProduct')->with('error', 'Product not found');
    }


    public function loadEditForm($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.editProduct', compact('product', 'categories'));
    }

    public function EditProduct(Request $request) {

        $request->validate([
            'Nama_Product' => 'required|string|max:255',
            'Price' => 'required|numeric',
            'Description' => 'required|string',
            'Stock' => 'required|integer',
            'CategoryID' => 'required|integer|exists:category,id',
            'Img_Detail_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Img_Detail_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Img_Detail_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::where('ItemID', $request->product_id);
        // dd($product);


    // Mengumpulkan data dari request ke dalam array
    $data = [
        'Nama_Product' => $request->Nama_Product,
        'Price' => $request->Price,
        'Description' => $request->Description,
        'Stock' => $request->Stock,
        'CategoryID' => $request->CategoryID,
    ];

    // Memproses gambar jika ada dalam request
    if ($request->hasFile('Img_Detail_1')) {
        if ($product->Img_Detail_1 && !filter_var($product->Img_Detail_1, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($product->Img_Detail_1);
        }
        $imagePath1 = $request->file('Img_Detail_1')->store('images', 'public');
        $data['Img_Detail_1'] = 'storage/' . $imagePath1;
    }

    if ($request->hasFile('Img_Detail_2')) {
        if ($product->Img_Detail_2 && !filter_var($product->Img_Detail_2, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($product->Img_Detail_2);
        }
        $imagePath2 = $request->file('Img_Detail_2')->store('images', 'public');
        $data['Img_Detail_2'] = 'storage/' . $imagePath2;
    }

    if ($request->hasFile('Img_Detail_3')) {
        if ($product->Img_Detail_3 && !filter_var($product->Img_Detail_3, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($product->Img_Detail_3);
        }
        $imagePath3 = $request->file('Img_Detail_3')->store('images', 'public');
        $data['Img_Detail_3'] = 'storage/' . $imagePath3;
    }

    // Memperbarui data produk dengan data yang telah dikumpulkan
    $product->update($data);


        // $product->save();

        return redirect()->route('LoadProduct')->with('success', 'Product updated successfully');
    }
}

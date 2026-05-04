<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'type')->latest()->paginate(10);
        $categories = Category::all();
        $types = Type::all();

        return view('admin.products.index', compact('products', 'categories', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'nullable|string',
            'cat_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
            'img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'img_1', 'img_2', 'img_3']);
        $data['is_active'] = $request->has('is_active');

        // رفع الصور
        if ($request->hasFile('img_1')) {
            $data['img_1'] = $request->file('img_1')->store('products', 'public');
        }
        if ($request->hasFile('img_2')) {
            $data['img_2'] = $request->file('img_2')->store('products', 'public');
        }
        if ($request->hasFile('img_3')) {
            $data['img_3'] = $request->file('img_3')->store('products', 'public');
        }

        Product::create($data);

        return back()->with('status', 'تم إضافة المنتج بنجاح');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
        ]);

        $data = $request->except(['_token', '_method', 'img_1', 'img_2', 'img_3']);
        $data['is_active'] = $request->has('is_active');

        foreach (['img_1', 'img_2', 'img_3'] as $imgField) {
            if ($request->hasFile($imgField)) {
                if ($product->$imgField) Storage::disk('public')->delete($product->$imgField);
                $data[$imgField] = $request->file($imgField)->store('products', 'public');
            }
        }

        $product->update($data);

        return back()->with('status', 'تم تحديث المنتج بنجاح');
    }

    public function destroy(Product $product)
    {
        // حذف الصور من التخزين
        if ($product->img_1) Storage::disk('public')->delete($product->img_1);
        if ($product->img_2) Storage::disk('public')->delete($product->img_2);
        if ($product->img_3) Storage::disk('public')->delete($product->img_3);

        $product->delete();

        return back()->with('status', 'تم حذف المنتج بنجاح');
    }
}

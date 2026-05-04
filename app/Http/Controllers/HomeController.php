<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $properties = Property::latest()->get();
        $types = Type::latest()->get();

        $products = Product::with(['type', 'category'])
            ->where('is_active', 1)
            ->latest()
            ->paginate(12);
        return view('welcome', compact('products', 'categories', 'properties', 'types'));
    }
}

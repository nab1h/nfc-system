<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvoraMail;
use App\Models\Category;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $properties = Property::latest()->get();
        $types = Type::with('properties')->latest()->get();

        return view('admin.settings.index', compact('categories', 'properties', 'types'));
    }

    // --- Category CRUD ---
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->only('name'));
        return back()->with('status', 'تم إضافة التصنيف بنجاح');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->only('name'));
        return back()->with('status', 'تم تحديث التصنيف');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();
        return back()->with('status', 'تم حذف التصنيف');
    }

    // --- Property CRUD ---
    public function storeProperty(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Property::create($request->only('name'));
        return back()->with('status', 'تم إضافة الخاصية بنجاح');
    }

    public function updateProperty(Request $request, Property $property)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $property->update($request->only('name'));
        return back()->with('status', 'تم تحديث الخاصية');
    }

    public function destroyProperty(Property $property)
    {
        $property->delete();
        return back()->with('status', 'تم حذف الخاصية');
    }

    // --- Type (Pack) CRUD ---
    public function storeType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'properties' => 'nullable|array',
            'properties.*' => 'exists:properties,id'
        ]);

        $type = Type::create($request->only('name'));

        if ($request->has('properties')) {
            $type->properties()->attach($request->properties);
        }

        return back()->with('status', 'تم إضافة الباقة وربط الخصائص بنجاح');
    }

    public function updateType(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'properties' => 'nullable|array',
            'properties.*' => 'exists:properties,id'
        ]);

        $type->update($request->only('name'));

        $type->properties()->sync($request->properties ?? []);

        return back()->with('status', 'تم تحديث الباقة');
    }

    public function destroyType(Type $type)
    {
        $type->delete();
        return back()->with('status', 'تم حذف الباقة');
    }
}

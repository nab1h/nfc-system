<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::latest()->get();
        return view('admin.platforms.index', compact('platforms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:platforms,name',
            'is_active' => 'nullable|boolean'
        ]);

        Platform::create([
            'name' => $request->name,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->back()->with('status', 'تمت إضافة المنصة بنجاح');
    }

    public function update(Request $request, $id)
    {
        $platform = Platform::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:platforms,name,' . $id,
            'is_active' => 'nullable'
        ]);

        $platform->update([
            'name' => $request->name,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->back()->with('status', 'تم تحديث المنصة بنجاح');
    }

    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        return redirect()->back()->with('status', 'تم حذف المنصة بنجاح');
    }
}

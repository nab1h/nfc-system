<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThemeController extends Controller
{

    public function index()
    {
        $themes = Theme::latest()->get();
        return view('admin.themes.index', compact('themes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'theme' => 'required|string|max:255|unique:themes,theme',
            'img'   => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('themes', 'public');
        }

        Theme::create([
            'theme' => $request->theme,
            'img'  => $imgPath,
        ]);

        return redirect()->back()->with('status', 'تم إضافة الثيم بنجاح!');
    }

    public function update(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);

        $request->validate([
            'theme' => 'required|string|max:255|unique:themes,theme,' . $id,
            'img'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('img')) {
            if ($theme->img) {
                Storage::disk('public')->delete($theme->img);
            }
            $imgPath = $request->file('img')->store('themes', 'public');
            $theme->img = $imgPath;
        }

        $theme->theme = $request->theme;
        $theme->save();

        return redirect()->back()->with('status', 'تم تحديث الثيم بنجاح!');
    }

    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);

        if ($theme->img) {
            Storage::disk('public')->delete($theme->img);
        }

        $theme->delete();

        return redirect()->back()->with('status', 'تم حذف الثيم بنجاح!');
    }
}

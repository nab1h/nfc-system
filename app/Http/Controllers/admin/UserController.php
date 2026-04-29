<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $totalClients = User::where('is_count', 1)->count();

        $activeCards = User::where('is_active', 1)
            ->where('has_card', 1)
            ->where('is_count', 1)
            ->count();

        $disabledCards = User::where('is_active', 0)
            ->where('has_card', 1)
            ->where('is_count', 1)
            ->count();

        $notStarted = User::where('is_started', 0)
            ->where('is_count', 1)
            ->count();

        $noCard = User::where('has_card', 0)
            ->where('is_count', 1)
            ->count();

        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact(
            'users',
            'totalClients',
            'activeCards',
            'disabledCards',
            'notStarted',
            'noCard'
        ));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'job' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'role' => 'required|in:user,admin,agent',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // جمع البيانات
        $data = $request->except('password', 'password_confirmation', 'img', 'img_cover', '_token');

        // تشفير كلمة المرور
        $data['password'] = Hash::make($request->password);

        $data['is_active'] = $request->boolean('is_active');
        $data['is_count'] = $request->boolean('is_count');
        $data['has_card'] = $request->boolean('has_card');
        $data['is_started'] = $request->boolean('is_started');

        // رفع الصورة الشخصية
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('users/profile', 'public');
        }

        // رفع صورة الغلاف
        if ($request->hasFile('img_cover')) {
            $data['img_cover'] = $request->file('img_cover')->store('users/covers', 'public');
        }

        // إنشاء المستخدم
        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('password', 'img', 'img_cover', '_token', '_method');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('img')) {
            if ($user->img) Storage::disk('public')->delete($user->img);
            $data['img'] = $request->file('img')->store('users/profile', 'public');
        }

        if ($request->hasFile('img_cover')) {
            if ($user->img_cover) Storage::disk('public')->delete($user->img_cover);
            $data['img_cover'] = $request->file('img_cover')->store('users/covers', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        $data['is_count'] = $request->has('is_count');
        $data['is_started'] = $request->has('is_started');
        $data['has_card'] = $request->has('has_card');

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

    public function toggleStatus(User $user)
    {
        $user->update([
            'is_active' => !$user->is_active
        ]);

        return back()->with('success', 'تم تغيير الحالة بنجاح');
    }


    public function destroy(User $user)
    {
        if ($user->img) Storage::disk('public')->delete($user->img);
        if ($user->img_cover) Storage::disk('public')->delete($user->img_cover);

        $user->delete();

        return back()->with('success', 'تم الحذف بنجاح');
    }
}

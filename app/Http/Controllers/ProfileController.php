<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Platform;
use App\Models\SocialLink;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index(Request $request): View
    {
        /** @var User $user */
        $user = Auth::user();

        $platforms = Platform::where('is_active', 1)->get();
        $themes = Theme::all();

        $userLinks = $user->socialLinks->pluck('url', 'platform_id');

        return view('dashboard', compact('user', 'platforms', 'themes', 'userLinks'));
    }


    public function updateData(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'theme_id' => 'nullable|exists:themes,id',
        ]);

        $user->update($request->only(['name', 'job', 'bio', 'phone', 'whatsapp', 'email', 'theme_id']));

        if ($request->hasFile('img')) {
            if ($user->img) Storage::disk('public')->delete($user->img);
            $user->img = $request->file('img')->store('users/profile', 'public');
            $user->save();
        }

        if ($request->hasFile('img_cover')) {
            if ($user->img_cover) Storage::disk('public')->delete($user->img_cover);
            $user->img_cover = $request->file('img_cover')->store('users/covers', 'public');
            $user->save();
        }

        if ($request->has('social_links')) {
            foreach ($request->social_links as $platformId => $url) {
                $url = trim($url);
                if (!empty($url)) {
                    SocialLink::updateOrCreate(
                        ['user_id' => $user->id, 'platform_id' => $platformId],
                        ['url' => $url]
                    );
                } else {
                    SocialLink::where('user_id', $user->id)
                        ->where('platform_id', $platformId)
                        ->delete();
                }
            }
        }

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),

        ]);
    }
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        /** @var User $user */
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function show($theme_id, $slug)
    {
        // جلب المستخدم
        $user = User::where('slug', $slug)
            ->with(['socialLinks.platform'])
            ->firstOrFail();

        // تصحيح الرابط إذا كان رقم الثيم مختلفاً
        if ($user->theme_id != $theme_id) {
            return redirect()->route('profile.show', [$user->theme_id, $user->slug]);
        }

        // --- الشرط الجديد ---
        // إذا كان الحساب غير مفعل أو لا يملك كارت، نعرض صفحة الدعم الفني
        if (!$user->is_active || !$user->has_card) {
            // يمكنك تمرير اسم المستخدم لإظهاره في صفحة الدعم (اختياري)
            return view('support.inactive', ['name' => $user->name]);
        }

        // إذا كانت الحالة سليمة، نعرض البطاقة
        return view('profile.show', compact('user'));
    }


    public function downloadVcard($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $vcard = "BEGIN:VCARD\r\n";
        $vcard .= "VERSION:3.0\r\n";
        $vcard .= "FN:{$user->name}\r\n";
        if ($user->job) $vcard .= "TITLE:{$user->job}\r\n";
        if ($user->phone) $vcard .= "TEL:{$user->phone}\r\n";
        if ($user->email) $vcard .= "EMAIL:{$user->email}\r\n";
        if ($user->whatsapp) $vcard .= "TEL;TYPE=WHATSAPP:{$user->whatsapp}\r\n";
        $vcard .= "END:VCARD\r\n";

        return response($vcard)
            ->header('Content-Type', 'text/vcard')
            ->header('Content-Disposition', 'attachment; filename="' . $user->slug . '.vcf"');
    }
}

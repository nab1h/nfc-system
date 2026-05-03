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

                    $platform = Platform::find($platformId);

                    // 🔥 WhatsApp fix
                    if ($platform && $platform->name == 'WhatsApp') {
                        $number = preg_replace('/[^0-9]/', '', $url);

                        // لو الرقم مصري ويبدأ بـ 01
                        if (str_starts_with($number, '01')) {
                            $number = '2' . $number;
                        }

                        $url = 'https://wa.me/' . $number;
                    }

                    if ($platform && $platform->name == 'Email') {
                        $url = 'mailto:' . $url;
                    }

                    if ($platform && $platform->name == 'Website') {
                        if (!str_starts_with($url, 'http')) {
                            $url = 'https://' . $url;
                        }
                    }

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
        $user = User::where('slug', $slug)
            ->with(['socialLinks.platform'])
            ->firstOrFail();

        if ($user->theme_id != $theme_id) {
            return redirect()->route('profile.show', [$user->theme_id, $user->slug]);
        }

        if (!$user->is_active || !$user->has_card) {
            return view('support.inactive', ['name' => $user->name]);
        }

        switch ($user->theme_id) {
            case 2:
                return view('profile.themes.dark', compact('user'));
            case 3:
                return view('profile.themes.light', compact('user'));
            case 4:
                return view('profile.themes.medical', compact('user'));
            case 5:
                return view('profile.themes.photographer', compact('user'));
            case 6:
                return view('profile.themes.designer', compact('user'));
            case 7:
                return view('profile.themes.physio', compact('user'));
            case 8:
                return view('profile.themes.store', compact('user'));
            case 9:
                return view('profile.themes.sales', compact('user'));
            case 10:
                return view('profile.themes.corporate', compact('user'));
            case 11:
                return view('profile.themes.accountant', compact('user'));
            case 12:
                return view('profile.themes.coach', compact('user'));
            case 13:
                return view('profile.themes.marketing', compact('user'));

            default:
                return view('profile.themes.dark', compact('user'));
        }
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

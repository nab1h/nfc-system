<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Profile Card') }}
        </h2>
    </x-slot>

    <!-- Form Tag Wrapper -->
    <form action="{{ route('profile.update.data') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <!-- 1. Profile Header Section -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">المعلومات الأساسية</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Profile Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">الصورة الشخصية</label>
                            <div class="flex items-center gap-4">
                                <img src="{{ $user->img ? asset('storage/' . $user->img) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=E60914&color=fff' }}"
                                    class="w-16 h-16 rounded-full object-cover border-2 border-[#1a1a1a]">
                                <input type="file" name="img" class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#E60914]/10 file:text-[#E60914] hover:file:bg-[#E60914]/20 cursor-pointer">
                            </div>
                        </div>

                        <!-- Cover Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">صورة الغلاف</label>
                            @if($user->img_cover)
                            <img src="{{ $user->img_cover ? asset('storage/' . $user->img_cover) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=E60914&color=fff' }}"
                                class="w-36 h-16  object-cover border-2 border-[#1a1a1a]">
                            @endif
                            <input type="file" name="img_cover" class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#E60914]/10 file:text-[#E60914] hover:file:bg-[#E60914]/20 cursor-pointer">

                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">الاسم الكامل</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">المسمى الوظيفي</label>
                            <input type="text" name="job" value="{{ old('job', $user->job) }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-300 mb-2">البايو (نبذة)</label>
                        <textarea name="bio" rows="3" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition resize-none">{{ old('bio', $user->bio) }}</textarea>
                    </div>
                </div>

                <!-- 2. Contact Info Section -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">معلومات الاتصال</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">رقم الهاتف</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">رقم الواتساب</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-300 mb-2">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>
                    </div>
                </div>

                <!-- 3. Social Media Section (Dynamic) -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">حسابات التواصل الاجتماعي</h3>

                    <div class="space-y-4">
                        @foreach($platforms as $platform)
                        <div class="flex items-center gap-4 p-3 bg-[#0a0a0a] rounded-lg border border-[#1a1a1a]">

                            <div class="w-6 h-6 flex-shrink-0 flex items-center justify-center">

                                @if($platform->name == 'Instagram')
                                <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.35 3.608 1.325.975.975 1.263 2.242 1.325 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.35 2.633-1.325 3.608-.975.975-2.242 1.263-3.608 1.325-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.35-3.608-1.325-.975-.975-1.263-2.242-1.325-3.608C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.062-1.366.35-2.633 1.325-3.608C4.533 2.567 5.8 2.279 7.166 2.217 8.432 2.159 8.812 2.147 12 2.147zm0 1.838c-3.14 0-3.508.012-4.746.068-1.145.052-1.963.24-2.42.698-.458.457-.646 1.275-.698 2.42-.056 1.238-.068 1.606-.068 4.746s.012 3.508.068 4.746c.052 1.145.24 1.963.698 2.42.457.458 1.275.646 2.42.698 1.238.056 1.606.068 4.746.068s3.508-.012 4.746-.068c1.145-.052 1.963-.24 2.42-.698.458-.457.646-1.275.698-2.42.056-1.238.068-1.606.068-4.746s-.012-3.508-.068-4.746c-.052-1.145-.24-1.963-.698-2.42-.457-.458-1.275-.646-2.42-.698-1.238-.056-1.606-.068-4.746-.068zm0 3.163a4.837 4.837 0 110 9.674 4.837 4.837 0 010-9.674zm0 1.838a2.999 2.999 0 100 5.998 2.999 2.999 0 000-5.998zm4.965-2.29a1.12 1.12 0 110 2.24 1.12 1.12 0 010-2.24z" />
                                </svg>

                                @elseif($platform->name == 'Facebook')
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12a10 10 0 10-11.5 9.9v-7h-2.8v-2.9h2.8V9.5c0-2.8 1.7-4.4 4.2-4.4 1.2 0 2.5.2 2.5.2v2.7h-1.4c-1.4 0-1.8.9-1.8 1.7v2h3.1l-.5 2.9h-2.6v7A10 10 0 0022 12z" />
                                </svg>

                                @elseif($platform->name == 'Twitter')
                                <svg class="w-6 h-6 text-sky-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 5.9c-.7.3-1.5.5-2.3.6.8-.5 1.4-1.2 1.7-2.1-.8.5-1.7.8-2.6 1-1.5-1.6-4-1.6-5.5 0-1 1.1-1.3 2.6-.8 4-3.3-.2-6.3-1.8-8.3-4.4-1.1 1.9-.5 4.3 1.3 5.6-.6 0-1.2-.2-1.7-.5 0 2 1.4 3.7 3.4 4.1-.5.1-1 .2-1.5.1.4 1.7 2 2.9 3.8 3-1.4 1.1-3.2 1.7-5 1.7H2c1.8 1.2 4 1.9 6.3 1.9 7.5 0 11.7-6.2 11.7-11.6v-.5c.8-.6 1.5-1.3 2-2.1z" />
                                </svg>

                                @elseif($platform->name == 'LinkedIn')
                                <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5 2.5 2.5 0 01.02-5zM3 8.98h4v12H3v-12zM9 8.98h3.8v1.6h.1c.5-.9 1.8-1.8 3.7-1.8 4 0 4.7 2.6 4.7 6v6.2h-4v-5.5c0-1.3 0-3-1.9-3s-2.2 1.5-2.2 2.9v5.6H9v-12z" />
                                </svg>

                                @elseif($platform->name == 'WhatsApp')
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.5 3.5A11.8 11.8 0 0012 .5C5.7.5.7 5.5.7 11.8c0 2 .5 4 1.5 5.7L.5 23.5l6.2-1.6c1.7.9 3.6 1.4 5.5 1.4h.1c6.3 0 11.3-5 11.3-11.3 0-3-1.2-5.8-3.1-7.5zM12 21.3c-1.7 0-3.3-.5-4.7-1.3l-.3-.2-3.7 1 1-3.6-.2-.3c-.9-1.4-1.4-3-1.4-4.7 0-5.1 4.2-9.3 9.3-9.3 2.5 0 4.8 1 6.5 2.7a9.2 9.2 0 012.7 6.5c0 5.1-4.2 9.3-9.3 9.3zm5.1-7.1c-.3-.2-1.6-.8-1.9-.9-.3-.1-.5-.2-.7.2-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1-.3-.2-1.3-.5-2.5-1.6-.9-.8-1.6-1.9-1.8-2.2-.2-.3 0-.5.1-.6.1-.1.3-.3.5-.5.2-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.7-1.7-1-2.3-.2-.5-.5-.4-.7-.4h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1 2.8 1.2 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.6-.7 1.8-1.3.2-.6.2-1.2.1-1.3-.1-.1-.3-.2-.6-.4z" />
                                </svg>
                                @elseif($platform->name == 'GitHub')
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.865 8.166 6.839 9.489.5.092.682-.217.682-.483
    0-.237-.009-.868-.014-1.704-2.782.604-3.369-1.342-3.369-1.342-.454-1.156-1.11-1.465-1.11-1.465-.908-.62.069-.608.069-.608
    1.003.07 1.531 1.031 1.531 1.031.892 1.529 2.341 1.087 2.91.832.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.11-4.555-4.943
    0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004
    1.705.115 2.504.337 1.909-1.294 2.748-1.025 2.748-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683
    0 3.842-2.337 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .268.18.579.688.48C19.138
    20.164 22 16.418 22 12c0-5.523-4.477-10-10-10z" />
                                </svg>

                                @elseif($platform->name == 'YouTube')
                                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a2.99 2.99 0 00-2.108-2.112C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.39.574A2.99 2.99 0 00.502 6.186
    31.24 31.24 0 000 12a31.24 31.24 0 00.502 5.814 2.99 2.99 0 002.108 2.112C4.5 20.5 12 20.5 12 20.5s7.5 0 9.39-.574
    a2.99 2.99 0 002.108-2.112A31.24 31.24 0 0024 12a31.24 31.24 0 00-.502-5.814zM9.75 15.5v-7l6 3.5-6 3.5z" />
                                </svg>

                                @elseif($platform->name == 'TikTok')
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.75 2h2.25a5.25 5.25 0 005.25 5.25v2.25a7.5 7.5 0 01-4.5-1.5v6.75a6 6 0 11-6-6h2.25v2.25a3.75 3.75 0 103.75 3.75V2z" />
                                </svg>

                                @elseif($platform->name == 'Snapchat')
                                <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2c3 0 5 2.5 5 5.5 0 2.2-.8 3.8-1 5 .7.3 1.5.5 2 .5.5 0 .9.2.9.7 0 .6-.7 1.2-2 1.5-.5 1.3-2 2.3-4 2.8-.4.1-.7.4-.9.7-.2.3-.5.5-1 .5s-.8-.2-1-.5c-.2-.3-.5-.6-.9-.7-2-.5-3.5-1.5-4-2.8-1.3-.3-2-1-2-1.5 0-.5.4-.7.9-.7.5 0 1.3-.2 2-.5-.2-1.2-1-2.8-1-5C7 4.5 9 2 12 2z" />
                                </svg>


                                @elseif($platform->name == 'Telegram')
                                <svg class="w-6 h-6 text-sky-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9.04 15.42l-.39 4.38c.56 0 .81-.24 1.11-.53l2.62-2.5 5.43 3.97c1 .55 1.72.26 1.97-.93l3.57-16.73c.32-1.49-.54-2.07-1.51-1.7L1.6 9.3C.13 9.89.14 10.73 1.33 11.1l4.8 1.5 11.12-7c.52-.33.99-.15.6.18" />
                                </svg>


                                @elseif($platform->name == 'Email')
                                <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M2 4h20v16H2V4zm10 8L4 6h16l-8 6z" />
                                </svg>


                                @elseif($platform->name == 'Website')
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 2a8 8 0 110 16 8 8 0 010-16z" />
                                </svg>



                                @else
                                <span class="text-2xl text-gray-500">🔗</span>
                                @endif

                            </div>

                            <input type="text"
                                name="social_links[{{ $platform->id }}]"
                                placeholder="رابط {{ $platform->name }}"
                                value="{{ $userLinks[$platform->id] ?? '' }}"
                                class="flex-grow bg-transparent text-white focus:outline-none text-sm">

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="social_active[{{ $platform->id }}]" class="sr-only peer" {{ isset($userLinks[$platform->id]) ? 'checked' : '' }}>
                                <div class="w-9 h-5 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#E60914]"></div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 4. Theme Selection Section (Dynamic) -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">اختيار الثيم</h3>
                    <p class="text-gray-400 text-sm mb-6">اختر الشكل المناسب لبطاقتك الرقمية.</p>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($themes as $theme)
                        <!-- Theme Card -->
                        <label class="relative cursor-pointer group">
                            <!-- Radio Input -->
                            <input type="radio" name="theme_id" value="{{ $theme->id }}" class="sr-only peer" {{ $user->theme_id == $theme->id ? 'checked' : '' }}>

                            <!-- Visual Card -->
                            <div class="border-2 rounded-xl overflow-hidden transition-all duration-300
                                            border-[#1a1a1a] hover:border-gray-600
                                            peer-checked:border-[#E60914] peer-checked:shadow-[0_0_15px_rgba(230,9,20,0.2)]">

                                <!-- Theme Preview Image -->
                                <div class="aspect-video bg-[#0a0a0a] relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $theme->img) }}" alt="{{ $theme->theme }}" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition">

                                    <!-- Checkmark Icon -->
                                    <div class="absolute top-2 right-2 w-6 h-6 rounded-full bg-[#E60914] flex items-center justify-center opacity-0 peer-checked:opacity-100 transition transform scale-50 peer-checked:scale-100 shadow-lg">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Theme Name -->
                                <div class="p-3 bg-[#0a0a0a] text-center border-t border-[#1a1a1a]">
                                    <span class="text-sm font-medium text-gray-300 group-hover:text-white transition">{{ $theme->theme }}</span>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-[#E60914] hover:bg-red-700 text-white font-bold rounded-lg transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            حفظ التغييرات
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</x-app-layout>

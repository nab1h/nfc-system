<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Profile Card') }}
        </h2>
    </x-slot>

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
                            <img src="https://ui-avatars.com/api/?name=User&background=E60914&color=fff" class="w-16 h-16 rounded-full object-cover border-2 border-[#1a1a1a]">
                            <input type="file" class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#E60914]/10 file:text-[#E60914] hover:file:bg-[#E60914]/20 cursor-pointer">
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">صورة الغلاف</label>
                        <input type="file" class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#E60914]/10 file:text-[#E60914] hover:file:bg-[#E60914]/20 cursor-pointer">
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">الاسم الكامل</label>
                        <input type="text" value="نبيل الأشموني" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">المسمى الوظيفي</label>
                        <input type="text" value="مطور واجهات أمامية" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">البايو (نبذة)</label>
                    <textarea rows="3" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition resize-none">شغوف بتقنية الويب وتصميم التجارب الرقمية.</textarea>
                </div>
            </div>

            <!-- 2. Contact Info Section -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">معلومات الاتصال</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">رقم الهاتف</label>
                        <input type="tel" value="+20123456789" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">البريد الإلكتروني</label>
                        <input type="email" value="user@example.com" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">العنوان</label>
                        <input type="text" value="القاهرة، مصر" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                    </div>
                </div>
            </div>

            <!-- 3. Social Media Section -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">حسابات التواصل الاجتماعي</h3>

                <div class="space-y-4">
                    <!-- Instagram -->
                    <div class="flex items-center gap-4 p-3 bg-[#0a0a0a] rounded-lg border border-[#1a1a1a]">
                        <svg class="w-6 h-6 text-pink-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        <input type="text" placeholder="رابط الانستجرام" class="flex-grow bg-transparent text-white focus:outline-none text-sm">
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#E60914]"></div>
                        </label>
                    </div>

                    <!-- Twitter/X -->
                    <div class="flex items-center gap-4 p-3 bg-[#0a0a0a] rounded-lg border border-[#1a1a1a]">
                        <svg class="w-6 h-6 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                        <input type="text" placeholder="رابط تويتر" class="flex-grow bg-transparent text-white focus:outline-none text-sm">
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#E60914]"></div>
                        </label>
                    </div>

                    <!-- LinkedIn -->
                    <div class="flex items-center gap-4 p-3 bg-[#0a0a0a] rounded-lg border border-[#1a1a1a]">
                        <svg class="w-6 h-6 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                        <input type="text" placeholder="رابط لينكد إن" class="flex-grow bg-transparent text-white focus:outline-none text-sm">
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#E60914]"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- 4. Theme Selection Section (NEW) -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-6 border-b border-[#1a1a1a] pb-3">اختيار الثيم</h3>
                <p class="text-gray-400 text-sm mb-6">اختر الشكل المناسب لبطاقتك الرقمية.</p>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    @php
                    // Dummy Data for Preview - Replace with: $themes = App\Models\Theme::all();
                    $themes = [
                    (object)['id' => 1, 'theme' => 'Dark Red', 'img' => 'https://via.placeholder.com/300x150/0a0a0a/E60914?text=Dark+Red'],
                    (object)['id' => 2, 'theme' => 'Ocean Blue', 'img' => 'https://via.placeholder.com/300x150/0a0a0a/3B82F6?text=Ocean+Blue'],
                    (object)['id' => 3, 'theme' => 'Minimal', 'img' => 'https://via.placeholder.com/300x150/ffffff/000000?text=Minimal'],
                    ];
                    $selected_theme_id = 1; // Replace with auth()->user()->theme_id
                    @endphp

                    @foreach($themes as $theme)
                    <!-- Theme Card -->
                    <label class="relative cursor-pointer group">
                        <!-- Radio Input Hidden -->
                        <input type="radio" name="theme_id" value="{{ $theme->id }}" class="sr-only peer" {{ $theme->id == $selected_theme_id ? 'checked' : '' }}>

                        <!-- Visual Card -->
                        <div class="border-2 rounded-xl overflow-hidden transition-all duration-300
                                        border-[#1a1a1a] hover:border-gray-600
                                        peer-checked:border-[#E60914] peer-checked:shadow-[0_0_15px_rgba(230,9,20,0.2)]">

                            <!-- Theme Preview Image -->
                            <div class="aspect-video bg-[#0a0a0a] relative overflow-hidden">
                                <img src="{{ $theme->img }}" alt="{{ $theme->theme }}" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition">

                                <!-- Checkmark Icon when selected -->
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
</x-app-layout>

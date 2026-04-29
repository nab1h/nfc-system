<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('إضافة مستخدم جديد') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">

                <!-- Form Header -->
                <div class="p-6 border-b border-[#1a1a1a]">
                    <h3 class="text-xl font-bold text-white">بيانات المستخدم</h3>
                    <p class="text-gray-500 text-sm mt-1">املأ البيانات التالية لإنشاء حساب جديد. الـ Slug سيتم توليده تلقائياً.</p>
                </div>

                <!-- Form Body -->
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- الاسم -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الاسم الكامل <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                            @error('name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">البريد الإلكتروني <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                            @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- كلمة المرور -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">كلمة المرور <span class="text-red-500">*</span></label>
                            <input type="password" name="password" required
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                            @error('password')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- تأكيد كلمة المرور -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">تأكيد كلمة المرور <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" required
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>

                        <!-- الوظيفة -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الوظيفة</label>
                            <input type="text" name="job" value="{{ old('job') }}"
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>

                        <!-- الدور -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الدور</label>
                            <select name="role" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>عميل</option>
                                <option value="agent" {{ old('role') == 'agent' ? 'selected' : '' }}>مندوب</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير</option>
                            </select>
                        </div>

                        <!-- الهاتف -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">رقم الهاتف</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>

                        <!-- الواتساب -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">رقم الواتساب</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}"
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">
                        </div>

                        <!-- الصورة الشخصية -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الصورة الشخصية</label>
                            <input type="file" name="img" accept="image/*"
                                class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#1a1a1a] file:text-white file:rounded-lg hover:file:bg-[#E60914] transition cursor-pointer">
                        </div>

                        <!-- صورة الغلاف -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">صورة الغلاف</label>
                            <input type="file" name="img_cover" accept="image/*"
                                class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#1a1a1a] file:text-white file:rounded-lg hover:file:bg-[#E60914] transition cursor-pointer">
                        </div>

                        <!-- البايو (كامل العرض) -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-400 text-sm mb-2">نبذة تعريفية (Bio)</label>
                            <textarea name="bio" rows="3" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914] focus:outline-none transition">{{ old('bio') }}</textarea>
                        </div>

                        <!-- الخيارات (Checkboxes) -->
                        <div class="md:col-span-2 border-t border-[#1a1a1a] pt-6 mt-2">
                            <label class="block text-gray-400 text-sm mb-4">إعدادات إضافية</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                <!-- نشط -->
                                <label class="flex items-center gap-3 cursor-pointer bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a] hover:border-green-500 transition">
                                    <input type="checkbox" name="is_active" checked class="accent-[#E60914] w-4 h-4">
                                    <span class="text-white text-sm">نشط</span>
                                </label>

                                <!-- يحسب بالإحصائيات -->
                                <label class="flex items-center gap-3 cursor-pointer bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a] hover:border-blue-500 transition">
                                    <input type="checkbox" name="is_count" checked class="accent-[#E60914] w-4 h-4">
                                    <span class="text-white text-sm">يحسب بالإحصائيات</span>
                                </label>

                                <!-- لديه كارت -->
                                <label class="flex items-center gap-3 cursor-pointer bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a] hover:border-purple-500 transition">
                                    <input type="checkbox" name="has_card" class="accent-[#E60914] w-4 h-4">
                                    <span class="text-white text-sm">لديه كارت</span>
                                </label>

                                <!-- بدأ التشغيل -->
                                <label class="flex items-center gap-3 cursor-pointer bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a] hover:border-yellow-500 transition">
                                    <input type="checkbox" name="is_started" class="accent-[#E60914] w-4 h-4">
                                    <span class="text-white text-sm">بدأ التشغيل</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <!-- أزرار التحكم -->
                    <div class="mt-8 flex items-center justify-end gap-4 border-t border-[#1a1a1a] pt-6">
                        <a href="{{ route('admin.users.index') }}" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                            إلغاء
                        </a>
                        <button type="submit" class="px-8 py-2 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            حفظ المستخدم
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

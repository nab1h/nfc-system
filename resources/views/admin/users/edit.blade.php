<!-- resources/views/admin/users/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            تعديل المستخدم: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl p-8">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- الاسم -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الاسم</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]">
                        </div>

                        <!-- Slug -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الرابط (Slug)</label>
                            <input type="text" name="slug" value="{{ $user->slug }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]">
                        </div>

                        <!-- البريد -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]">
                        </div>

                        <!-- كلمة المرور (جديدة) -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">كلمة المرور الجديدة (اتركها فارغة إن لم ترد التغيير)</label>
                            <input type="password" name="password" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:border-[#E60914]">
                        </div>

                        <!-- الوظيفة -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الوظيفة</label>
                            <input type="text" name="job" value="{{ $user->job }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white">
                        </div>

                        <!-- الهاتف -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الهاتف</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white">
                        </div>

                        <!-- البايو -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-400 text-sm mb-2">نبذة (Bio)</label>
                            <textarea name="bio" rows="3" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white">{{ $user->bio }}</textarea>
                        </div>

                        <!-- صورة الشخصية -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">الصورة الشخصية</label>
                            <input type="file" name="img" class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#E60914] file:text-white file:rounded-lg">
                            @if($user->img)
                            <img src="{{ asset('storage/' . $user->img) }}" class="w-16 h-16 rounded-full mt-2 object-cover">
                            @endif
                        </div>

                        <!-- صورة الغلاف -->
                        <div>
                            <label class="block text-gray-400 text-sm mb-2">صورة الغلاف</label>
                            <input type="file" name="img_cover" class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-[#E60914] file:text-white file:rounded-lg">
                        </div>

                        <!-- الخانات المنطقية (Checkboxes) -->
                        <div class="md:col-span-2 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-[#1a1a1a] pt-6 mt-2">
                            <!-- نشط -->
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" {{ $user->is_active ? 'checked' : '' }} class="accent-[#E60914] w-4 h-4">
                                <span class="text-white text-sm">نشط (Active)</span>
                            </label>

                            <!-- لديه كارت -->
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="has_card" {{ $user->has_card ? 'checked' : '' }} class="accent-[#E60914] w-4 h-4">
                                <span class="text-white text-sm">لديه كارت</span>
                            </label>

                            <!-- بدأ -->
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_started" {{ $user->is_started ? 'checked' : '' }} class="accent-[#E60914] w-4 h-4">
                                <span class="text-white text-sm">بدأ التشغيل</span>
                            </label>

                            <!-- يحسب بالإحصائيات -->
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_count" {{ $user->is_count ? 'checked' : '' }} class="accent-[#E60914] w-4 h-4">
                                <span class="text-white text-sm">يحسب بالإحصائيات (عميل)</span>
                            </label>
                        </div>

                        <!-- تعليق Admin -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-400 text-sm mb-2">ملاحظات الأدمن</label>
                            <textarea name="comment" rows="2" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white">{{ $user->comment }}</textarea>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition">
                            حفظ التغييرات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

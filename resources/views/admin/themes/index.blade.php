<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage Themes') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        openModal: false,
        editMode: false,
        formAction: '{{ route('themes.store') }}',
        themeName: '',
        currentImage: '',
        _method: 'POST',

        // دالة فتح مودال الإضافة
        openAddModal() {
            this.editMode = false;
            this.formAction = '{{ route('themes.store') }}';
            this.themeName = '';
            this.currentImage = '';
            this._method = 'POST';
            this.openModal = true;
        },

        // دالة فتح مودال التعديل
        openEditModal(id, name, img) {
            this.editMode = true;
            // نستبدل 0 بالـ ID الحقيقي في الرابط
            this.formAction = '{{ route('themes.update', 0) }}'.replace(/0+$/, id);
            this.themeName = name;
            this.currentImage = img;
            this._method = 'PUT'; // مهم جداً لتحديث البيانات في Laravel
            this.openModal = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Header & Add Button -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">إدارة الثيمات</h3>
                    <p class="text-gray-400 text-sm mt-1">إضافة وتعديل قوالب بطاقات NFC.</p>
                </div>

                <!-- Add Button -->
                <button @click="openAddModal()" class="px-5 py-2.5 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2 shadow-lg shadow-red-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    إضافة ثيم جديد
                </button>
            </div>

            <!-- Table Card -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#0a0a0a] text-gray-500 border-b border-[#1a1a1a]">
                            <tr>
                                <th scope="col" class="px-6 py-4">#ID</th>
                                <th scope="col" class="px-6 py-4">اسم الثيم</th>
                                <th scope="col" class="px-6 py-4">الصورة</th>
                                <th scope="col" class="px-6 py-4">تاريخ الإضافة</th>
                                <th scope="col" class="px-6 py-4 text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($themes as $theme)
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4 font-mono text-gray-500">{{ $theme->id }}</td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $theme->theme }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $theme->img) }}" class="w-20 h-20 object-cover rounded-md border border-[#1a1a1a]" alt="{{ $theme->theme }}">
                                </td>
                                <td class="px-6 py-4 text-gray-400">{{ $theme->created_at->format('Y-m-d h:i A') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">

                                        <!-- Edit Button (Modified) -->
                                        <!-- نمرر البيانات هنا: ID, Name, Image URL -->
                                        <button
                                            @click="openEditModal({{ $theme->id }}, '{{ $theme->theme }}', '{{ asset('storage/' . $theme->img) }}')"
                                            title="تعديل"
                                            class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('themes.destroy',$theme->id) }}" class="inline-block" onsubmit="return confirm('هل أنت متأكد من حذف هذا الثيم؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="حذف" class="p-2 hover:bg-red-500/10 rounded-lg transition text-gray-400 hover:text-[#E60914]">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add/Edit Modal -->
        <div x-show="openModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <!-- Background Overlay -->
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openModal = false"></div>

            <!-- Modal Content -->
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl w-full max-w-md p-6 space-y-6">

                    <!-- Modal Header -->
                    <div class="flex justify-between items-center border-b border-[#1a1a1a] pb-4">
                        <h3 class="text-xl font-bold text-white" x-text="editMode ? 'تعديل الثيم' : 'إضافة ثيم جديد'"></h3>
                        <button @click="openModal = false" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Form (Dynamic) -->
                    <!-- :action تتغير بناءً على الوضع (إضافة أو تعديل) -->
                    <form :action="formAction" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!--
                           في حالة التعديل، نحتاج لـ PUT method.
                           هذا الحقل المخفي يفعل ذلك.
                        -->
                        <input type="hidden" name="_method" :value="_method">

                        <div class="space-y-4">
                            <!-- Theme Name Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">اسم الثيم</label>
                                <input type="text" name="theme" x-model="themeName" placeholder="مثال: Dark Mode, Minimal..."
                                    class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#E60914] transition">
                            </div>

                            <!-- Image Input -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">صورة الثيم</label>

                                <div x-show="editMode && currentImage" class="mb-3">
                                    <p class="text-xs text-gray-500 mb-2">الصورة الحالية:</p>
                                    <img :src="currentImage" class="w-32 h-20 object-cover rounded border border-gray-700">
                                </div>

                                <input type="file" name="img" accept="image/*"
                                    class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#E60914]/10 file:text-[#E60914] hover:file:bg-[#E60914]/20 cursor-pointer border border-[#1a1a1a] rounded-lg bg-[#0a0a0a] p-2">
                                <p class="text-xs text-gray-500 mt-1">
                                    <span x-text="editMode ? 'اتركه فارغاً للإبقاء على الصورة القديمة' : 'الأبعاد المفضلة: 800x400 بكسل.'"></span>
                                </p>
                            </div>
                        </div>

                        <!-- Footer Buttons -->
                        <div class="mt-6 flex justify-end gap-3">
                            <button type="button" @click="openModal = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition text-sm">
                                إلغاء
                            </button>
                            <button type="submit" class="px-5 py-2 bg-[#E60914] text-white rounded-lg hover:bg-red-700 transition text-sm font-bold">
                                حفظ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Script -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>

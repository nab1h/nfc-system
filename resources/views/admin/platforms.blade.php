<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage Platforms') }}
        </h2>
    </x-slot>

    <!-- تم وضع x-data هنا ليشمل الجدول والمودال معاً -->
    <div class="py-12" x-data="{ openModal: false, editMode: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Header & Add Button -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">المنصات المتاحة</h3>
                    <p class="text-gray-400 text-sm mt-1">إدارة المنصات التي تظهر في بطاقة العملاء.</p>
                </div>

                <!-- Add Button -->
                <!-- تم ربط الزر بالمتغير openModal -->
                <button @click="openModal = true; editMode = false" class="px-5 py-2.5 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2 shadow-lg shadow-red-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    إضافة منصة جديدة
                </button>
            </div>

            <!-- Table Card -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">

                <div class="p-4 border-b border-[#1a1a1a]">
                    <input type="text" placeholder="بحث باسم المنصة..." class="w-full md:w-1/3 bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#E60914]">
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#0a0a0a] text-gray-500 border-b border-[#1a1a1a]">
                            <tr>
                                <th scope="col" class="px-6 py-4">#ID</th>
                                <th scope="col" class="px-6 py-4">اسم المنصة</th>
                                <th scope="col" class="px-6 py-4">الحالة</th>
                                <th scope="col" class="px-6 py-4">تاريخ الإضافة</th>
                                <th scope="col" class="px-6 py-4 text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Sample Row 1 -->
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4 font-mono text-gray-500">1</td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white flex items-center gap-2">
                                    <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                    Instagram
                                </td>
                                <td class="px-6 py-4">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#E60914]"></div>
                                    </label>
                                </td>
                                <td class="px-6 py-4 text-gray-400">2023-10-12</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <!-- Edit Button -->
                                        <button @click="openModal = true; editMode = true" title="تعديل" class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>

                                        <form method="POST" action="#" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- لا نكرر x-data هنا لأنه موروث من الأب -->
        <div x-show="openModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <!-- Background Overlay -->
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openModal = false"></div>

            <!-- Modal Content -->
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl w-full max-w-md p-6 space-y-6">

                    <!-- Modal Header -->
                    <div class="flex justify-between items-center border-b border-[#1a1a1a] pb-4">
                        <h3 class="text-xl font-bold text-white" x-text="editMode ? 'تعديل المنصة' : 'إضافة منصة جديدة'"></h3>
                        <button @click="openModal = false" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Form -->
                    <form action="#" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">اسم المنصة</label>
                                <input type="text" name="name" placeholder="مثال: Facebook, LinkedIn..."
                                    class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#E60914] transition">
                            </div>

                            <div class="flex items-center justify-between bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a]">
                                <span class="text-sm text-gray-300">حالة التفعيل</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#E60914]"></div>
                                </label>
                            </div>
                        </div>

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
    <!-- تأكد من وجود هذا السكريبت مرة واحدة فقط في الصفحة -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>

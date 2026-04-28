<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Title & Actions -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">إدارة البطاقات</h3>
                    <p class="text-gray-400 text-sm mt-1">مرحباً بك، يمكنك إدارة بيانات بطاقتك من هنا.</p>
                </div>
                <button class="px-4 py-2 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    بطاقة جديدة
                </button>
            </div>

            <!-- Table Card -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">

                <!-- Table Header Stats -->
                <div class="p-6 border-b border-[#1a1a1a] flex justify-between items-center">
                    <div class="flex gap-8">
                        <div>
                            <span class="text-gray-400 text-sm">إجمالي البطاقات</span>
                            <p class="text-2xl font-bold text-white">1</p>
                        </div>
                        <div>
                            <span class="text-gray-400 text-sm">البطاقات النشطة</span>
                            <p class="text-2xl font-bold text-green-500">1</p>
                        </div>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="بحث..." class="bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#E60914]">
                    </div>
                </div>

                <!-- The Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#0a0a0a] text-gray-500 border-b border-[#1a1a1a]">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    الصورة
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    الكفر
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    الاسم
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    الموبايل
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    البايو
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    الثيم
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    التواصل
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    الحالة
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    إجراءات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Row Data -->
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">

                                <!-- Profile Image -->
                                <td class="px-6 py-4">
                                    <img src="https://ui-avatars.com/api/?name=Nabih&background=E60914&color=fff" class="w-10 h-10 rounded-full object-cover border-2 border-[#E60914]" alt="Profile">
                                </td>

                                <!-- Cover Image -->
                                <td class="px-6 py-4">
                                    <img src="https://via.placeholder.com/80x40/1a1a1a/fff?text=Cover" class="w-20 h-10 rounded-md object-cover opacity-80 hover:opacity-100 transition" alt="Cover">
                                </td>

                                <!-- Name -->
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    نبيل الأشموني
                                </td>

                                <!-- Mobile -->
                                <td class="px-6 py-4">
                                    +20 123 456 789
                                </td>

                                <!-- Bio -->
                                <td class="px-6 py-4 max-w-[200px] truncate">
                                    مطور واجهات أمامية | شغوف بالتقنية
                                </td>

                                <!-- Theme -->
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full bg-[#E60914]/20 text-[#E60914] border border-[#E60914]/30">
                                        داكن
                                    </span>
                                </td>

                                <!-- Social Links -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="#" class="text-gray-400 hover:text-white">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-white">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-white">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-500/10 text-green-500 border border-green-500/20">
                                        نشط
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.edituser') }}">
                                            <button title="تعديل" class="p-2 hover:bg-white/5 rounded-lg transition text-gray-400 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                        </a>

                                        <!-- Disable Button -->
                                        <button title="تعطيل" class="p-2 hover:bg-yellow-500/10 rounded-lg transition text-gray-400 hover:text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <!-- Delete/Close Button -->
                                        <button title="حذف" class="p-2 hover:bg-red-500/10 rounded-lg transition text-gray-400 hover:text-[#E60914]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Placeholder -->
                <div class="p-4 border-t border-[#1a1a1a] flex justify-between items-center text-sm text-gray-400">
                    <span>عرض 1 إلى 1 من 1 نتائج</span>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded hover:bg-[#E60914] disabled:opacity-50" disabled>السابق</button>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded hover:bg-[#E60914] disabled:opacity-50" disabled>التالي</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

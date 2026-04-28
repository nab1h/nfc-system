<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Orders Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Title -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">سجل الطلبات</h3>
                    <p class="text-gray-400 text-sm mt-1">متابعة وتنفيذ طلبات العملاء.</p>
                </div>

                <!-- Add Order Button -->
                <a href={{ route('sales.create') }}>
                    <button class="px-5 py-2.5 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2 shadow-lg shadow-red-900/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        إضافة طلب جديد
                    </button>
                </a>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <!-- Total Orders -->
                <div class="bg-[#111111] border border-[#1a1a1a] p-4 rounded-xl flex items-center gap-4">
                    <div class="p-3 bg-blue-500/10 rounded-lg text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">إجمالي الطلبات</p>
                        <h4 class="text-xl font-bold text-white">15</h4>
                    </div>
                </div>
                <!-- Preparation -->
                <div class="bg-[#111111] border border-[#1a1a1a] p-4 rounded-xl flex items-center gap-4">
                    <div class="p-3 bg-yellow-500/10 rounded-lg text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">قيد التجهيز</p>
                        <h4 class="text-xl font-bold text-white">3</h4>
                    </div>
                </div>
                <!-- Shipping -->
                <div class="bg-[#111111] border border-[#1a1a1a] p-4 rounded-xl flex items-center gap-4">
                    <div class="p-3 bg-blue-500/10 rounded-lg text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M8 17h8M8 17v4h8v-4M8 17H5a2 2 0 01-2-2V7c0-1.1.9-2 2-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3m-8 0V5a2 2 0 012-2h4a2 2 0 012 2v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">في الشحن</p>
                        <h4 class="text-xl font-bold text-white">5</h4>
                    </div>
                </div>
                <!-- Delivered -->
                <div class="bg-[#111111] border border-[#1a1a1a] p-4 rounded-xl flex items-center gap-4">
                    <div class="p-3 bg-green-500/10 rounded-lg text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">تم التسليم</p>
                        <h4 class="text-xl font-bold text-white">7</h4>
                    </div>
                </div>
                <!-- Archived -->
                <a href="{{ route('sales.archived') }}">
                    <div class="bg-[#111111] border border-[#1a1a1a] p-4 rounded-xl flex items-center gap-4">
                        <div class="p-3 bg-purple-500/10 rounded-lg text-purple-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">الأرشيف</p>
                            <h4 class="text-xl font-bold text-white">2</h4>
                        </div>
                    </div>
                </a>

                <!-- Recently Deleted -->
                <a href="{{ route('sales.deleted') }}">
                    <div class="bg-[#111111] border border-[#1a1a1a] p-4 rounded-xl flex items-center gap-4">
                        <div class="p-3 bg-red-500/10 rounded-lg text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">المحذوف مؤخراً</p>
                            <h4 class="text-xl font-bold text-white">1</h4>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">

                <!-- Search & Filter -->
                <div class="p-4 border-b border-[#1a1a1a] flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <span>فلترة حسب:</span>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded-lg hover:bg-[#E60914] transition">الكل</button>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded-lg hover:bg-[#E60914] transition">قيد التجهيز</button>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded-lg hover:bg-[#E60914] transition">تم التسليم</button>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded-lg hover:bg-[#E60914] transition">في الشحن</button>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="بحث بالاسم أو الهاتف..." class="bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#E60914] w-full md:w-auto">
                    </div>
                </div>

                <!-- The Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#0a0a0a] text-gray-500 border-b border-[#1a1a1a]">
                            <tr>
                                <th scope="col" class="px-6 py-4">#ID</th>
                                <th scope="col" class="px-6 py-4">اسم العميل</th>
                                <th scope="col" class="px-6 py-4">العنوان</th>
                                <th scope="col" class="px-6 py-4">التواصل</th>
                                <th scope="col" class="px-6 py-4">حالة الطلب</th>
                                <th scope="col" class="px-6 py-4 text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Row 1: In Preparation -->
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4 font-mono text-gray-500">#1025</td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#E60914]/20 flex items-center justify-center text-[#E60914] font-bold text-xs">أ</div>
                                        أحمد محمود
                                    </div>
                                </td>
                                <td class="px-6 py-4">شارع الملك فهد، الرياض، السعودية</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- WhatsApp -->
                                        <a href="https://wa.me/966500000000" target="_blank" class="text-gray-400 hover:text-green-500 transition p-1">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg>
                                        </a>
                                        <!-- Phone -->
                                        <a href="tel:+966500000000" class="text-gray-400 hover:text-blue-400 transition p-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </a>
                                        <!-- Gmail -->
                                        <a href="mailto:client@example.com" class="text-gray-400 hover:text-red-400 transition p-1">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-2 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 font-medium">
                                        قيد التجهيز
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <button title="تفاصيل" class="p-2 hover:bg-white/5 rounded-lg transition text-gray-400 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <a href="{{ route('sales.update') }}">
                                            <button title="تعديل الحالة" class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </a>

                                        @if(auth()->user()->role === "admin")
                                        <form action="" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="حذف" class="p-2 hover:bg-red-500/10 rounded-lg transition text-gray-400 hover:text-[#E60914]">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                </td>
                            </tr>

                            <!-- Row 2: In Shipping -->
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4 font-mono text-gray-500">#1024</td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-500 font-bold text-xs">س</div>
                                        سارة أحمد
                                    </div>
                                </td>
                                <td class="px-6 py-4">حي النزهة، جدة، السعودية</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="#" class="text-gray-400 hover:text-green-500 transition p-1"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg></a>
                                        <a href="#" class="text-gray-400 hover:text-blue-400 transition p-1"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg></a>
                                        <a href="#" class="text-gray-400 hover:text-red-400 transition p-1"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                            </svg></a>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20 font-medium">
                                        في الشحن
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <button title="تفاصيل" class="p-2 hover:bg-white/5 rounded-lg transition text-gray-400 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg></button>
                                        <button title="تعديل الحالة" class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3: Delivered -->
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4 font-mono text-gray-500">#1023</td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-green-500/20 flex items-center justify-center text-green-500 font-bold text-xs">م</div>
                                        محمد خالد
                                    </div>
                                </td>
                                <td class="px-6 py-4">حي الروضة، الدمام، السعودية</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="#" class="text-gray-400 hover:text-green-500 transition p-1"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg></a>
                                        <a href="#" class="text-gray-400 hover:text-blue-400 transition p-1"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg></a>
                                        <a href="#" class="text-gray-400 hover:text-red-400 transition p-1"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                            </svg></a>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-500/10 text-green-400 border border-green-500/20 font-medium">
                                        تم التسليم
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <button title="تفاصيل" class="p-2 hover:bg-white/5 rounded-lg transition text-gray-400 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg></button>
                                        <button title="أرشيف" class="p-2 hover:bg-gray-500/10 rounded-lg transition text-gray-400 hover:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-[#1a1a1a] flex justify-between items-center text-sm text-gray-400">
                    <span>عرض 1 إلى 3 من 15 نتيجة</span>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded hover:bg-[#E60914] transition">السابق</button>
                        <button class="px-3 py-1 bg-[#E60914] rounded text-white">1</button>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded hover:bg-[#E60914] transition">2</button>
                        <button class="px-3 py-1 bg-[#0a0a0a] rounded hover:bg-[#E60914] transition">التالي</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

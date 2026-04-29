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
                    <h3 class="text-2xl font-bold text-white">إدارة المستخدمين</h3>
                    <p class="text-gray-400 text-sm mt-1">مرحباً بك، يمكنك إدارة بيانات المستخدمين والبطاقات من هنا.</p>
                </div>
                <!-- زر إضافة مستخدم جديد (Create) -->
                <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    مستخدم جديد
                </a>
            </div>

            <!-- Statistics Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">

                <!-- Card 1: Total Clients -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-xl p-6 flex items-center gap-4">
                    <div class="p-3 bg-blue-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">إجمالي العملاء</p>
                        <p class="text-2xl font-bold text-white">{{ $totalClients ?? 0 }}</p>
                    </div>
                </div>

                <!-- Card 2: Active Cards -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-xl p-6 flex items-center gap-4">
                    <div class="p-3 bg-green-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">كروت تعمل</p>
                        <p class="text-2xl font-bold text-green-500">{{ $activeCards ?? 0 }}</p>
                    </div>
                </div>

                <!-- Card 3: Disabled Cards -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-xl p-6 flex items-center gap-4">
                    <div class="p-3 bg-red-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">كروت معطلة</p>
                        <p class="text-2xl font-bold text-red-500">{{ $disabledCards ?? 0 }}</p>
                    </div>
                </div>

                <!-- Card 4: Not Started -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-xl p-6 flex items-center gap-4">
                    <div class="p-3 bg-yellow-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">لم تبدأ بعد</p>
                        <p class="text-2xl font-bold text-yellow-500">{{ $notStarted ?? 0 }}</p>
                    </div>
                </div>

                <!-- Card 5: Clients Without Card -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-xl p-6 flex items-center gap-4">
                    <div class="p-3 bg-purple-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs">بدون كارت</p>
                        <p class="text-2xl font-bold text-purple-500">{{ $noCard ?? 0 }}</p>
                    </div>
                </div>

            </div>

            <!-- Table Card -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">

                <!-- Table Header & Search -->
                <div class="p-6 border-b border-[#1a1a1a] flex justify-between items-center">
                    <div>
                        <h4 class="text-lg font-bold text-white">قائمة المستخدمين</h4>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="بحث بالاسم أو Slug..." class="bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-[#E60914]">
                    </div>
                </div>

                <!-- The Table -->
                <div class="overflow-x-scroll">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#0a0a0a] text-gray-500 border-b border-[#1a1a1a]">
                            <tr>
                                <th scope="col" class="px-6 py-4">الصورة</th>
                                <th scope="col" class="px-6 py-4">الاسم</th>
                                <th scope="col" class="px-6 py-4">ال Slug</th>
                                <th scope="col" class="px-6 py-4">الوظيفة</th>
                                <th scope="col" class="px-6 py-4">البريد</th>
                                <th scope="col" class="px-6 py-4">الهاتف</th>
                                <th scope="col" class="px-6 py-4">الحالة</th>
                                <th scope="col" class="px-6 py-4">الدور</th>
                                <th scope="col" class="px-6 py-4">هل لديه كارت</th>
                                <th scope="col" class="px-6 py-4 text-center">تواصل مع العميل</th>
                                <th scope="col" class="px-6 py-4 text-center">تعليق</th>
                                <th scope="col" class="px-6 py-4 text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">

                                <!-- Profile Image -->
                                <td class="px-6 py-4">
                                    <img src="{{ $user->img ? asset('storage/' . $user->img) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=E60914&color=fff' }}" class="w-10 h-10 rounded-full object-cover border-2 border-[#E60914]" alt="{{ $user->name }}">
                                </td>

                                <!-- Name -->
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $user->name }}
                                </td>

                                <!-- Slug -->
                                <td class="px-6 py-4">
                                    <span class="font-mono text-xs bg-[#0a0a0a] px-2 py-1 rounded text-gray-400 border border-[#222]">
                                        {{ $user->slug }}
                                    </span>
                                </td>

                                <!-- Job -->
                                <td class="px-6 py-4">
                                    {{ $user->job ?? '--' }}
                                </td>

                                <!-- Email -->
                                <td class="px-6 py-4 text-xs">
                                    {{ $user->email }}
                                </td>

                                <!-- Phone -->
                                <td class="px-6 py-4">
                                    {{ $user->phone ?? '--' }}
                                </td>

                                <!-- Status (Toggle Switch) -->
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.users.toggle-status', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-300 ease-in-out focus:outline-none
                                                   {{ $user->is_active ? 'bg-green-500' : 'bg-gray-600' }}">
                                            <span class="sr-only">تبديل الحالة</span>
                                            <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow-lg ring-0 transition duration-300 ease-in-out
                                                       {{ $user->is_active ? 'translate-x-5' : 'translate-x-0' }}">
                                            </span>
                                        </button>
                                    </form>
                                </td>

                                <!-- Role -->
                                <td class="px-6 py-4">
                                    @if($user->role == 'admin')
                                    <span class="px-3 py-1 text-xs rounded-full bg-red-500/10 text-red-400 border border-red-500/20">أدمن</span>
                                    @elseif($user->role == 'agent')
                                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-500/10 text-yellow-400 border border-yellow-500/20">مندوب</span>
                                    @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">عميل</span>
                                    @endif
                                </td>

                                <!-- Has Card -->
                                <td class="px-6 py-4">
                                    @if($user->has_card)
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-500/10 text-green-400 border border-green-500/20">نعم</span>
                                    @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-gray-500/10 text-gray-400 border border-gray-500/20">لا</span>
                                    @endif
                                </td>


                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">

                                        <!-- زر اتصال -->
                                        @if($user->phone)
                                        <a href="tel:{{ $user->phone }}" title="اتصال هاتفي" class="p-2 hover:bg-green-500/10 rounded-lg transition text-gray-400 hover:text-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </a>
                                        @else
                                        <span class="p-2 text-gray-700"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg></span>
                                        @endif

                                        <!-- زر واتساب -->
                                        @if($user->phone)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $user->phone) }}" target="_blank" title="واتساب" class="p-2 hover:bg-green-500/10 rounded-lg transition text-gray-400 hover:text-green-400">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg>
                                        </a>
                                        @else
                                        <span class="p-2 text-gray-700"><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg></span>
                                        @endif

                                        <!-- زر إيميل -->
                                        <a href="mailto:{{ $user->email }}" title="إرسال بريد" class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <p>{{ $user->comment ? $user->comment : "لايوجد تعليق"}}</p>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">

                                        <!-- View Card Button -->
                                        <a href="{{ url('/' . $user->slug) }}" target="_blank" title="معاينة الكارت" class="p-2 hover:bg-white/5 rounded-lg transition text-gray-400 hover:text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.users.edit', $user->id) }}" title="تعديل" class="p-2 hover:bg-white/5 rounded-lg transition text-gray-400 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="حذف" class="p-2 hover:bg-red-500/10 rounded-lg transition text-gray-400 hover:text-[#E60914]">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center py-10 text-gray-500">
                                    لا يوجد مستخدمين حالياً.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-[#1a1a1a]">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

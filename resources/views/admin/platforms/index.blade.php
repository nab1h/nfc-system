<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage Platforms') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        openModal: false,
        editMode: false,
        formAction: '{{ route('platforms.store') }}',
        platformName: '',
        platformStatus: true,
        _method: 'POST',

        init() {
            // نفتح المودال تلقائياً إذا كان هناك أخطاء في التحقق
            @if ($errors->any())
                this.openModal = true;
                this.editMode = false;
            @endif
        },

        openAddModal() {
            this.editMode = false;
            this.formAction = '{{ route('platforms.store') }}';
            this.platformName = '';
            this.platformStatus = true;
            this._method = 'POST';
            this.openModal = true;
        },

        openEditModal(id, name, status) {
            this.editMode = true;
            this.formAction = '{{ route('platforms.update', 0) }}'.replace(/0+$/, id);
            this.platformName = name;
            this.platformStatus = Boolean(status);
            this._method = 'PUT';
            this.openModal = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
            <div class="mb-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-lg p-4 text-sm">
                {{ session('status') }}
            </div>
            @endif

            <!-- Page Header & Add Button -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">المنصات المتاحة</h3>
                    <p class="text-gray-400 text-sm mt-1">إدارة المنصات التي تظهر في بطاقة العملاء.</p>
                </div>

                <button @click="openAddModal()" class="px-5 py-2.5 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2 shadow-lg shadow-red-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    إضافة منصة جديدة
                </button>
            </div>

            <!-- Table Card -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">
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
                            @foreach ($platforms as $platform)
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4 font-mono text-gray-500">{{ $platform->id }}</td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">{{ $platform->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full {{ $platform->is_active ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-400' }}">
                                        {{ $platform->is_active ? 'مفعلة' : 'معطلة' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-400">{{ $platform->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <button @click="openEditModal({{ $platform->id }}, '{{ $platform->name }}', {{ $platform->is_active ? 'true' : 'false' }})" title="تعديل" class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>

                                        <form method="POST" action="{{ route('platforms.destroy', $platform->id) }}" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                            @csrf @method('DELETE')
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

        <!-- Modal -->
        <div x-show="openModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openModal = false"></div>

            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl w-full max-w-md p-6 space-y-6">

                    <div class="flex justify-between items-center border-b border-[#1a1a1a] pb-4">
                        <h3 class="text-xl font-bold text-white" x-text="editMode ? 'تعديل المنصة' : 'إضافة منصة جديدة'"></h3>
                        <button @click="openModal = false" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Error Display Block (المضافة) -->
                    @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 text-red-400 rounded-lg p-4 text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form :action="formAction" method="POST">
                        @csrf
                        <input type="hidden" name="_method" :value="_method">

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">اسم المنصة</label>
                                <input type="text" name="name" x-model="platformName" placeholder="مثال: Facebook, LinkedIn..."
                                    class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#E60914] transition"
                                    value="{{ old('name') }}">
                                <!-- إظهار خطأ محدد للحقل -->
                                @error('name')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a]">
                                <span class="text-sm text-gray-300">حالة التفعيل</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <!-- أضف value="1" لضمان إرسال القيمة -->
                                    <input type="checkbox" name="is_active" value="1" x-model="platformStatus" class="sr-only peer">
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

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>

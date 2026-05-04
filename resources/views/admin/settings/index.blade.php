<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('System Settings') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        openModal: false,
        editMode: false,
        formAction: '',
        modelName: '',
        currentSection: '',
        selectedProperties: [], // لتخزين IDs الخصائص المختارة

        init() {
            @if ($errors->any())
                this.openModal = true;
            @endif
        },

        openAddModal(section) {
            this.editMode = false;
            this.currentSection = section;
            this.modelName = '';
            this.selectedProperties = []; // تفريغ القائمة

            if(section === 'category') this.formAction = '{{ route('categories.store') }}';
            if(section === 'property') this.formAction = '{{ route('properties.store') }}';
            if(section === 'type') this.formAction = '{{ route('types.store') }}';

            this.openModal = true;
        },

        // التعديل: استقبال قائمة الخصائص (props)
        openEditModal(section, name, url, props = []) {
            this.editMode = true;
            this.currentSection = section;
            this.modelName = name;
            this.formAction = url;
            this.selectedProperties = props; // تعبئة القائمة بالخصائص الحالية
            this.openModal = true;
        },

        // دالة لتبديل حالة الاختيار
        toggleProperty(id) {
            if (this.selectedProperties.includes(id)) {
                this.selectedProperties = this.selectedProperties.filter(item => item !== id);
            } else {
                this.selectedProperties.push(id);
            }
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-400 rounded-lg p-4 text-sm">
                {{ session('status') }}
            </div>
            @endif

            <!-- Header -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-white">إعدادات النظام</h3>
                <p class="text-gray-400 text-sm mt-1">إدارة التصنيفات والخصائص والباقات.</p>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- 1. Categories -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-4 border-b border-[#1a1a1a] flex justify-between items-center bg-[#0a0a0a]">
                        <h4 class="font-bold text-white">التصنيفات</h4>
                        <button @click="openAddModal('category')" class="text-[#E60914] hover:text-red-400 text-sm font-bold">+ إضافة</button>
                    </div>
                    <div class="p-4 space-y-2 max-h-96 overflow-y-auto">
                        @foreach ($categories as $cat)
                        <div class="flex justify-between items-center bg-[#0a0a0a] p-3 rounded-lg">
                            <span class="text-gray-300 text-sm">{{ $cat->name }}</span>
                            <div class="flex items-center gap-1">
                                <button @click="openEditModal('category', @js($cat->name), '{{ route('categories.update', $cat->id) }}')" class="p-2 hover:bg-blue-500/20 rounded-lg text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <form method="POST" action="{{ route('categories.destroy', $cat->id) }}" class="inline" onsubmit="return confirm('Delete?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @if($categories->isEmpty()) <p class="text-center text-gray-600 text-xs py-4">لا توجد تصنيفات</p> @endif
                    </div>
                </div>

                <!-- 2. Properties -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-4 border-b border-[#1a1a1a] flex justify-between items-center bg-[#0a0a0a]">
                        <h4 class="font-bold text-white">الخصائص</h4>
                        <button @click="openAddModal('property')" class="text-[#E60914] hover:text-red-400 text-sm font-bold">+ إضافة</button>
                    </div>
                    <div class="p-4 space-y-2 max-h-96 overflow-y-auto">
                        @foreach ($properties as $prop)
                        <div class="flex justify-between items-center bg-[#0a0a0a] p-3 rounded-lg">
                            <span class="text-gray-300 text-sm">{{ $prop->name }}</span>
                            <div class="flex items-center gap-1">
                                <button @click="openEditModal('property', @js($prop->name), '{{ route('properties.update', $prop->id) }}')" class="p-2 hover:bg-blue-500/20 rounded-lg text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <form method="POST" action="{{ route('properties.destroy', $prop->id) }}" class="inline" onsubmit="return confirm('Delete?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @if($properties->isEmpty()) <p class="text-center text-gray-600 text-xs py-4">لا توجد خصائص</p> @endif
                    </div>
                </div>

                <!-- 3. Types (Packs) - مع عرض الخصائص المرتبطة -->
                <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-4 border-b border-[#1a1a1a] flex justify-between items-center bg-[#0a0a0a]">
                        <h4 class="font-bold text-white">الباقات (Types)</h4>
                        <button @click="openAddModal('type')" class="text-[#E60914] hover:text-red-400 text-sm font-bold">+ إضافة</button>
                    </div>
                    <div class="p-4 space-y-3 max-h-96 overflow-y-auto">
                        @foreach ($types as $type)
                        <div class="bg-[#0a0a0a] p-3 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-white text-sm font-bold">{{ $type->name }}</span>
                                <div class="flex items-center gap-1">
                                    <!-- نمرر قائمة IDs الخصائص للدالة -->
                                    <button @click="openEditModal('type', @js($type->name), '{{ route('types.update', $type->id) }}', {{ $type->properties->pluck('id') }})" class="p-2 hover:bg-blue-500/20 rounded-lg text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form method="POST" action="{{ route('types.destroy', $type->id) }}" class="inline" onsubmit="return confirm('Delete?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg text-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- عرض الخصائص المرتبطة بهذه الباقة -->
                            @if($type->properties->count() > 0)
                            <div class="mt-2 pt-2 border-t border-gray-800 flex flex-wrap gap-1">
                                @foreach($type->properties as $prop)
                                <span class="px-2 py-0.5 bg-sky-500/10 text-sky-400 rounded text-[10px]">{{ $prop->name }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endforeach
                        @if($types->isEmpty()) <p class="text-center text-gray-600 text-xs py-4">لا توجد باقات</p> @endif
                    </div>
                </div>

            </div>
        </div>

        <!-- Universal Modal -->
        <div x-show="openModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="fixed inset-0 bg-black/70 backdrop-blur-sm" @click="openModal = false"></div>

            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl w-full max-w-md p-6 space-y-4 max-h-[90vh] overflow-y-auto">

                    <div class="flex justify-between items-center border-b border-[#1a1a1a] pb-4 sticky top-0 bg-[#111111] z-10">
                        <h3 class="text-xl font-bold text-white" x-text="editMode ? 'تعديل' : 'إضافة جديد'"></h3>
                        <button @click="openModal = false" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 text-red-400 rounded-lg p-3 text-sm">
                        <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                    @endif

                    <form :action="formAction" method="POST">
                        @csrf
                        <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">الاسم</label>
                            <input type="text" name="name" x-model="modelName" placeholder="ادخل الاسم..."
                                class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white focus:outline-none focus:border-[#E60914] transition">
                        </div>

                        <!-- قسم اختيار الخصائص - يظهر فقط عند إضافة أو تعديل الباقة -->
                        <div x-show="currentSection === 'type'" class="mt-4 border-t border-[#1a1a1a] pt-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">اختر الخصائص المتاحة لهذه الباقة</label>
                            <div class="bg-[#0a0a0a] p-3 rounded-lg max-h-48 overflow-y-auto space-y-2 border border-[#1a1a1a]">
                                @foreach ($properties as $prop)
                                <label class="flex items-center gap-3 text-sm text-gray-400 cursor-pointer hover:text-white p-2 hover:bg-white/5 rounded-lg transition">
                                    <input type="checkbox" name="properties[]" value="{{ $prop->id }}"
                                        :checked="selectedProperties.includes({{ $prop->id }})"
                                        @change="toggleProperty({{ $prop->id }})"
                                        class="w-4 h-4 text-[#E60914] bg-gray-700 border-gray-600 rounded focus:ring-[#E60914] focus:ring-2">
                                    <span>{{ $prop->name }}</span>
                                </label>
                                @endforeach
                                @if($properties->isEmpty())
                                <p class="text-xs text-gray-600 text-center py-2">لا توجد خصائص، أضف خصائص أولاً.</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-3 pt-4 border-t border-[#1a1a1a]">
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

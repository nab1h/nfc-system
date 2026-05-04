<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        openModal: false,
        editMode: false,
        formAction: '{{ route('products.store') }}',
        product: { id: '', name: '', title: '', price: '', discount: '', cat_id: '', type_id: '', is_active: true, img_1: '', img_2: '', img_3: '' },

        init() {
            @if ($errors->any())
                this.openModal = true;
            @endif
        },

        openAddModal() {
            this.editMode = false;
            this.formAction = '{{ route('products.store') }}';
            this.product = { id: '', name: '', title: '', price: '', discount: '', cat_id: '', type_id: '', is_active: true, img_1: '', img_2: '', img_3: '' };
            this.openModal = true;
        },

        openEditModal(p) {
            this.editMode = true;
            this.formAction = '{{ route('products.update', 0) }}'.replace(/0+$/, p.id);
            this.product = {
                id: p.id,
                name: p.name,
                title: p.title,
                price: p.price,
                discount: p.discount,
                cat_id: p.cat_id,
                type_id: p.type_id,
                is_active: Boolean(p.is_active),
                img_1: p.img_1,
                img_2: p.img_2,
                img_3: p.img_3
            };
            this.openModal = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
            <div class="mb-4 bg-green-500/10 border border-green-500/20 text-green-400 rounded-lg p-4 text-sm">
                {{ session('status') }}
            </div>
            @endif

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">إدارة المنتجات</h3>
                    <p class="text-gray-400 text-sm mt-1">إضافة وتعديل منتجات المتجر.</p>
                </div>

                <button @click="openAddModal()" class="px-5 py-2.5 bg-[#E60914] hover:bg-red-700 text-white rounded-lg transition flex items-center gap-2 shadow-lg shadow-red-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    إضافة منتج جديد
                </button>
            </div>

            <!-- Table -->
            <div class="bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs uppercase bg-[#0a0a0a] text-gray-500 border-b border-[#1a1a1a]">
                            <tr>
                                <th class="px-6 py-4 w-16">صورة</th>
                                <th class="px-6 py-4">اسم المنتج</th>
                                <th class="px-6 py-4">التصنيف / النوع</th>
                                <th class="px-6 py-4">السعر</th>
                                <th class="px-6 py-4">الحالة</th>
                                <th class="px-6 py-4 text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="bg-[#111111] hover:bg-[#141414] transition border-b border-[#1a1a1a]">
                                <td class="px-6 py-4">
                                    @if($product->img_1)
                                    <img src="{{ asset('storage/' . $product->img_1) }}" class="w-12 h-12 rounded-lg object-cover">
                                    @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-800 flex items-center justify-center text-xs text-gray-600">N/A</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-white">
                                    {{ $product->name }}
                                    <p class="text-xs text-gray-500 mt-1">{{ $product->title }}</p>
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    <span class="text-sky-400">{{ $product->category->name ?? '--' }}</span> /
                                    <span class="text-pink-400">{{ $product->type->name ?? '--' }}</span>
                                </td>
                                <td class="px-6 py-4 font-mono text-green-400">{{ $product->price }} ج.م</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full {{ $product->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                                        {{ $product->is_active ? 'متاح' : 'مخفي' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <!-- Edit -->
                                        <button @click="openEditModal({{ $product }})" class="p-2 hover:bg-blue-500/10 rounded-lg transition text-gray-400 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <!-- Delete -->
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="inline-block" onsubmit="return confirm('هل أنت متأكد؟');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg transition text-gray-400 hover:text-[#E60914]">
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
                <div class="p-4 border-t border-[#1a1a1a]">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="openModal" x-transition.opacity class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="openModal = false"></div>

            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-[#111111] border border-[#1a1a1a] rounded-2xl shadow-2xl w-full max-w-2xl p-6 space-y-4 max-h-[90vh] overflow-y-auto">

                    <div class="flex justify-between items-center border-b border-[#1a1a1a] pb-4 sticky top-0 bg-[#111111] z-10">
                        <h3 class="text-xl font-bold text-white" x-text="editMode ? 'تعديل المنتج' : 'إضافة منتج جديد'"></h3>
                        <button @click="openModal = false" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 text-red-400 rounded-lg p-4 text-sm">
                        <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                    @endif

                    <form :action="formAction" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" :value="editMode ? 'PUT' : 'POST'">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label class="block text-xs text-gray-400 mb-1">اسم المنتج *</label>
                                <input type="text" name="name" x-model="product.name" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2.5 text-white focus:border-[#E60914]" required>
                            </div>

                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label class="block text-xs text-gray-400 mb-1">العنوان الفرعي</label>
                                <input type="text" name="title" x-model="product.title" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2.5 text-white focus:border-[#E60914]">
                            </div>

                            <!-- Category & Type -->
                            <div>
                                <label class="block text-xs text-gray-400 mb-1">التصنيف *</label>
                                <select name="cat_id" x-model="product.cat_id" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2.5 text-white">
                                    <option value="">اختر التصنيف</option>
                                    @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-400 mb-1">النوع (الباقة) *</label>
                                <select name="type_id" x-model="product.type_id" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2.5 text-white">
                                    <option value="">اختر النوع</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Price & Discount -->
                            <div>
                                <label class="block text-xs text-gray-400 mb-1">السعر *</label>
                                <input type="number" step="0.01" name="price" x-model="product.price" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2.5 text-white" required>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-400 mb-1">الخصم</label>
                                <input type="text" name="discount" x-model="product.discount" placeholder="مثال: 10%" class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-2.5 text-white">
                            </div>

                            <!-- Images -->
                            <div>
                                <label class="block text-xs text-gray-400 mb-1">الصورة 1 (رئيسية)</label>
                                <input type="file" name="img_1" accept="image/*" class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#1a1a1a] file:text-white hover:file:bg-[#333]">
                                <template x-if="editMode && product.img_1">
                                    <img :src="'/storage/' + product.img_1" class="w-16 h-16 mt-2 rounded object-cover">
                                </template>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-400 mb-1">الصورة 2</label>
                                <input type="file" name="img_2" accept="image/*" class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#1a1a1a] file:text-white hover:file:bg-[#333]">
                            </div>

                            <div>
                                <label class="block text-xs text-gray-400 mb-1">الصورة 3</label>
                                <input type="file" name="img_3" accept="image/*" class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#1a1a1a] file:text-white hover:file:bg-[#333]">
                            </div>

                            <!-- Status -->
                            <div class="md:col-span-2 flex items-center gap-3 bg-[#0a0a0a] p-3 rounded-lg border border-[#1a1a1a]">
                                <input type="checkbox" name="is_active" value="1" x-model="product.is_active" class="w-4 h-4 accent-[#E60914] rounded">
                                <span class="text-sm text-gray-300">تفعيل المنتج (ظهوره في المتجر)</span>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-3 border-t border-[#1a1a1a] pt-4">
                            <button type="button" @click="openModal = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 transition text-sm">إلغاء</button>
                            <button type="submit" class="px-6 py-2 bg-[#E60914] text-white rounded-lg hover:bg-red-700 transition text-sm font-bold">حفظ المنتج</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>

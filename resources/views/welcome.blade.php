<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVORA Card - بطاقتك الرقمية الذكية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;700;900&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: '#0a0a0a',
                        card: '#111111',
                        border: '#1a1a1a',
                        muted: '#666666',
                        accent: '#E60914',
                        accentLight: '#ff3a46',
                        surface: '#141414',
                    },
                    fontFamily: {
                        display: ['Orbitron', 'sans-serif'],
                        body: ['Tajawal', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed top-0 left-0 right-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="#" class="font-display text-2xl font-bold text-accent"><img src="logo.png" class="h-20" w-auto /></a>

            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="nav-link">المميزات</a>
                <a href="#pricing" class="nav-link">الباقات</a>
                <a href="#contact" class="nav-link">تواصل معنا</a>
            </div>

            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn-primary py-3 px-6 text-sm w-full">
                    <span> تسجيل الخروج</span>
                </button>
            </form>
            @else
            <a href="{{ route('register') }}">
                <button class="btn-primary py-3 px-6 text-sm w-full">
                    <span>احصل على بطاقتك</span>
                </button>
            </a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-20">
        <div class="hero-bg"></div>
        <div class="grid-pattern"></div>
        <div class="particles-container" id="particles"></div>

        <div class="max-w-7xl mx-auto px-6 py-20 grid lg:grid-cols-2 gap-16 items-center relative z-10">
            <!-- Text Content -->
            <div class="text-center lg:text-right">
                <div class="reveal">
                    <span class="inline-block px-4 py-2 rounded-full bg-accent/10 border border-accent/20 text-accent text-sm font-medium mb-6">
                        تقنية NFC المتطورة
                    </span>
                </div>

                <h1 class="reveal delay-1 font-display text-4xl md:text-6xl lg:text-7xl font-black leading-tight mb-6">
                    بطاقتك الرقمية
                    <span class="block text-accent">بلمسة واحدة</span>
                </h1>

                <p class="reveal delay-2 text-muted text-lg md:text-xl leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
                    شارك معلوماتك الاحترافية بلمسة واحدة فقط. بطاقة ذكية بتقنية NFC تناسب رواد الأعمال والمهنيين.
                </p>

                <div class="reveal delay-3 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @auth
                    <a href="{{ route('dashboard') }}">
                        <button class="btn-primary w-full">
                            <span>لوحة التحكم</span>
                        </button>
                    </a>
                    @else
                    <a href="{{ route('login') }}">
                        <button class="btn-primary w-full">
                            <span>تسجيل بيانات</span>
                        </button>
                    </a>
                    @endauth

                </div>

                <!-- Stats -->
                <div class="reveal delay-4 grid grid-cols-3 gap-8 mt-16 pt-8 border-t border-border">
                    <div class="text-center">
                        <div class="stat-number" data-count="5000">0</div>
                        <div class="text-muted text-sm">عميل سعيد</div>
                    </div>
                    <div class="text-center">
                        <div class="stat-number" data-count="150">0</div>
                        <div class="text-muted text-sm">شركة شريكة</div>
                    </div>
                    <div class="text-center">
                        <div class="stat-number" data-count="99">0</div>
                        <div class="text-muted text-sm">% رضا العملاء</div>
                    </div>
                </div>
            </div>

            <!-- NFC Card -->
            <div class="reveal delay-2 flex justify-center">
                <div class="nfc-card-wrapper">
                    <div class="nfc-card" id="nfcCard">
                        <div class="card-face">
                            <div class="card-shine"></div>

                            <div class="flex justify-between items-start relative z-10">
                                <div class="nfc-chip"></div>
                                <span class="font-display text-xl font-bold text-accent">
                                    <img src="logo.png" class="crop" />
                                </span>
                            </div>

                            <div class="mt-4 relative z-10">
                                <div class="text-sm text-muted mb-1">حامل البطاقة</div>
                                <div class="text-lg font-bold">{{ auth()->user()->name ?? 'اسمك' }}</div>
                            </div>

                            <div class="mt-2 relative z-10">
                                <div class="text-sm text-muted mb-1">المنصب</div>
                                <div class="text-accent">{{ auth()->user()->job ?? 'وظيفتك' }}</div>
                            </div>

                            <svg class="nfc-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" />
                                <path d="M12 6c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z" />
                                <circle cx="12" cy="12" r="2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-muted">
                <path d="M12 5v14M5 12l7 7 7-7" />
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="reveal font-display text-3xl md:text-5xl font-black mb-4">
                    لماذا تختار <span class="text-accent">NEXUS</span>
                </h2>
                <p class="reveal delay-1 text-muted text-lg max-w-2xl mx-auto">
                    بطاقة ذكية تجمع بين الأناقة والتقنية لتعزيز حضورك المهني
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="reveal feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">مشاركة فورية</h3>
                    <p class="text-muted leading-relaxed">
                        شارك معلوماتك بلمسة واحدة فقط. لا حاجة للتطبيقات أو الإعدادات المعقدة.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="reveal delay-1 feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <path d="M3 9h18M9 21V9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">تصميم أنيق</h3>
                    <p class="text-muted leading-relaxed">
                        بطاقة بتصميم عصري ومواد عالية الجودة تعكس احترافيتك في كل لقاء.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="reveal delay-2 feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4M12 8h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">لوحة تحكم ذكية</h3>
                    <p class="text-muted leading-relaxed">
                        تحكم كامل في معلوماتك من لوحة تحكم سهلة الاستخدام تحدثها في أي وقت.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="reveal delay-1 feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">خصوصية تامة</h3>
                    <p class="text-muted leading-relaxed">
                        بياناتك محمية بأعلى معايير الأمان. أنت تتحكم في ما يراه الآخرون.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="reveal delay-2 feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">روابط غير محدودة</h3>
                    <p class="text-muted leading-relaxed">
                        أضف روابط لجميع شبكاتك الاجتماعية وموقعك الإلكتروني في بطاقة واحدة.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="reveal delay-3 feature-card">
                    <div class="feature-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="7 10 12 15 17 10" />
                            <line x1="12" y1="15" x2="12" y2="3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">تصدير جهات الاتصال</h3>
                    <p class="text-muted leading-relaxed">
                        احفظ معلوماتك مباشرة في جهات اتصال الهاتف بضغطة واحدة.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-24 relative bg-surface">
        <div class="absolute inset-0 grid-pattern opacity-50"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="reveal font-display text-3xl md:text-5xl font-black mb-4">
                    اختر باقتك
                </h2>
                <p class="reveal delay-1 text-muted text-lg max-w-2xl mx-auto">
                    باقات متنوعة تناسب جميع الاحتياجات والميزانيات
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Basic Plan -->
                <div class="reveal pricing-card">
                    <h3 class="text-xl font-bold mb-2">الباقة الفردية</h3>
                    <p class="text-muted text-sm mb-6">للمبتدئين والمستقلين</p>

                    <div class="mb-6">
                        <span class="font-display text-4xl font-black">299</span>
                        <span class="text-muted">جنية</span>
                    </div>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>بطاقة NFC واحدة</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>صفحة بروفايل شخصية</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>5 روابط خارجية</span>
                        </li>
                        <li class="flex items-center gap-3 text-muted">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                            <span>دعم فني متميز</span>
                        </li>
                    </ul>
                    <a href="{{ route('register') }}">
                        <button class="btn-secondary w-full">ابدأ الآن</button>
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="reveal delay-1 pricing-card featured">
                    <h3 class="text-xl font-bold mb-2">الباقة الاحترافية</h3>
                    <p class="text-muted text-sm mb-6">للرواد والمهنيين</p>

                    <div class="mb-6">
                        <span class="font-display text-4xl font-black text-accent">499</span>
                        <span class="text-muted">جنية</span>
                    </div>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>بطاقتا NFC</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>صفحة بروفايل مخصصة</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>روابط غير محدودة</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>دعم فني على مدار الساعة</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>تحليلات متقدمة</span>
                        </li>
                    </ul>
                    <a href="{{ route('register') }}">
                        <button class="btn-primary w-full">
                            <span>اشترك الآن</span>
                        </button>
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="reveal delay-2 pricing-card">
                    <h3 class="text-xl font-bold mb-2">باقة الشركات</h3>
                    <p class="text-muted text-sm mb-6">للفرق والمؤسسات</p>

                    <div class="mb-6">
                        <span class="font-display text-4xl font-black">999</span>
                        <span class="text-muted">جنية</span>
                    </div>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>5 بطاقات NFC</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>بروفايل موحد للشركة</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>لوحة تحكم مركزية</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>تخصيص العلامة التجارية</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E60914" stroke-width="2">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>مدير حساب مخصص</span>
                        </li>
                    </ul>

                    <a href="{{ route('register') }}">
                        <button class="btn-secondary w-full">ابدأ الآن</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="py-24 relative">
        <div class="hero-bg"></div>

        <div class="max-w-3xl mx-auto px-6 relative z-10">
            <div class="text-center mb-12">
                <h2 class="reveal font-display text-3xl md:text-5xl font-black mb-4">
                    ابدأ رحلتك معنا
                </h2>
                <p class="reveal delay-1 text-muted text-lg">
                    املأ النموذج وسنتواصل معك خلال 24 ساعة
                </p>
            </div>

            <form method="POST" action="{{ route('orders.storeInUser') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Customer Name -> name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">اسم العميل</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="الاسم الكامل" required
                            class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#E60914] focus:ring-1 focus:ring-[#E60914] transition">
                    </div>

                    <!-- Phone Number -> phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">رقم الهاتف</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+20 XX XXX XXXX" required
                            class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#E60914] focus:ring-1 focus:ring-[#E60914] transition">
                    </div>

                    <!-- Whatsup Number -> whatsup -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">رقم الواتساب</label>
                        <input type="tel" name="whatsup" value="{{ old('whatsup') }}" placeholder="+20 XX XXX XXXX"
                            class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#E60914] focus:ring-1 focus:ring-[#E60914] transition">
                    </div>

                    <!-- Email -> email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">البريد الإلكتروني</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com"
                            class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#E60914] focus:ring-1 focus:ring-[#E60914] transition">
                    </div>
                </div>

                <!-- Address -> address -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">العنوان الكامل</label>
                    <textarea name="address" rows="3" placeholder="المدينة، الحي، الشارع، رقم المبنى..." required
                        class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#E60914] focus:ring-1 focus:ring-[#E60914] transition resize-none">{{ old('address') }}</textarea>
                </div>

                <!-- Notes -> msg -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">ملاحظات إضافية</label>
                    <textarea name="msg" rows="2" placeholder="تفاصيل إضافية خاصة بالطلب..."
                        class="w-full bg-[#0a0a0a] border border-[#1a1a1a] rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-[#E60914] focus:ring-1 focus:ring-[#E60914] transition resize-none">{{ old('msg') }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex items-center justify-end gap-4">
                    <a href="{{ route('orders.index') }}" class="px-6 py-2.5 border border-gray-700 text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white transition text-center">
                        إلغاء
                    </a>

                    <button type="submit" class="px-6 py-2.5 bg-[#E60914] hover:bg-red-700 text-white font-bold rounded-lg transition flex items-center gap-2 shadow-lg shadow-red-900/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        حفظ الطلب
                    </button>
                </div>

            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-border">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <span class="font-display text-2xl font-bold text-accent"><img alt="AVORA" src="logo.png" class="h-20" w-auto /></span>
                    <span class="text-muted text-sm">بطاقتك الذكية</span>
                </div>

                <div class="flex items-center gap-6">
                    <a href="#" class="text-muted hover:text-accent transition-colors" aria-label="TikTok">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 8.5c-1.9 0-3.6-.6-5-1.7v8.2c0 3.5-2.8 6.3-6.3 6.3S3.4 18.5 3.4 15s2.8-6.3 6.3-6.3c.4 0 .8 0 1.2.1v3.2c-.4-.1-.8-.2-1.2-.2-1.8 0-3.3 1.5-3.3 3.3S7.9 18.4 9.7 18.4 13 17 13 15.2V2h3.1c.3 2.3 2.2 4.2 4.9 4.4v2.1z" />
                        </svg>
                    </a>
                    <a href="#" class="text-muted hover:text-accent transition-colors" aria-label="Instagram">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="text-muted hover:text-accent transition-colors" aria-label="Facebook">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22 12a10 10 0 1 0-11.5 9.95v-7.05H8v-2.9h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.7-1.6 1.5v1.8H16l-.4 2.9h-2.3v7.05A10 10 0 0 0 22 12z" />
                        </svg>
                    </a>
                </div>

                <div class="text-muted text-sm">
                    جميع الحقوق محفوظة © 2025 AVORA
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize particles
        function createParticles() {
            const container = document.getElementById('particles');
            if (!container) return;

            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 8 + 's';
                particle.style.animationDuration = (6 + Math.random() * 4) + 's';
                container.appendChild(particle);
            }
        }

        // Scroll reveal animation
        function initScrollReveal() {
            const reveals = document.querySelectorAll('.reveal');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            reveals.forEach(reveal => observer.observe(reveal));
        }

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const count = parseInt(target.getAttribute('data-count'));
                        let current = 0;
                        const increment = count / 50;
                        const duration = 2000;
                        const stepTime = duration / 50;

                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= count) {
                                current = count;
                                clearInterval(timer);
                            }
                            target.textContent = Math.floor(current).toLocaleString();
                        }, stepTime);

                        observer.unobserve(target);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach(counter => observer.observe(counter));
        }

        // Card 3D tilt effect
        function initCardTilt() {
            const card = document.getElementById('nfcCard');
            if (!card) return;

            const wrapper = card.parentElement;

            wrapper.addEventListener('mousemove', (e) => {
                const rect = wrapper.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;

                card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(20px)`;
            });

            wrapper.addEventListener('mouseleave', () => {
                card.style.transform = 'rotateX(0) rotateY(0) translateZ(0)';
            });
        }

        // Smooth scroll for nav links
        function initSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }

        // Form submission
        function initForm() {
            const form = document.getElementById('contactForm');
            if (!form) return;

            form.addEventListener('submit', (e) => {
                e.preventDefault();

                const btn = form.querySelector('button[type="submit"]');
                const originalText = btn.innerHTML;

                btn.innerHTML = '<span>جاري الإرسال...</span>';
                btn.disabled = true;

                setTimeout(() => {
                    btn.innerHTML = '<span>تم الإرسال بنجاح</span>';
                    btn.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';

                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.background = '';
                        btn.disabled = false;
                        form.reset();
                    }, 2000);
                }, 1500);
            });
        }

        // Navbar scroll effect
        function initNavbar() {
            const navbar = document.querySelector('.navbar');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.style.background = 'rgba(10, 10, 10, 0.95)';
                } else {
                    navbar.style.background = 'rgba(10, 10, 10, 0.8)';
                }
            });
        }

        // Initialize all
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            initScrollReveal();
            animateCounters();
            initCardTilt();
            initSmoothScroll();
            initForm();
            initNavbar();
        });
    </script>
</body>

</html>

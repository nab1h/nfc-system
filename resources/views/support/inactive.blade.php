<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البطاقة غير متاحة | NFC System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #000000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .glow-effect {
            box-shadow: 0 0 30px rgba(230, 9, 20, 0.2);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-[#111111] rounded-3xl shadow-2xl overflow-hidden border border-[#1a1a1a] text-center p-8 relative">

        <!-- أيقونة الزخرفة العلوية -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#E60914] to-transparent opacity-50"></div>

        <div class="relative z-10">

            <!-- أيقونة الحالة -->
            <div class="mx-auto w-24 h-24 bg-[#0a0a0a] rounded-full flex items-center justify-center mb-6 border border-[#1a1a1a]">
                <i class="fas fa-user-slash text-4xl text-[#E60914]"></i>
            </div>

            <!-- العنوان والوصف -->
            <h1 class="text-2xl font-bold text-white mb-2">البطاقة غير متاحة</h1>
            <p class="text-gray-500 text-sm mb-2">عذراً، هذه البطاقة غير مفعلة حالياً.</p>

            @if(isset($name))
            <p class="text-gray-600 text-xs mb-6">
                المستخدم: <span class="text-gray-400 font-medium">{{ $name }}</span>
            </p>
            @else
            <div class="mb-6"></div>
            @endif

            <!-- رسالة توضيحية -->
            <div class="bg-[#0a0a0a] border border-dashed border-[#1a1a1a] rounded-xl p-4 mb-8">
                <p class="text-gray-400 text-xs leading-relaxed">
                    يرجى التواصل مع الدعم الفني لمعرفة سبب التعطيل أو لتفعيل اشتراكك والحصول على بطاقتك الرقمية.
                </p>
            </div>

            <!-- أزرار التواصل -->
            <div class="space-y-3">

                <!-- زر واتساب -->
                <a href="https://wa.me/201234567890" target="_blank"
                    class="flex items-center justify-center gap-3 w-full bg-[#25D366] hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl transition duration-300 shadow-lg">
                    <i class="fab fa-whatsapp text-xl"></i>
                    <span>تواصل عبر واتساب</span>
                </a>

                <!-- زر الاتصال -->
                <a href="tel:+201234567890"
                    class="flex items-center justify-center gap-3 w-full bg-[#0a0a0a] border border-[#1a1a1a] hover:border-[#E60914] text-white font-bold py-3 px-6 rounded-xl transition duration-300">
                    <i class="fas fa-phone-alt text-[#E60914]"></i>
                    <span>اتصل بنا</span>
                </a>

                <!-- زر الموقع (اختياري) -->
                <a href="/"
                    class="block text-xs text-gray-600 hover:text-[#E60914] transition mt-4">
                    العودة للصفحة الرئيسية
                </a>

            </div>
        </div>

        <!-- ذيل الصفحة -->
        <div class="mt-8 pt-6 border-t border-[#1a1a1a]">
            <p class="text-xs text-gray-700">
                Powered by <span class="font-bold text-gray-500">NFC System</span>
            </p>
        </div>
    </div>

</body>

</html>

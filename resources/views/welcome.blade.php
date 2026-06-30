<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-slate-900 text-slate-100 font-['Figtree'] flex items-center justify-center min-h-screen relative overflow-hidden">

    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600 rounded-full blur-[128px] opacity-20 pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600 rounded-full blur-[128px] opacity-20 pointer-events-none"></div>

    <div class="z-10 max-w-4xl mx-auto px-6 py-12 text-center">
        
        @if (Route::has('login'))
            <div class="absolute top-0 right-0 p-6 text-right z-20">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-slate-400 hover:text-white transition duration-150 ease-in-out">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-slate-400 hover:text-white transition duration-150 ease-in-out">Đăng nhập</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-slate-400 hover:text-white transition duration-150 ease-in-out">Đăng ký</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="flex justify-center mb-8">
            <div class="bg-gradient-to-tr from-blue-500 to-purple-600 p-4 rounded-2xl shadow-lg shadow-indigo-500/30 dynamic-bounce">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>

        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight mb-4 bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">
            Chào mừng đến với <span class="bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Laravel Project</span>
        </h1>
        
        <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed">
            Một khởi đầu tuyệt vời cho ứng dụng của bạn. Giao diện đã được tích hợp sẵn Blade Template, Tailwind CSS và sẵn sàng kết nối Auth.
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-16">
            <a href="#features" class="w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/20 transition-all duration-150 hover:-translate-y-0.5 text-center">
                Khám phá ngay
            </a>
            <a href="https://laravel.com/docs" target="_blank" class="w-full sm:w-auto px-8 py-3.5 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-medium rounded-xl transition-all duration-150 hover:-translate-y-0.5 text-center">
                Tài liệu Laravel
            </a>
        </div>

        <div id="features" class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left pt-10 border-t border-slate-800">
            <div class="p-6 bg-slate-800/50 rounded-xl border border-slate-700/50 hover:border-slate-600 transition-all">
                <h3 class="text-lg font-semibold text-white mb-2 flex items-center gap-2">
                    <span class="text-blue-400">⚡</span> Siêu tốc độ
                </h3>
                <p class="text-sm text-slate-400">Được tối ưu hóa hiệu năng tối đa với Laravel và cấu trúc Blade gọn nhẹ.</p>
            </div>
            <div class="p-6 bg-slate-800/50 rounded-xl border border-slate-700/50 hover:border-slate-600 transition-all">
                <h3 class="text-lg font-semibold text-white mb-2 flex items-center gap-2">
                    <span class="text-purple-400">🎨</span> Tailwind CSS
                </h3>
                <p class="text-sm text-slate-400">Giao diện Darkmode hiện đại, dễ dàng tùy biến giao diện theo ý muốn.</p>
            </div>
            <div class="p-6 bg-slate-800/50 rounded-xl border border-slate-700/50 hover:border-slate-600 transition-all">
                <h3 class="text-lg font-semibold text-white mb-2 flex items-center gap-2">
                    <span class="text-pink-400">🔒</span> Bảo mật cao
                </h3>
                <p class="text-sm text-slate-400">Sẵn sàng tích hợp các tính năng bảo mật, phân quyền hàng đầu của Laravel.</p>
            </div>
        </div>

        <footer class="mt-16 text-sm text-slate-500">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>

    </div>

    <style>
        @keyframes dynamic-bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .dynamic-bounce {
            animation: dynamic-bounce 3s ease-in-out infinite;
        }
    </style>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Đăng nhập - Mediopshopping</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <style>
        .text-primary-dark {
            color: #064c53;
        }

        .bg-input {
            background-color: #eaf3f3;
        }

        .border-input {
            border-color: #82b9ba;
        }

        .btn-gradient {
            background: linear-gradient(90deg, #18b2ab 0%, #8774b9 50%, #f6953f 100%);
        }

        .btn-gradient:hover {
            background: linear-gradient(90deg, #159c96 0%, #7563a3 50%, #de8537 100%);
        }
    </style>
</head>

<body class="bg-[#fcfbf8] min-h-screen flex items-center justify-center font-sans p-4">

    <div class="bg-white max-w-md w-full rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-8">

        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Mediopshopping Logo" class="h-20 object-contain">
        </div>

        <h2 class="text-2xl font-bold text-primary-dark mb-6 text-center">Đăng nhập</h2>



        <form method="POST" action="{{ route('login') }}" class="space-y-5" novalidate>
            @csrf

            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                        class="w-full pl-10 pr-4 py-3 bg-input border border-input rounded-xl text-primary-dark focus:outline-none focus:ring-2 focus:ring-[#18b2ab] placeholder-gray-500"
                        placeholder="Email" required autofocus>
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password"
                        class="w-full pl-10 pr-10 py-3 bg-input border border-input rounded-xl text-primary-dark focus:outline-none focus:ring-2 focus:ring-[#18b2ab] placeholder-gray-500"
                        placeholder="Mật khẩu" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <button type="button" id="toggle-password"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-[#18b2ab] transition">
                        <svg id="eye-icon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>

                @if (session('error'))
                    <div id="error-alert"
                        class="mt-2 flex items-center justify-center gap-2 text-red-500 text-xs font-semibold transition-all duration-500">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm font-semibold text-primary-dark hover:underline">
                        Quên mật khẩu?
                    </a>
                @endif
            </div>

            <button type="submit"
                class="w-full btn-gradient text-white font-semibold py-3 rounded-full shadow-md transition duration-300">
                Đăng nhập
            </button>
        </form>

        <div class="mt-8">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-3 bg-white text-gray-500">Hoặc đăng nhập bằng</span>
                </div>
            </div>

            <div class="mt-6 flex justify-center gap-4">
                <a href="#"
                    class="w-12 h-12 rounded-full flex items-center justify-center border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google">
                </a>
                <a href="#"
                    class="w-12 h-12 rounded-full flex items-center justify-center bg-[#1877F2] hover:bg-[#166fe5] transition shadow-sm">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            Chưa có tài khoản?
            <a href="{{ route('register') }}" class="font-bold text-primary-dark hover:underline">Đăng ký ngay</a>
        </p>
    </div>

    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            if (type === 'text') {
                eyeIcon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
            } else {
                eyeIcon.innerHTML =
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        });
    </script>
</body>

</html>

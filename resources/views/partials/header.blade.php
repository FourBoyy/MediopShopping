<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12">
        </a>

        <div class="hidden md:flex space-x-8 font-semibold text-primary-dark">
            <a href="#" class="hover:text-[#18b2ab]">Trang chủ</a>
            <a href="#" class="hover:text-[#18b2ab]">Sản phẩm</a>
            <a href="#" class="hover:text-[#18b2ab]">Liên hệ</a>
        </div>

<div class="flex items-center gap-4">
    @auth
        <span class="text-primary-dark font-semibold">
            Xin chào, <strong>{{ auth()->user()->username }}</strong>!
        </span>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="text-red-500 font-semibold hover:underline">
                Đăng xuất
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="text-primary-dark font-semibold hover:underline">Đăng nhập</a>
        <a href="{{ route('register') }}" class="btn-gradient text-white px-6 py-2 rounded-full font-semibold shadow-md transition">Đăng ký</a>
    @endauth
</div>

    </div>
</nav>
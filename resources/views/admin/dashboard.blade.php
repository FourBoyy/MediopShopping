<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MediopShopping</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-white flex flex-col hidden md:flex">
            <div class="p-5 text-xl font-bold border-b border-slate-800 tracking-wider">
                MediopShopping
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg bg-blue-600 text-white font-medium">
                    <span>📊</span> <span>Tổng quan</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <span>📦</span> <span>Sản phẩm</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <span>🛒</span> <span>Đơn hàng</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <span>👤</span> <span>Người dùng</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition">
                    <span>⚙️</span> <span>Cài đặt</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800 text-sm text-slate-400">
                Đăng nhập với tư cách: <span class="text-white block font-medium">{{ Auth::user()->username ?? 'Admin' }}</span>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 border-b border-gray-200">
                <h1 class="text-xl font-semibold text-gray-800">Bảng Điều Khiển</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Xin chào, <strong>{{ Auth::user()->username ?? 'Quản trị viên' }}</strong></span>
                    <form action="" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:underline font-medium">
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </header>

            <main class="p-6 space-y-6">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase">Doanh thu tháng này</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">154,200,000 đ</p>
                        </div>
                        <div class="p-3 bg-green-100 text-green-600 rounded-lg text-xl">💰</div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase">Đơn hàng mới</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">1,420</p>
                        </div>
                        <div class="p-3 bg-blue-100 text-blue-600 rounded-lg text-xl">🛍️</div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase">Khách hàng mới</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">+320</p>
                        </div>
                        <div class="p-3 bg-purple-100 text-purple-600 rounded-lg text-xl">👥</div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-xs border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase">Sản phẩm hết hàng</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">12</p>
                        </div>
                        <div class="p-3 bg-red-100 text-red-600 rounded-lg text-xl">⚠️</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-xs border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Đơn hàng gần đây</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 text-gray-400 text-sm font-medium uppercase bg-gray-50">
                                >
                                    <th class="p-3">Khách hàng</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                               @foreach ($name as $user )
                               <tr>
                                   <td class="p-3">{{ $user->username }}</td>
                                </tr
                               @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{ $name->links('pagination::tailwind') }}
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
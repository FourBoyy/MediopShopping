<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Mediopshopping</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-primary-dark { color: #064c53; }
        .bg-input { background-color: #eaf3f3; }
        .btn-gradient {
            background: linear-gradient(90deg, #18b2ab 0%, #8774b9 50%, #f6953f 100%);
        }
        .btn-gradient:hover {
            background: linear-gradient(90deg, #159c96 0%, #7563a3 50%, #de8537 100%);
        }
    </style>
</head>
<body class="bg-[#fcfbf8] text-gray-800 font-sans">

  @include('partials.header'); 

    <main class="max-w-6xl mx-auto px-4 py-16 md:py-24">
        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.05)] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <h1 class="text-4xl md:text-6xl font-extrabold text-primary-dark mb-6 leading-tight">
                    Chào mừng đến với <span class="text-[#18b2ab]">Mediopshopping</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Trải nghiệm mua sắm thông minh với các sản phẩm chất lượng. Đăng ký ngay hôm nay để nhận ưu đãi hấp dẫn dành riêng cho thành viên mới.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="bg-primary-dark text-white px-8 py-4 rounded-full font-bold hover:bg-teal-900 transition shadow-lg">Mua sắm ngay</a>
                    <a href="#" class="border border-gray-300 px-8 py-4 rounded-full font-bold text-gray-700 hover:bg-gray-50 transition">Tìm hiểu thêm</a>
                </div>
            </div>
            
            <div class="w-full md:w-1/2 bg-input rounded-2xl h-64 md:h-96 flex items-center justify-center">
                <span class="text-[#82b9ba] font-bold">Hình ảnh sản phẩm tại đây</span>
            </div>
        </div>
    </main>

@include('partials.footer')

</body>
</html>
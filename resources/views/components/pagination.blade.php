<style>
/* Bỏ dấu chấm tròn của danh sách và xếp hàng ngang */
.custom-pagination .pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    gap: 5px;
}

/* Nút bấm mặc định: Nền trắng, chữ xanh */
.custom-pagination .page-link {
    padding: 8px 12px;
    color: #0d6efd; /* Màu chữ xanh dương */
    background-color: #fff; /* Nền trắng */
    border: 1px solid #dee2e6;
    border-radius: 4px;
    text-decoration: none;
    transition: 0.3s;
}

/* Hiệu ứng khi di chuột vào (Hover): Đổi màu nền nhẹ */
.custom-pagination .page-link:hover {
    background-color: #e9ecef;
    color: #0a58ca;
}

/* Trang hiện tại (Active): Nền xanh, chữ trắng */
.custom-pagination .page-item.active .page-link {
    color: #fff; /* Chữ trắng */
    background-color: #0d6efd; /* Nền xanh dương */
    border-color: #0d6efd;
}

/* Nút bị vô hiệu hóa (Disabled - Prev/Next ở đầu/cuối) */
.custom-pagination .page-item.disabled .page-link {
    color: #6c757d;
    background-color: #fff;
    border-color: #dee2e6;
    pointer-events: none; /* Ngăn click */
    cursor: not-allowed;
}
</style>

@if ($paginator->hasPages())
    <div class="custom-pagination">
        <ul class="pagination">
            
            {{-- Nút Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
                </li>
            @endif

            {{-- Các trang số --}}
            @foreach ($elements as $element)
                {{-- Dấu "..." nếu có quá nhiều trang --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Mảng các link phân trang --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Nút Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Next</span>
                </li>
            @endif
            
        </ul>
    </div>
@endif
<header>
    <div class="notificationBar notificationBar--shop"></div>
    <!-- navbar -->
    <div class="border-b">
        <div class="pt-5">
            <div class="container">
                <div class="flex flex-wrap w-full items-center justify-between">
                    <div class="lg:w-1/6 md:w-1/2 w-2/5">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo/logo.png') }}"
                                alt="logo" />
                        </a>
                    </div>
                    <div class="lg:w-2/5 hidden lg:block">
                        <form method="GET" action="{{ route('products.search') }}" enctype="multipart/form-data">
                            <div class="relative">
                                <label for="searchProducts" class="invisible hidden">Tìm kiếm</label>
                                <input class="border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" type="text" name="keyword" placeholder="Tìm kiếm sản phẩm" />
                                <button class="absolute right-0 top-0 p-3" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-search" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="lg:w-1/5 hidden lg:block">
                        <!-- Button trigger modal -->
                        <button type="button"
                            class="btn inline-flex items-center gap-x-2 bg-transparent text-gray-600 border-gray-300 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300"
                            data-bs-toggle="modal" data-bs-target="#locationModal">
                            <span class="flex items-center gap-1">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-map-pin" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        <path
                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>
                                </span>
                                <span>Địa chỉ</span>
                            </span>
                        </button>
                    </div>
                    <div class="lg:w-1/5 text-end md:w-1/2 w-3/5">
                        <div class="flex gap-7 items-center justify-end">
                            <div>
                                <a href="{{ route('products.wishlist') }}" class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-heart" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                    <span
                                        class="absolute top-0 -mt-1 left-full rounded-full h-5 w-5 -ml-2 bg-green-600 text-white text-center font-semibold text-sm">
                                        {{ $headerData['totalWishList'] }}
                                        <span class="invisible">unread messages</span>
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a href="#!" class="text-gray-600" data-bs-toggle="modal"
                                    data-bs-target="#userModal">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-user" width="22" height="22"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <button type="button" class="text-gray-600 relative" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" role="button" aria-controls="offcanvasRight">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-shopping-bag" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                    </svg>
                                    <span id="cartCount"
                                        class="absolute top-0 -mt-1 left-full rounded-full h-5 w-5 -ml-3 bg-green-600 text-white text-center font-semibold text-sm">
                                        {{ $headerData['totalCart'] }}
                                        <span class="invisible">unread messages</span>
                                    </span>
                                </button>
                            </div>
                            <div class="lg:hidden leading-none">
                                <!-- Button -->
                                <button class="collapsed" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#navbar-default" aria-controls="navbar-default"
                                    aria-label="Toggle navigation">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-menu-2 text-gray-800" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 6l16 0" />
                                        <path d="M4 12l16 0" />
                                        <path d="M4 18l16 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar relative navbar-expand-lg lg:flex lg:flex-wrap items-center content-between text-black navbar-default"
            aria-label="Offcanvas navbar large">
            <div class="max-w-7xl mx-auto w-full xl:px-4 lg:px-0">
                <div class="offcanvas offcanvas-left lg:visible" tabindex="-1" id="navbar-default">
                    <div class="offcanvas-header pb-1">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/logo/logo.png') }}"
                                alt="logo" /></a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                            <img src="{{ asset('assets/clients/images/icons/close.png') }}" width="16">
                        </button>
                    </div>
                    <div class="offcanvas-body lg:flex lg:items-center">
                        <div class="block lg:hidden mb-4">
                            <form method="GET" action="{{ route('products.search') }}" enctype="multipart/form-data">
                                <div class="relative">
                                    <label class="invisible hidden">Tìm kiếm sản phẩm</label>
                                    <input
                                        class="border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" type="text" name="keyword" placeholder="Tìm kiếm sản phẩm" />
                                    <button class="absolute right-0 top-0 p-3" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-search" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="block lg:hidden mb-4">
                            <a class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center"
                                data-bs-toggle="collapse" href="#collapseExample" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-layout-grid" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </span>
                                Danh mục sản phẩm
                            </a>
                            <div class="collapse mt-2" id="collapseExample">
                                <div class="card card-body">
                                    <ul class="list-unstyled">
                                        @foreach ($headerData['categories'] as $category)
                                        <li><a class="dropdown-item" href="{{ route('products.category',$category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown hidden lg:block">
                            <button
                                class="mr-4 btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-layout-grid" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </span>
                                Danh mục sản phẩm
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($headerData['categories'] as $category)
                                <li><a class="dropdown-item" href="{{ route('products.category',$category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <ul class="navbar-nav lg:flex gap-3 lg:items-center">
                                <li class="nav-item dropdown w-full lg:w-auto">
                                    <a class="nav-link " href="{{ route('home') }}" role="button">Home</a>

                                </li>
                                <li class="nav-item dropdown w-full lg:w-auto">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Dropdown Menu</a>
                                    <ul class="dropdown-menu">

                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                Dropdown Link

                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                Dropdown Link

                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                Dropdown Link

                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                Dropdown Link

                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown w-full lg:w-auto dropdown-fullwidth">
                                    <a class="nav-link " href="{{ route('products.list') }}">Sản phẩm
                                    </a>
                                </li>

                                <li class="nav-item dropdown w-full lg:w-auto dropdown-fullwidth">
                                    <a class="nav-link " href="{{ route('aboutUs') }}">Giới thiệu
                                    </a>
                                </li>

                                <li class="nav-item dropdown w-full lg:w-auto dropdown-fullwidth">
                                    <a class="nav-link " href="{{ route('ourNew') }}">Tin tức
                                    </a>
                                </li>

                                <li class="nav-item dropdown w-full lg:w-auto dropdown-fullwidth">
                                    <a class="nav-link " href="{{ route('contact') }}">Liên hệ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Shop Cart -->
<div class="offcanvas offcanvas-right" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-b">
        <div>
            <h5 id="offcanvasRightLabel">Giỏ hàng</h5>
            @auth
            <span>Địa chỉ giỏ hàng: 382480</span>
            @endauth
        </div>
        <button type="button" class="btn-close text-inherit" data-bs-dismiss="offcanvas" aria-label="Close">
            <img src="{{ asset('assets/clients/images/icons/close.png') }}" width="16">
        </button>
    </div>
    <div class="offcanvas-body p-4">
        <div>
            <!-- alert -->
            <div class="bg-red-500 bg-opacity-25 text-red-800 mb-3 rounded-lg p-4" role="alert">Bạn được giao hàng MIỄN PHÍ.
                <a href="#!" class="alert-link">Bắt đầu thanh toán ngay!</a>
            </div>
            @auth
            <ul class="list-none">
                <form method="POST" action="{{ route('products.carts.update') }}">
                    @csrf
                    @method('PUT')
                    @foreach ($headerData['carts'] as $index => $cart)
                    <!-- list group -->
                    <li class="py-3 border-t">
                        <div class="flex items-center">
                            <div class="w-1/2 md:w-1/2 lg:w-3/5">
                                <div class="flex">
                                    <img src="{{ $cart->image }}" alt="ảnh sản phẩm"
                                        class="w-16 h-16" />
                                    <div class="ml-3">
                                        <!-- title -->
                                        <a href="{{ route('products.detail', $cart->slug) }}" class="text-inherit">
                                            <h6>{{ $cart->name }}</h6>
                                        </a>
                                        <span><small class="text-gray-500">{{ $cart->unit_name }}</small></span>
                                        <!-- text -->
                                        <div class="mt-2 small leading-none">
                                            <button class="text-green-600 flex items-center" type="submit" name="btn_delete" value="{{ $cart->id }}">
                                                <span class="mr-1 align-text-bottom">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="14"
                                                        height="14" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </span>
                                                <span class="text-gray-500 text-sm">Xóa</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- input group -->
                            <div class="input-group input-spinner rounded-lg flex justify-between items-center">
                                <input type="button" value="-"
                                    class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
                                    data-field="cart[{{$cart->id}}][quantity]" />
                                <input type="number" step="1" max="10" value="{{ $cart->quantity }}" name="cart[{{$cart->id}}][quantity]"
                                    class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
                                <input type="button" value="+"
                                    class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
                                    data-field="cart[{{$cart->id}}][quantity]" />
                            </div>
                            <!-- price -->
                            <div class="w-1/4 text-center md:w-1/4">
                                @if ($cart->discount > 0)
                                <span class="font-bold text-red-600">{{ number_format($cart->sub_total, 0, ',', '.') }}đ</span>
                                <div class="line-through text-gray-500 small">{{ number_format($cart->retail_price * $cart->quantity, 0, ',', '.') }}đ</div>
                                @else
                                <span class="font-bold text-gray-800">{{ number_format($cart->sub_total, 0, ',', '.') }}đ</span>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <li class="py-3 border-t">
                        <div class="d-flex justify-between">
                            <button type="submit" name="btn_update" value="update" class="btn inline-flex items-center gap-x-2 bg-yellow-300 text-white">
                                Cập nhật giỏ hàng
                            </button>
                            <x-cart-total :carts="$headerData['carts']" />
                        </div>
                    </li>
                </form>
            </ul>
            <!-- btn -->
            <div class="flex justify-between mt-4">
                <a href="#!">
                    <button data-bs-toggle="offcanvas" class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                        Thanh toán
                    </button>
                </a>
                <a href="{{ route('products.list') }}">
                    <button data-bs-toggle="offcanvas" class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                        Tiếp tục mua hàng
                    </button>
                </a>
            </div>
            @else
            <!-- btn -->
            <div class="justify-between mt-4">
                <p class="mb-2">Bạn chưa đăng nhập?</p>
                <a href="{{ route('login') }}">
                    <button
                        data-bs-toggle="offcanvas"
                        class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                        Đăng nhập
                    </button>
                </a>
            </div>
            @endauth
        </div>
    </div>
</div>
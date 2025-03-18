<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->

@endsection

@section('title')
FoodMart
@endsection
@section('content')

<main>
    <section class="mt-8">
        <div class="container">
            <div class="swiper-container swiper" id="swiper-1" data-pagination-type="" data-speed="400"
                data-space-between="100" data-pagination="true" data-navigation="false" data-autoplay="true"
                data-autoplay-delay="3000" data-effect="fade"
                data-breakpoints='{"480": {"slidesPerView": 1}, "768": {"slidesPerView": 1}, "1024": {"slidesPerView": 1}}'>
                <div class="swiper-wrapper pb-8">
                    <div class="swiper-slide"
                        style="background: url(assets/clients/images/slider/slide-1.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                        <div class="lg:py-32 p-12 lg:pl-12 xl:w-2/5 md:w-3/5">
                            <span
                                class="inline-block p-2 text-sm align-baseline leading-none rounded-lg bg-yellow-500 text-gray-900 font-semibold">Khuyến mại khai trương giảm giá 50%</span>
                            <div class="my-7 flex flex-col gap-2">
                                <h1 class="text-gray-900 text-xl lg:text-5xl font-bold leading-tight">Siêu thị thực phẩm tươi sống</h1>
                                <p class="text-md font-light">Giới thiệu mô hình mới cho việc mua sắm hàng tạp hóa trực tuyến và
                                    giao hàng tận nhà
                                    tiện lợi.</p>
                            </div>
                            <a href="{{ route('products.list') }}"
                                class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                Mua ngay
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14"
                                    height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide"
                        style="background: url(assets/clients/images/slider/slider-2.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                        <div class="lg:py-32 lg:pl-12 lg:pr-6 px-12 py-12 xl:w-2/5 md:w-3/5">
                            <span
                                class="inline-block p-2 text-sm align-baseline leading-none rounded-lg bg-yellow-500 text-gray-900 font-semibold">Miễn phí vận chuyển trong nội thành</span>
                            <div class="my-7 flex flex-col gap-2">
                                <h2 class="text-gray-900 text-xl lg:text-5xl font-bold leading-tight">
                                    Free-ship đơn trên
                                    <span class="text-green-600">1.000.000vnđ</span>
                                </h2>
                                <p class="text-md font-light">Miễn phí vận chuyển chỉ dành cho khách hàng lần đầu, sau khi các chương trình khuyến mãi áp dụng.</p>
                            </div>
                            <a href="{{ route('products.list') }}"
                                class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                Mua ngay
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14"
                                    height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Add more slides as needed -->
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination !bottom-14"></div>
                <!-- Add Navigation -->
                <div class="swiper-navigation">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full">
                    <h2 class="text-lg absolute z-10">Danh mục nổi bật</h2>
                </div>
            </div>
            <div class="swiper-container swiper" id="swiper-1" data-pagination-type="" data-speed="400"
                data-space-between="20" data-pagination="false" data-navigation="true" data-autoplay="true"
                data-autoplay-delay="3000" data-effect="slide"
                data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 6}}'>
                <div class="swiper-wrapper py-12">
                    @foreach ($categories as $index => $category)
                    <div class="swiper-slide">
                        <a href="{{ route('products.category',$category->slug) }}">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ $category->image }}"
                                        alt="logo-danh-muc-san-pham" class="mb-3 m-auto" />
                                    <div class="text-base">{{ $category->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <!-- Add more slides as needed -->
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-navigation">
                    <div class="swiper-button-next top-[28px]"></div>
                    <div class="swiper-button-prev top-[28px] !right-0 !left-auto mx-10"></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flex md:space-x-2 lg:space-x-6 flex-wrap md:flex-nowrap">
                <div class="w-full md:w-1/2 mb-3 lg:">
                    <div class="py-10 px-8 rounded-lg"
                        style="background: url(assets/clients/images/banner/grocery-banner.png) no-repeat; background-size: cover; background-position: center">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="font-bold text-xl">Trái cây & Rau củ</h2>
                                <p>
                                    Giảm giá lên đến
                                    <span class="font-bold text-gray-800">30%</span>
                                </p>
                            </div>

                            <div class="flex flex-wrap">
                                <a href="{{ route('products.list') }}"
                                    class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="py-10 px-8 rounded-lg"
                        style="background: url(assets/clients/images/banner/grocery-banner-2.jpg) no-repeat; background-size: cover; background-position: center">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="font-bold text-xl">Bánh mì & Sữa</h2>
                                <p>
                                    Giảm giá lên đến
                                    <span class="font-bold text-gray-800">25%</span>
                                </p>
                            </div>

                            <div class="flex flex-wrap">
                                <a href="{{ route('products.list') }}"
                                    class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Products Start-->
    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full mb-6">
                    <h2 class="text-lg">Sản phẩm nổi bật</h2>
                </div>
            </div>

            <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:gap-4 xl:grid-cols-5">

                @foreach ($products as $index => $product)
                <div class="relative rounded-lg break-words border bg-white border-gray-300 card-product">
                    <div class="flex-auto p-4">
                        <div class="text-center relative flex justify-center">
                            @if ($product->discount > 0)
                            <div class="absolute top-0 left-0">
                                <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-red-600 text-white">Sale</span>
                            </div>
                            @endif
                            <a href="{{ route('products.detail' , $product->slug) }}"><img src="{{ $product->image }}"
                                    alt="ảnh sản phẩm" class="w-full" style="height:210px" /></a>

                            <div class="absolute w-full bottom-[15%] opacity-0 invisible card-product-action">
                                <form method="POST" action="{{ route('products.wishlist.store' , $product->slug) }}">
                                    @csrf
                                    <a href="{{ route('products.detail' , $product->slug) }}"
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Chi tiết">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path
                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </span>
                                    </a>
                                    <button
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Yêu thích" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-heart" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <a href="{{ route('products.category',$product->category_slug) }}" class="text-decoration-none text-gray-500"><small>{{ $product->category_name }}</small></a>
                            <div class="flex flex-col gap-2">
                                <h3 class="text-base truncate"><a href="{{ route('products.detail', $product->slug) }}">{{ $product->name }}</a></h3>
                                <div class="flex items-center">
                                    <div class="flex flex-row gap-3">
                                        <small class="text-yellow-500 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-half-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                        </small>
                                        <div class="flex flex-row gap-1">
                                            <span class="text-gray-500 text-sm">4.5</span>
                                            <span class="text-gray-500 text-sm">{{ $index+15 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    @if($product->discount > 0)
                                    <span class="text-gray-900 font-semibold">{{ number_format($product->retail_price - $product->discount, 0, ',', '.') }} vnđ</span>
                                    <span class="line-through text-gray-500">{{ number_format($product->retail_price, 0, ',', '.') }}</span>
                                    @else
                                    <span class="text-gray-900 font-semibold">{{ number_format($product->retail_price, 0, ',', '.') }} vnđ</span>
                                    @endif
                                </div>
                                <div>
                                    <form method="POST" action="{{ route('products.carts.store', $product->slug) }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn inline-flex items-center gap-x-1 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-plus" width="14" height="14"
                                                viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                            <span>Thêm</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Popular Products End-->

    <section>
        <div class="container">
            <div class="flex flex-wrap">
                <div class="md:w-full mb-6">
                    <h2 class="text-lg">Sản phẩm bán chạy</h2>
                </div>
            </div>
            <div class="block w-full overflow-x-auto scrolling-touch pb-6">
                <div class="xl:grid gap-4 grid-cols-1 md:grid-cols-2 xl:grid-cols-4 flex-nowrap flex">
                    <div class="flex-0 block w-full md:w-auto">
                        <div class="pt-8 px-6 rounded-lg"
                            style="background: url(assets/clients/images/banner/banner-deal.jpg) no-repeat; background-size: cover;background-position: center; height: 470px">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-lg text-white">100% Hạt cà phê hữu cơ.</h3>
                                    <p class="text-white text-base">Nhận được ưu đãi tốt nhất.</p>
                                </div>
                                <div>
                                    <a href="{{ route('products.list') }}"
                                        class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                        <span>Mua ngay</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-arrow-right" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l14 0"></path>
                                                <path d="M13 18l6 -6"></path>
                                                <path d="M13 6l6 6"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($topSellingProducts as $index => $topSellingProduct)
                    <div class="flex-0 block w-full md:w-auto">
                        <div
                            class="relative flex flex-col min-w-0 rounded-lg break-words border bg-white border-gray-300 card-product">
                            <div class="flex-auto p-4">
                                <div class="text-center relative flex justify-center">
                                    @if ($topSellingProduct->discount > 0)
                                    <div class="absolute top-0 left-0">
                                        <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-red-600 text-white">Sale</span>
                                    </div>
                                    @endif
                                    <a href="{{ route('products.detail', $topSellingProduct->slug) }}"><img src="{{ $topSellingProduct->image }}"
                                            alt="ảnh sản phẩm"
                                            class="mb-3 m-auto max-w-full" style="height:220px" /></a>
                                    <div class="absolute w-full bottom-[15%] opacity-0 invisible card-product-action">
                                        <form method="POST" action="{{ route('products.wishlist.store' , $topSellingProduct->slug) }}">
                                            @csrf
                                            <a href="{{ route('products.detail' , $topSellingProduct->slug) }}"
                                                class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                                data-bs-toggle="tooltip" data-bs-html="true" title="Chi tiết">
                                                <span data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-eye" width="16" height="16"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                        <path
                                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <button
                                                class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                                data-bs-toggle="tooltip" data-bs-html="true" title="Yêu thích" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-heart" width="16" height="16"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <a href="#!" class="text-decoration-none text-gray-500"><small>{{ $topSellingProduct->category->name }}</small></a>
                                    <div class="flex flex-col gap-2">
                                        <h3 class="text-base truncate"><a href="{{ route('products.detail', $topSellingProduct->slug) }}">{{ $topSellingProduct->name }}</a></h3>

                                        <div class="flex justify-between items-center">
                                            <div>
                                                @if($topSellingProduct->discount > 0)
                                                <span class="text-gray-900 font-semibold">{{ number_format($topSellingProduct->retail_price - $topSellingProduct->discount, 0, ',', '.') }} vnđ</span>
                                                <span class="line-through text-gray-500">{{ number_format($topSellingProduct->retail_price, 0, ',', '.') }}</span>
                                                @else
                                                <span class="text-gray-900 font-semibold">{{ number_format($topSellingProduct->retail_price, 0, ',', '.') }} vnđ</span>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="flex items-center">
                                                    <small class="text-yellow-500 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-star-filled"
                                                            width="14" height="14" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                                stroke-width="0" fill="currentColor" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-star-filled"
                                                            width="14" height="14" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                                stroke-width="0" fill="currentColor" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-star-filled"
                                                            width="14" height="14" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                                stroke-width="0" fill="currentColor" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-star-filled"
                                                            width="14" height="14" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                                stroke-width="0" fill="currentColor" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-star-half-filled"
                                                            width="14" height="14" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                                                stroke-width="0" fill="currentColor" />
                                                        </svg>
                                                    </small>
                                                    <span class="text-gray-700 text-sm ml-2">4.5</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid text-center">
                                        <form method="POST" action="{{ route('products.carts.store', $topSellingProduct->slug) }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-plus" width="14" height="14"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 5l0 14"></path>
                                                    <path d="M5 12l14 0"></path>
                                                </svg>
                                                <span class="ml-1">Thêm vào giỏ hàng</span>
                                            </button>
                                    </div>
                                    </form>
                                    <div class="flex justify-start text-center">
                                        <div class="deals-countdown w-full" data-countdown="2028/10/10 00:00:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="flex flex-wrap gap-y-6">
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/clients/images/icons/clock.svg') }}" alt="" /></div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">10 phút mua sắm ngay bây giờ</h3>
                            <p>Nhận đơn hàng giao đến tận nhà sớm nhất từ ​​các cửa hàng FoodMart gần bạn.</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/clients/images/icons/gift.svg') }}" alt="" /></div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">Giá tốt nhất và ưu đãi</h3>
                            <p>Giá rẻ hơn siêu thị địa phương của bạn, ưu đãi hoàn tiền tuyệt vời. Nhận giá và ưu đãi tốt nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/clients/images/icons/package.svg') }}" alt="" /></div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">Sự đa dạng</h3>
                            <p>Chọn từ hơn 500 sản phẩm thuộc các danh mục thực phẩm, gia dụng, bánh mì, rau, củ quả & các loại khác.</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/clients/images/icons/refresh-cw.svg') }}" alt="" /></div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">Trả hàng dễ dàng</h3>
                            <p>Không hài lòng với sản phẩm? Trả lại tại cửa và được hoàn lại tiền trong vòng vài giờ. Không cần lo ngại về
                                <a href="#!" class="text-green-600">chính sách</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('js')

@endsection(js)
<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->

@endsection

@section('title')
Giới thiệu
@endsection
@section('content')

<main>
    <div class="mt-8">
        <section>
            <div class="container mb-5">
                <div class="flex flex-wrap md:space-x-2 lg:space-x-6 md:flex-nowrap">
                    <div class="w-full lg:w-1/2 mb-3">
                        <h2>Tương lai của dịch vụ <br>giao hàng tạp hóa<span class="text-green-600"> FoodMart</span></h2>
                        <div class="flex justify-content-between flex-wrap mt-3">
                            <div class="flex w-full md:w-1/2">
                                <div class="w:1/2 md:w-1/5 mr-2">
                                    <div class="list-icon">
                                        <img class="list-icon-img" src="{{ asset('assets/clients/images/about/icon/icons8-shipping-50.png') }}">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <h3 class="box-section-title">Giao hàng tận nhà</h3>
                                    <p class="box-section-text">Dịch vụ ship hàng tại Giao Hàng Nhanh. Chuyển phát nhanh hơn 6 tiếng. Gửi hàng tận nhà, uy tín, tiết kiệm.</p>
                                </div>
                            </div>
                            <div class="flex w-full md:w-1/2">
                                <div class="w:1/2 md:w-1/5 mr-2">
                                    <div class="list-icon">
                                        <img class="list-icon-img" src="{{ asset('assets/clients/images/about/icon/icons8-call-50.png') }}">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <h3 class="box-section-title">Gía tốt nhất</h3>
                                    <p class="box-section-text">Giá sản phẩm mới quyết định sự tăng trưởng về doanh thu, giữ chân khách hàng và xây dựng danh tiếng của một thương hiệu.</p>
                                </div>
                            </div>
                            <div class="flex w-full md:w-1/2">
                                <div class="w:1/2 md:w-1/5 mr-2">
                                    <div class="list-icon">
                                        <img class="list-icon-img" src="{{ asset('assets/clients/images/about/icon/icons8-refund-50.png') }}">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <h3 class="box-section-title">Dịch vụ hoàn trả</h3>
                                    <p>Dịch vụ đổi hàng Viettel Post là giải pháp được cung cấp bởi FoodMart, giúp khách hàng thực hiện việc hoàn trả hoặc đổi sản phẩm.</p>
                                </div>
                            </div>
                            <div class="flex w-full md:w-1/2">
                                <div class="w:1/2 md:w-1/5 mr-2">
                                    <div class="list-icon">
                                        <img class="list-icon-img" src="{{ asset('assets/clients/images/about/icon/icons8-call-50.png') }}">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <h3 class="box-section-title">Hỗ trợ 24/7</h3>
                                    <p>Hỗ trợ khách hàng là quá trình cung cấp sự trợ giúp, tư vấn và giải quyết các vấn đề mà khách hàng gặp phải.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="flex flex-col gap-5">
                            <img src="{{ asset('assets/clients/images/about/feature-bg.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="shop-banner" style="background-image: url('assets/clients/images/about/banner.jpg');width:100%;height:auto;background-repeat: no-repeat;background-size: cover;background-position: center;">
        <div class="container">
            <div class="py-12">
                <h2>Khuyến mại tháng 12 đang diễn ra!<br>với mức<span class="active"> giảm giá lớn</span></h2>
                <div class="sale-percent">
                    <span class="inline-block p-2 text-sm align-baseline leading-none rounded-lg bg-yellow-500 text-gray-900 font-semibold mb-3 mt-3">Khuyến mại lên tới 50%</span>
                </div>
                <a href="#!" class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                    Mua ngay
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M13 18l6 -6"></path>
                        <path d="M13 6l6 6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <section class="py-12">
        <div class="container">
            <div class="flex md:space-x-2 lg:space-x-6 flex-wrap md:flex-nowrap">
                <div class="w-full md:w-1/2 mb-3 lg:">
                    <div class="py-10 px-8 rounded-lg" style="background: url(assets/clients/images/banner/slide-1.jpg) no-repeat; background-size: cover; background-position: center">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="font-bold text-xl">Trái cây &amp; Rau củ</h2>
                                <p>
                                    Giảm giá lên đến
                                    <span class="font-bold text-gray-800">30%</span>
                                </p>
                            </div>

                            <div class="flex flex-wrap">
                                <a href="" class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="py-10 px-8 rounded-lg" style="background: url(assets/clients/images/banner/slide-2.jpg) no-repeat; background-size: cover; background-position: center">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="font-bold text-xl">Bánh mì &amp; Sữa</h2>
                                <p>
                                    Giảm giá lên đến
                                    <span class="font-bold text-gray-800">25%</span>
                                </p>
                            </div>

                            <div class="flex flex-wrap">
                                <a href="" class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Mua ngay
                                </a>
                            </div>
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
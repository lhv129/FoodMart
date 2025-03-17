<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Theme CSS -->


@endsection

@section('title')
Chi tiết sản phẩm
@endsection

@section('content')


<!-- Product section-->
<main>
    <div class="mt-8">
        <div class="container">
            <div class="modal-content">
                <div class="modal-body p-8">
                    <div class="absolute top-0 right-0 p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />

                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="md:w-1/2">
                            <!-- img slide -->
                            <div class="product productModal" id="productModal">
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url('{{ $product->image }}')">
                                    <!-- img -->
                                    <!-- img -->
                                    <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                </div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url('{{ $product->image }}')">
                                    <!-- img -->
                                    <!-- img -->
                                    <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                </div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url('{{ $product->image }}')">
                                    <!-- img -->
                                    <!-- img -->
                                    <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                </div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url('{{ $product->image }}')">
                                    <!-- img -->
                                    <!-- img -->
                                    <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                </div>
                            </div>
                            <!-- product tools -->
                            <div class="product-tools">
                                <div class="thumbnails flex gap-3" id="productModalThumbnails">
                                    <div class="w-1/4">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                        </div>
                                    </div>
                                    <div class="w-1/4">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                        </div>
                                    </div>
                                    <div class="w-1/4">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                        </div>
                                    </div>
                                    <div class="w-1/4">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ $product->image }}" alt="ảnh sản phẩm" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/2 pr-4 pl-4">
                            <div class="lg:pl-10 mt-6 md:mt-0">
                                <div class="flex flex-col gap-4">
                                    <!-- content -->
                                    <a href="#!" class="block text-green-600">{{ $product->category_name }}</a>
                                    <!-- heading -->
                                    <h1>{{ $product->name }}</h1>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center">
                                            <!-- rating -->
                                            <!-- rating -->
                                            <small class="text-yellow-500 inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                    height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                        stroke-width="0" fill="currentColor"></path>
                                                </svg>
                                            </small>
                                            <a href="#" class="text-green-600">(30 reviews)</a>
                                        </div>
                                        <div class="text-md">
                                            @if ($product->discount > 0 && $product->retail_price > 0)
                                            <span class="text-gray-900 font-semibold">{{ number_format($product->retail_price - $product->discount, 0, ',', '.') }}vnđ</span>
                                            <span class="line-through text-gray-500">{{ number_format($product->retail_price, 0, ',', '.') }}vnđ</span>
                                            <span><small class="text-red-600">{{ round(($product->discount / $product->retail_price) * 100) }}% Off</small></span>
                                            <span class="text-gray-900 font-semibold">/ {{ $product->unit_name }}</span>
                                            @else
                                            <span class="text-gray-900 font-semibold">{{ number_format($product->retail_price, 0, ',', '.') }}vnđ / {{ $product->unit_name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- hr -->
                                    <div class="flex flex-col gap-6">
                                        <hr />
                                        @if($product->quantity > 0)
                                        <div>
                                            <!-- input -->
                                            <div class="w-1/3 md:w-1/4 lg:w-1/5">
                                                <!-- input -->
                                                <div
                                                    class="input-group input-spinner rounded-lg flex justify-between items-center">
                                                    <input type="button" value="-"
                                                        class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
                                                        data-field="quantity" />
                                                    <input type="number" step="1" max="10" value="1" name="quantity"
                                                        class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
                                                    <input type="button" value="+"
                                                        class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
                                                        data-field="quantity" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap justify-start gap-2 items-center">
                                            <div class="lg:w-1/3 md:w-2/5 w-full grid">
                                                <!-- button -->
                                                <!-- btn -->
                                                <button type="button"
                                                    class="btn bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-plus mr-2" width="12"
                                                        height="12" viewBox="0 0 24 24" stroke-width="3"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 5l0 14"></path>
                                                        <path d="M5 12l14 0"></path>
                                                    </svg>
                                                    Thêm vào giỏ
                                                </button>
                                            </div>
                                            @endif
                                            <div class="md:w-1/3 w-full">
                                                <!-- btn -->
                                                <a href="#"
                                                    class="mr-1 btn inline-flex items-center gap-x-2 px-0 h-10 w-10 justify-center bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-arrows-exchange" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 10h14l-4 -4"></path>
                                                        <path d="M17 14h-14l4 4"></path>
                                                    </svg>
                                                </a>
                                                <a href="#"
                                                    class="btn inline-flex items-center gap-x-2 px-0 h-10 w-10 justify-center bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-heart" width="20"
                                                        height="20" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- hr -->
                                        <hr />
                                    </div>
                                    <div>
                                        <!-- table -->
                                        <table class="text-left w-full">
                                            <tbody>
                                                <tr>
                                                    <td class="px-6 py-3">Tình trạng:</td>
                                                    <td class="px-6 py-3">{{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-3">Danh mục:</td>
                                                    <td class="px-6 py-3">{{ $product->category_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-3">Giao hàng:</td>
                                                    <td class="px-6 py-3">
                                                        <small>
                                                            Giao hàng trong 01 ngày.
                                                            <span class="text-gray-700">( Nhận hàng miễn phí hôm nay)</span>
                                                        </small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <!-- dropdown -->
                                        <div class="relative">
                                            <a class="dropdown-toggle btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Chia sẻ
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-brand-facebook inline-block"
                                                            width="18" height="18" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                                        </svg>
                                                        Facebook
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-brand-x" width="18"
                                                            height="18" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                                        </svg>
                                                        Twitter
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-brand-instagram"
                                                            width="18" height="18" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M16.5 7.5l0 .01" />
                                                        </svg>
                                                        Instagram
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="mt-lg-14 mt-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn -->
                            <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">
                                Mô tả sản phẩm
                            </button>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn -->
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false" tabindex="-1">
                                Thông tin thêm
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <!-- btn -->
                            <button class="nav-link" id="sellerInfo-tab" data-bs-toggle="tab" data-bs-target="#sellerInfo-tab-pane" type="button" role="tab" aria-controls="sellerInfo-tab-pane" aria-selected="false" disabled="" tabindex="-1">
                                Thông tin người bán
                            </button>
                        </li>
                    </ul>
                    <!-- tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- tab pane -->
                        <div class="tab-pane fade active show" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                            <div class="my-8">
                                <div class="mb-5">
                                    <!-- text -->
                                    <h4 class="mb-1">{{ $product->name }}</h4>
                                    <p class="mb-0">
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div class="mb-5">
                                    <h5 class="mb-1">Mẹo bảo quản</h5>
                                    <p class="mb-0">
                                        1.Hút chân không. Phương pháp hút chân không sẽ giúp kéo dài thời gian bảo quản thực phẩm lâu hơn...<br>
                                        2.Sấy khô...<br>
                                        3.Xếp chồng lên nhau, giữ nguyên bao bì.<br>
                                        4.Cho vào hộp đựng thực phẩm.<br>
                                        5.Chọn loại hộp phù hợp.<br>
                                        6.Các loại thực phẩm khô khác nhau sẽ có thời hạn sử dụng trung bình khác nhau. Mốc thời gian sẽ khác biệt và thay đổi tùy thuộc vào hoàn cảnh và điều kiện bảo quản. Trung bình, thực phẩm khô có thể bảo quản được từ 4 - 12 tháng.<br>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="my-8">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-4">Details</h4>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <table class="table table-striped">
                                            <!-- table -->
                                            <tbody>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>1000 Grams</td>
                                                </tr>
                                                <tr>
                                                    <th>Ingredient Type</th>
                                                    <td>Vegetarian</td>
                                                </tr>
                                                <tr>
                                                    <th>Brand</th>
                                                    <td>Dmart</td>
                                                </tr>
                                                <tr>
                                                    <th>Item Package Quantity</th>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <th>Form</th>
                                                    <td>Larry the Bird</td>
                                                </tr>
                                                <tr>
                                                    <th>Manufacturer</th>
                                                    <td>Dmart</td>
                                                </tr>
                                                <tr>
                                                    <th>Net Quantity</th>
                                                    <td>340.0 Gram</td>
                                                </tr>
                                                <tr>
                                                    <th>Product Dimensions</th>
                                                    <td>9.6 x 7.49 x 18.49 cm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <table class="table table-striped">
                                            <!-- table -->
                                            <tbody>
                                                <tr>
                                                    <th>ASIN</th>
                                                    <td>SB0025UJ75W</td>
                                                </tr>
                                                <tr>
                                                    <th>Best Sellers Rank</th>
                                                    <td>#2 in Fruits</td>
                                                </tr>
                                                <tr>
                                                    <th>Date First Available</th>
                                                    <td>30 April 2022</td>
                                                </tr>
                                                <tr>
                                                    <th>Item Weight</th>
                                                    <td>500g</td>
                                                </tr>
                                                <tr>
                                                    <th>Generic Name</th>
                                                    <td>Banana Robusta</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Related Items Start-->
    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full mb-6">
                    <h2 class="text-lg">Sản phẩm liên quan</h2>
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
                                <a href=""
                                    class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                    data-bs-toggle="tooltip" data-bs-html="true" title="Yêu thích">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-heart" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <a href="#!" class="text-decoration-none text-gray-500"><small>{{ $product->category_name }}</small></a>
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
                                    <button type="button"
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Popular Related Items End-->    
</main>


@endsection

@section('js')
@endsection(js)
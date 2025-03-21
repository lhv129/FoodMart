<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('title')
Chi tiết đơn đặt hàng
@endsection
@section('content')

<main>
    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="checkout-section">
                <div class="row justify-between">
                    <div class="checkout-accordion-wrap">
                        <div class="card-single-accordion">
                            <div class="bg-gray py-4 px-5">
                                <button class="flex" type="button" onclick="card()"><i class="fa fa-address-card-o mr-3" style="font-size: 24px;"></i>
                                    <h5>Thông tin mua hàng</h5>
                                </button>
                            </div>
                            <div class="card-body one">
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="mb-2 block text-gray-800">Họ và tên</label>
                                        <input type="text" value="{{ $order->customer }}" name="customer" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" readonly>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="flex md:space-x-2 lg:space-x-6 flex-wrap md:flex-nowrap">
                                        <!-- Form Group (phone name)-->
                                        <div class="w-full md:w-1/2 mb-3 lg:">
                                            <label class="mb-2 block text-gray-800">Số điện thoại</label>
                                            <input type="number" value="{{ $order->phone }}" name="phone" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" readonly>

                                        </div>
                                        <!-- Form Group (address)-->
                                        <div class="w-full md:w-1/2">
                                            <label class="mb-2 block text-gray-800">Địa chỉ</label>
                                            <input type="text" value="{{ $order->address }}" name="address" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" readonly>

                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="mb-2 block text-gray-800">Email</label>
                                        <input type="text" value="{{ $order->email }}" name="email" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2 block text-gray-800">Ghi chú</label>
                                        <textarea type="text" name="note" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" readonly>{{ $order->note }}</textarea>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="card-single-accordion">
                            <div class="bg-gray py-4 px-5">
                                <button class="flex" type="button" onclick="card2()"><i class='fa fa-credit-card mr-3' style='font-size:24px'></i>
                                    <h5>Phương thức thanh toán</h5>
                                </button>
                            </div>
                            <div class="card-body two">
                                <div class="flex">
                                    <div class="mr-4">
                                        @if ($order->payment_method_id == 1)
                                        <i class="fas fa-money-bill-alt" style="font-size: 16px;"></i> {{ $order->payment_method_name }} <br> <br>
                                        @elseif ($order->payment_method_id == 2)
                                        <i class="fas fa-university" style="font-size: 16px;"></i> {{ $order->payment_method_name }} <br> <br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-single-accordion">
                            <div class="bg-gray py-4 px-5">
                                <button class="flex" type="button" onclick="card3()"><i class='fas fa-file-invoice mr-3' style='font-size:24px'></i>
                                    <h5>Chi tiết đơn hàng</h5>
                                </button>
                            </div>
                            <div class="card-body three">
                                <div class="table-responsive">
                                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable card-body" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead class="text-center" style="background-color: #efefef;">
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 102px;">Ảnh sản phẩm</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tên sản phẩm</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Gía bán</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Số lượng</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Đơn giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($orderDetails as $index => $detail)
                                                    <tr class="odd" style="border-bottom: 1px solid #ecf0ef">
                                                        <td>
                                                            <a href="{{ route('products.detail' , $detail->slug) }}">
                                                                <img src="{{ asset($detail->image) }}" alt="Ảnh sản phẩm" width="150px">
                                                            </a>
                                                        </td>
                                                        <td class="truncate" style="max-width: 200px">
                                                            <a href="{{ route('products.detail' , $detail->slug) }}">
                                                                {{ $detail->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{ number_format($detail->retail_price, 0, ',', '.') }}đ / {{ $detail->unit_name }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($detail->quantity, 0, ',', '.') }} {{ $detail->unit_name }}
                                                        </td>
                                                        <td>
                                                            <!-- price -->
                                                            @if ($detail->discount > 0)
                                                            <span class="font-bold text-red-600">{{ number_format($detail->sub_total, 0, ',', '.') }}đ</span>
                                                            <div class="line-through text-gray-500 small">{{ number_format($detail->retail_price * $detail->quantity, 0, ',', '.') }}đ</div>
                                                            @else
                                                            <span class="font-bold text-gray-800">{{ number_format($detail->sub_total, 0, ',', '.') }}đ</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Chi tiết đơn hàng</th>
                                    <th>Gía</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Đơn giá</td>
                                    <td>
                                        {{ number_format($totalAmount, 0, ',', '.') }} vnđ
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phí ship</td>
                                    <td>0đ</td>
                                </tr>
                                <tr>
                                    <td>Thành tiền</td>
                                    <td>{{ number_format($totalAmount, 0, ',', '.') }} vnđ</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('oder.list') }}">
                            <button type="submit" class="w-full md:w-1/3 btn inline-flex items-center mt-3 gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                Quay lại
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('js')
<!-- Model Cart -->
<script src="{{ asset('assets/clients/js/checkout.js') }}"></script>
@endsection(js)
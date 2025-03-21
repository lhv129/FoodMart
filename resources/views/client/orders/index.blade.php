<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Xác nhận đơn đặt hàng
@endsection
@section('content')

<main>
    <section class="lg:my-14 my-8">
        <div class="container">
            <!-- Page Heading -->
            <div class="my-8">
                <h3 class="text-gray-800">Danh sách sản phẩm</h3>
            </div>
            <!-- DataTales Example -->
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead class="text-center" style="background-color: #d8dbda;">
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 102px;">Ảnh sản phẩm</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tên sản phẩm</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Trạng thái</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Gía bán</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Số lượng</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Đơn giá</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Xóa</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <form method="POST" action="{{ route('products.carts.update') }}">
                                    @csrf
                                    @method('PUT')
                                    @php
                                    $check = false;
                                    @endphp
                                    @foreach ($carts as $index => $cart)
                                    <tr class="odd"  style="border-bottom: 1px solid #ecf0ef">
                                        <td>
                                            <a href="{{ route('products.detail' , $cart->slug) }}">
                                                <img src="{{ asset($cart->image) }}" alt="Ảnh sản phẩm" width="150px">
                                            </a>
                                        </td>
                                        <td class="truncate" style="max-width: 200px">
                                            <a href="{{ route('products.detail' , $cart->slug) }}">
                                                {{ $cart->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <p class="badge {{ $cart->warehouse_quantity > 0 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $cart->warehouse_quantity > 0 ? 'Còn Hàng' : 'Hết hàng' }}
                                                @if ($cart->quantity > $cart->warehouse_quantity)
                                                @php
                                                $check=true;
                                                @endphp
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            {{ number_format($cart->retail_price, 0, ',', '.') }}đ / {{ $cart->unit_name }}
                                        </td>
                                        <td class="justify-center">
                                            <!-- input group -->
                                            <div class="input-group input-spinner rounded-lg flex justify-center items-center mx-auto">
                                                <input type="button" value="-"
                                                    class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
                                                    data-field="cart[{{$cart->id}}][quantity]" />
                                                <input type="number" step="1" value="{{ $cart->quantity }}" name="cart[{{$cart->id}}][quantity]"
                                                    class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
                                                <input type="button" value="+"
                                                    class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
                                                    data-field="cart[{{$cart->id}}][quantity]" />
                                            </div>
                                        </td>
                                        <td>
                                            <!-- price -->
                                            @if ($cart->discount > 0)
                                            <span class="font-bold text-red-600">{{ number_format($cart->sub_total, 0, ',', '.') }}đ</span>
                                            <div class="line-through text-gray-500 small">{{ number_format($cart->retail_price * $cart->quantity, 0, ',', '.') }}đ</div>
                                            @else
                                            <span class="font-bold text-gray-800">{{ number_format($cart->sub_total, 0, ',', '.') }}đ</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="submit" name="btn_delete" value="{{ $cart->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="1" class="font-bold text-gray-800">Tổng tiền:</td>
                                        <td>
                                            <x-cart-total :carts="$carts" />
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2" class="text-right">
                                            <button type="submit" name="btn_update" value="update" class="btn inline-flex items-center gap-x-2 bg-yellow-300 text-white">
                                                Cập nhật giỏ hàng
                                            </button>
                                        </td>
                                        <td colspan="2" class="text-left">
                                            @if($check === false)
                                            <a href="{{ route('order') }}">
                                                <button type="button" name="btn_update" value="update" class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                                                    Thanh toán
                                                </button>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                        {{ $carts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('js')

@endsection(js)
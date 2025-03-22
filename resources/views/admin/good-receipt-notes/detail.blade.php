<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
<link href="{{ asset('assets/admins/css/import-detail.css') }}" rel="stylesheet">
@endsection

@section('title')
Đơn nhập hàng
@endsection

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết hóa đơn</h1>
        <button onclick="inNoiDung()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50 mr-2"></i>In hóa đơn</button>
    </div>
    @if($goodReceiptNote->status === 'Pending')
    <form method="POST" action="{{ route('admin.goods.confirm', $goodReceiptNote->code) }}">
        @csrf
        @method('PUT')
        <div class="mt-3 mb-3">
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class='fas fa-shipping-fast text-white-50 mr-2'></i>
                Xác nhận đơn hàng
            </button>
        </div>
    </form>
    @endif
    <div class="row" id="noiDungIn">
        <div class="col-xxl-9 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="title mb-1">Mã đơn hàng: {{ $goodReceiptNote->code }}</h4>
                            <div class="d-flex align-items-center">
                                <small>Ngày nhập: {{ $goodReceiptNote->created_at }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <tbody>
                                <tr>
                                    <td>Nhà cung cấp:</td>
                                    <td>{{ $goodReceiptNote->supplier_name }}</td>
                                </tr>
                                <tr>
                                    <td>Người đặt:</td>
                                    <td>{{ $goodReceiptNote->user_name }}</td>
                                </tr>
                                <tr>
                                    <td>Phương thức thanh toán:</td>
                                    <td>{{ $goodReceiptNote->payment_method_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table text-nowrap mb-0 table-centered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Đơn vị</th>
                                    <th scope="col">Đơn giá</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">{{ number_format($goodReceiptNote->total_price, 0, ',', '.') }} vnđ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($goodReceiptNoteDetail as $index => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->image }}" alt="ảnh sản phẩm" style="width:100px">
                                            <div class="ms-3">
                                                <h5 class="mb-0">{{ $item->product_name }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit_name }}</td>
                                    <td>{{ number_format($item->sub_total, 0, ',', '.') }} vnđ</td>
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

@endsection

@section('js')

<script src="{{ asset('assets/admins/js/app.js') }}"></script>

@endsection(js)
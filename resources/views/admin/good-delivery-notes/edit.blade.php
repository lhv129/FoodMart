<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Đơn bán hàng
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa đơn bán hàng</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="mt-2">Chi tiết đơn hàng</h5>
            <form class="col-xl-4 col-lg-5 col-md-6 col-12" method="POST" enctype="multipart/form-data" action="{{ route('admin.delivery.details.edit.update', $goodDeliveryNote->id ) }}">
                @csrf
                <div class="form-group">
                    <label>Sản phẩm</label>
                    <select class="form-control" name="product_id">
                        @foreach ($products as $index => $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Số lượng</label>
                    <div class="d-flex">
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng" value="{{ old('quantity') }}">
                        <button type="submit" class="btn btn-success ml-2">Tạo</button>
                    </div>
                    @error("quantity")
                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
            </form>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead class="text-center">
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Sản phẩm</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Số lượng</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Đơn vị</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Thành tiền</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tfoot class="text-center">
                                    <tr>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1">Tổng giá</th>
                                        <th rowspan="1" colspan="1">{{ number_format($goodDeliveryNote->total_price, 0, ',', '.') }} vnđ</th>
                                        <th rowspan="1" colspan="1"></th>
                                    </tr>
                                </tfoot>
                                <tbody class="text-center">
                                    @foreach ($goodDeliveryNoteDetail as $index => $item)
                                    <tr class="odd">
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->unit_name }}</td>
                                        <td>{{ number_format($item->sub_total, 0, ',', '.') }} vnđ</td>
                                        <!-- {{-- Thẻ td cuối cùng --}} -->
                                        <td @if ($loop->last) class="" @else class="text-center" @endif>
                                            <form method="POST" action="{{ route('admin.delivery.details.edit', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mb-1">Xóa<i class="ml-1 fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
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
        <div class="card-body">
            <h4>Tạo phiếu</h4>
            <div class="row">
                <form class="col-xl-4 col-lg-5 col-md-6 col-12" method="POST" enctype="multipart/form-data" action="{{ route('admin.delivery.update', $goodDeliveryNote->code) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Người tạo đơn</label>
                        <select class="form-control" name="user_id">
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="customer" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('customer') ? old('customer') : $goodDeliveryNote->customer }}">
                        @error("customer")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phương thức thanh toán</label>
                        <select class="form-control" name="payment_method_id">
                            @foreach ($payments as $index => $payment_method)
                            <option value="{{ $payment_method->id }}" {{ old('payment_method_id') == $payment_method->id ? 'selected' : '' }} @if ($payment_method->id == $goodDeliveryNote->payment_method_id) selected @endif>
                                {{ $payment_method->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')



@endsection(js)
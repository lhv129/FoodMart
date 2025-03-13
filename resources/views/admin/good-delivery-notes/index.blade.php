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
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn bán hàng</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-12 ml-auto text-right mb-2">
                            <!-- Topbar Search -->
                            <form
                                class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead class="text-center">
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 102px;">Số TT</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Mã đơn</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Nhân viên</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Khách hàng</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Phương thức thanh toán</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tổng giá</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Thời gian</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($deliveries as $index => $delivery)
                                    <tr class="odd">
                                        <td class="sorting_1">{{$index+1}}</td>
                                        <td>{{ $delivery->code }}</td>
                                        <td>{{ $delivery->user_name }}</td>
                                        <td>{{ $delivery->customer }}</td>
                                        <td>{{ $delivery->payment_method_name }}</td>
                                        <td>{{ number_format($delivery->total_price, 0, ',', '.') }} vnđ</td>
                                        <td>{{ $delivery->created_at }}</td>
                                        <!-- {{-- Thẻ td cuối cùng --}} -->
                                        <td @if ($loop->last) class="" @else class="text-center" @endif>
                                            @if($delivery->status === 'Success')
                                            <a href="{{ route('admin.delivery.detail' , $delivery->code) }}" type="button" class="btn btn-primary mb-1">Chi tiết</a>
                                            @endif
                                            @if($delivery->status === 'Pending')
                                            <a href="{{ route('admin.delivery.confirm', $delivery->id) }}" type="button" class="btn btn-primary mb-1">Xác nhận</a>
                                            <a href="{{ route('admin.delivery.edit', $delivery->id) }}" type="button" class="btn btn-warning mb-1">Chỉnh sửa</a>
                                            <form method="POST" action="{{ route('admin.delivery.delete', $delivery->code) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $deliveries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')



@endsection(js)
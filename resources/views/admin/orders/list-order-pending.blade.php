<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('title')
Đơn đặt hàng
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn chờ xử lý</h1>
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Khách hàng</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Ngày đặt</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Phương thức thanh toán</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tổng giá</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tình trạng đơn</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($orders as $index => $order)
                                    <tr class="odd">
                                        <td class="sorting_1">{{$index+1}}</td>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->customer }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td style="width:150px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                            <span class="badge text-white {{ $order->payment_method_name === 'Tiền mặt' ? 'bg-info' : 'bg-success' }}">{{ $order->payment_method_name }}</span>
                                        </td>
                                        <td>{{ number_format($order->total_price, 0, ',', '.') }} ₫</td>
                                        <td>
                                            <span class="badge bg-warning text-white">{{ $order->status === 'Pending' ? 'Đang chờ xử lý' : 'Đã thanh toán & chờ xử lý'}}</span>
                                        </td>
                                        <!-- {{-- Thẻ td cuối cùng --}} -->
                                        <td @if ($loop->last) class="" @else class="text-center" @endif>


                                            @if($order->status === 'Paid')
                                            <div class="d-flex justify-content-center">
                                                <form method="POST" action="{{ route('admin.orders.confirm', $order->code) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" style="color: #4e73df;border:none;background-color:white" class="ml-1 mr-1">
                                                        <i class='fas fa-shipping-fast'></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.orders.detail', $order->code) }}" class="ml-3 mr-3"><i class="fa fa-eye"></i></a>
                                                <form method="POST" action="{{ route('admin.orders.delete', $order->code) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ml-1 mr-1" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn không?')">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @else
                                            <div class="d-flex justify-content-center">
                                                <form method="POST" action="{{ route('admin.orders.confirm', $order->code) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" style="color: #4e73df;border:none;background-color:white" class="ml-1 mr-1">
                                                        <i class='fas fa-shipping-fast'></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.orders.detail', $order->code) }}" class="ml-3 mr-3"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.orders.edit',$order->code) }}" class="ml-3 mr-3" type="submit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.orders.delete', $order->code) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ml-1 mr-1" style="color: #4e73df;border:none;background-color:white" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn không?')">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
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
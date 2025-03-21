<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('title')
Đơn nhập hàng
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn nhập hàng</h1>
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Nhà cung cấp</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Người tạo phiếu</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Phương thức thanh toán</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tổng giá</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Thời gian</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($goods as $index => $good)
                                    <tr class="odd">
                                        <td class="sorting_1">{{$index+1}}</td>
                                        <td>{{ $good->code }}</td>
                                        <td>{{ $good->supplier_name }}</td>
                                        <td>{{ $good->user_name }}</td>
                                        <td>
                                            @if($good->payment_method_name === 'Tiền mặt')
                                                <span class="badge text-white bg-info">{{ $good->payment_method_name }}</span>
                                            @elseif($good->payment_method_name === 'Chuyển khoản')
                                            <span class="badge text-white bg-primary">{{ $good->payment_method_name }}</span>
                                            @else
                                            <span class="badge text-white bg-success">{{ $good->payment_method_name }}</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($good->total_price, 0, ',', '.') }} vnđ</td>
                                        <td>{{ $good->created_at }}</td>
                                        <!-- {{-- Thẻ td cuối cùng --}} -->
                                        <td @if ($loop->last) class="" @else class="text-center" @endif>

                                            <div class="d-flex justify-content-center">
                                                @if($good->status === 'Success')
                                                <a href="{{ route('admin.goods.detail' , $good->code) }}" class="ml-2 mr-2" type="submit" name="btn-edit">
                                                    <button type="button" style="color: #4e73df;border:none;background-color:white">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>
                                                @endif
                                                @if($good->status === 'Pending')
                                                <form method="POST" action="{{ route('admin.goods.confirm', $good->code) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" style="color: #4e73df;border:none;background-color:white">
                                                        <i class="fa fa-check-circle" style="font-size: 17px;"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.goods.edit', $good->code) }}" class="ml-2 mr-2" type="submit" name="btn-edit">
                                                    <button type="button" style="color: #4e73df;border:none;background-color:white">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ route('admin.goods.delete', $good->code) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="color: #4e73df;border:none;background-color:white" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="ml-2 mr-2">
                                                        <i class="fa fa-trash-o" style="font-size: 17px;"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $goods->links() }}
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
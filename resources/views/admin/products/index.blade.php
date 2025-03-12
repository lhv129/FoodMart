<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Sản phẩm
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tên sản phẩm</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Danh mục</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Gía nhập</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Gía bán</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Đơn vị</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Mô tả</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($products as $index => $product)
                                    <tr class="odd">
                                        <td class="sorting_1">{{$index+1}}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" alt="Ảnh sản phẩm" width="100px">
                                        </td>
                                        <td>{{ number_format($product->entry_price, 0, ',', '.') }} vnđ</td>
                                        <td>{{ number_format($product->retail_price, 0, ',', '.') }} vnđ</td>
                                        <td>{{ $product->unit_name }}</td>
                                        <td>
                                            <div style="width:150px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $product->description }}</div>
                                        </td>
                                        <!-- {{-- Thẻ td cuối cùng --}} -->
                                        <td @if ($loop->last) class="" @else class="text-center" @endif>
                                            <form method="POST" action="{{ route('admin.products.delete', $product->slug) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.products.edit', $product->slug) }}"><button type="button" class="btn btn-primary mb-1">Sửa<i class="ml-1 fas fa-edit"></i></button></a>
                                                <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa<i class="ml-1 fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
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
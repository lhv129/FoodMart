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
    <h1 class="h3 mb-2 text-gray-800">Thêm mới danh mục sản phẩm</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <form class="col-xl-4 col-lg-5 col-md-6 col-12" method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" value="{{ old('name') }}">
                        @error("name")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Vd: Thành công thì nhập slug là thanh-cong" value="{{ old('slug') }}">
                        @error("slug")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')



@endsection(js)
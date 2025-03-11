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
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa sản phẩm</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                @if(session('uploaded_image'))
                <img src="{{ asset(session('uploaded_image')) }}" alt="Ảnh đã tải lên" style="max-width: 200px;">
                @endif
                <form class="col-xl-4 col-lg-5 col-md-6 col-12" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', ['id' => $product->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $index => $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                        @error("name")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control-file">
                        @error('image')
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Đơn vị</label>
                        <select class="form-control" name="unit_id">
                            @foreach ($units as $index => $unit)
                            <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        @error('unit_id')
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gía nhập</label>
                        <input type="number" name="entry_price" class="form-control" placeholder="Gía nhập sản phẩm" value="{{ old('entry_price') }}">
                        @error("entry_price")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gía bán</label>
                        <input type="number" name="retail_price" class="form-control" placeholder="Vd: Dâu tây thì nhập là dau-tay" value="{{ old('retail_price') }}">
                        @error("retail_price")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Vd: Dâu tây thì nhập là dau-tay" value="{{ old('slug') }}">
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
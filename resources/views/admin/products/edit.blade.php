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
                    @method('PUT')
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $index => $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} @if ($category->id == $product->category_id) selected @endif>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') ? old('name') : $product->name }}">
                        @error("name")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh sản phẩm</label>
                        <img src="{{ asset($product->image) }}" alt="Hình ảnh sản phẩm" width="150px">
                        <input type="file" name="image" class="form-control-file">
                        @error('image')
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Đơn vị</label>
                        <select class="form-control" name="unit_id">
                            @foreach ($units as $index => $unit)
                            <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }} @if ($unit->id == $product->unit_id) selected @endif>{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        @error('unit_id')
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gía nhập</label>
                        <input type="number" name="entry_price" class="form-control" placeholder="Gía nhập sản phẩm" value="{{ old('entry_price') ? old('entry_price') : $product->entry_price }}">
                        @error("entry_price")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gía bán</label>
                        <input type="number" name="retail_price" class="form-control" placeholder="Gía bán sản phẩm" value="{{ old('retail_price') ? old('retail_price') : $product->retail_price }}">
                        @error("retail_price")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Giảm giá</label>
                        <input type="number" name="discount" class="form-control" placeholder="Gía giảm của sản phẩm" value="{{ old('discount') ? old('discount') : $product->discount }}">
                        @error("discount")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả sản phẩm</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Mô tả sản phẩm">{{ old('description') ? old('description') : $product->description }}</textarea>
                        @error('description')
                        <i class="at-2 fas fa-exclamation-triangle text-danger" style="font-size: 11px;" aria-hidden="true"></i><span class="pl-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')



@endsection(js)
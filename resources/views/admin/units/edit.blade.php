<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Đơn vị
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa đơn vị</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <form class="col-xl-4 col-lg-5 col-md-6 col-12" method="POST" enctype="multipart/form-data" action="{{ route('admin.units.update', ['id' => $unit->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tên đơn vị</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên đơn vị" value="{{ old('name') ?? $unit->name }}">
                        @error("name")
                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
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
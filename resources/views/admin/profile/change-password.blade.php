<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Hồ sơ cá nhân
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thay đổi mật khẩu</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('profile.change.password', Auth::user()->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Thông tin cá nhân</div>
                            <div class="card-body">
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Mật khẩu cũ</label>
                                    <input class="form-control" type="password" placeholder="Vui lòng nhập mật khẩu cũ" value="{{ old('old_password') }}" name="old_password">
                                    @error('old_password')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Mật khẩu mới</label>
                                    <input class="form-control" type="password" placeholder="Vui lòng nhập mật khẩu mới" value="{{ old('password') }}" name="password">
                                    @error('password')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Xác mật khẩu mới</label>
                                    <input class="form-control" type="password" placeholder="Vui lòng nhập mật khẩu" value="{{ old('password_confirm') }}" name="password_confirm">
                                    @error('password_confirm')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-success" type="submit">Lưu thay đổi</button>
                                <a href="{{ route('admin.profile') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection

@section('js')



@endsection(js)
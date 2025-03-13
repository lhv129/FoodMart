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
    <h1 class="h3 mb-2 text-gray-800">Hồ sơ cá nhân</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.update', Auth::user()->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Ảnh đại diện</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2" src="{{ Auth::user()->avatar }}" alt="ảnh đại diện" width="200">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG hoặc PNG không lớn hơn 5 MB</div>
                                <div class="small font-italic text-muted mb-4">
                                    <input type="file" name="avatar">
                                    @error('avatar')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Thông tin cá nhân</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1">Họ và tên</label>
                                        <input class="form-control" type="text" placeholder="Vui lòng nhập họ tên" value="{{ Auth::user()->name }}" name="name">
                                        @error('name')
                                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Số điện thoại</label>
                                            <input class="form-control" type="text" placeholder="Vui lòng nhập số điện thoại" value="{{ Auth::user()->phone }}" name="phone">
                                            @error('phone')
                                            <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>
                                        <!-- Form Group (address)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Địa chỉ</label>
                                            <input class="form-control" type="text" placeholder="Vui lòng nhập địa chỉ" value="{{ Auth::user()->address }}" name="address">
                                            @error('address')
                                            <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1">Email address</label>
                                        <input class="form-control" type="text" placeholder="Vui lòng nhập email" value="{{ Auth::user()->email }}" name="email">
                                        @error('email')
                                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1">Ngày sinh</label>
                                        <input class="form-control" type="date" placeholder="Vui lòng nhập ngày sinh" value="{{ Auth::user()->birthday }}" name="birthday">
                                        @error('birthday')
                                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-danger" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Chức vụ</label>
                                            <select class="form-control" disabled>
                                                <option value="1" {{ Auth::user()->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                                <option value="2" {{ Auth::user()->role_id == 2 ? 'selected' : '' }}>Nhân viên</option>
                                            </select>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Trạng thái</label>
                                            <select class="form-control" disabled>
                                                <option value="inactive" {{ Auth::user()->status == 'inactive' ? 'selected' : '' }}>Chưa kích hoạt</option>
                                                <option value="active" {{ Auth::user()->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                                <option value="block" {{ Auth::user()->status == 'block' ? 'selected' : '' }}>Bị khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-success" type="submit">Lưu thay đổi</button>
                                    <a href="{{ route('admin.profile.change') }}" class="btn btn-primary">Đổi mật khẩu</a>
                                </form>
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
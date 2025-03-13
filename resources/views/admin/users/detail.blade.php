<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Thông tin người dùng
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Ảnh đại diện</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2" src="{{ $user->avatar }}" alt="ảnh đại diện" width="200">
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
                                        <input class="form-control" type="text" placeholder="Vui lòng nhập họ tên" value="{{ $user->name }}" name="name" disabled>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Số điện thoại</label>
                                            <input class="form-control" type="text" placeholder="Vui lòng nhập số điện thoại" value="{{ $user->phone }}" name="phone" disabled>
                                        </div>
                                        <!-- Form Group (address)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Địa chỉ</label>
                                            <input class="form-control" type="text" placeholder="Vui lòng nhập địa chỉ" value="{{ $user->address }}" name="address" disabled>
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1">Email address</label>
                                        <input class="form-control" type="text" placeholder="Vui lòng nhập email" value="{{ $user->email }}" name="email" disabled>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1">Ngày sinh</label>
                                        <input class="form-control" type="date" placeholder="Vui lòng nhập ngày sinh" value="{{ $user->birthday }}" name="birthday" disabled>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Chức vụ</label>
                                            <select class="form-control" disabled>
                                                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Nhân viên</option>
                                            </select>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Trạng thái</label>
                                            <select class="form-control" disabled>
                                                <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Chưa kích hoạt</option>
                                                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                                <option value="block" {{ $user->status == 'block' ? 'selected' : '' }}>Bị khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <a href="{{ route('admin.users') }}"><button class="btn btn-primary" type="button">Quay lại</button></a>
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
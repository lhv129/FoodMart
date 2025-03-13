<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Người dùng
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý người dùng</h1>
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
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Họ và tên</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Số điện thoại</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Địa chỉ</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Ngày sinh</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức vụ</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Trạng thái</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($users as $index => $user)
                                    <tr class="odd">
                                        <td class="sorting_1">{{$index+1}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <div style="width:150px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $user->address }}</div>
                                        </td>
                                        <td>{{ $user->birthday }}</td>
                                        <td>
                                            <form method="POST" action=" {{ route('admin.users.update.role',['id' => $user->id]) }} ">
                                                @csrf
                                                @method('PUT')
                                                <select class="changeRole border-0 badge" name="role_id">
                                                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }} class="border-0 badge">Admin</option>
                                                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }} class="border-0 badge">Staff</option>
                                                    <option value="3" class="border-0 badge">Member</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.users.update.status',['id' => $user->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="{{ $user->status == 'active' ? 'block' : 'active' }}">
                                                <button type="submit" class="border-0 badge {{ $user->status == 'active' ? 'badge-primary' : 'badge-danger' }}">
                                                    {{ $user->status }}
                                                </button>
                                            </form>
                                        </td>
                                        <td @if ($loop->last) class="" @else class="text-center" @endif>
                                            <form method="POST" action="{{ route('admin.users.delete', ['id' => $user->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.users.staff.detail', ['id' => $user->id]) }}"><button type="button" class="btn btn-primary mb-1">Chi tiết<i class="ml-1 fas fa-edit"></i></button></a>
                                                <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Bạn có muốn xóa không?')">Xóa<i class="ml-1 fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script src="{{ asset('assets/js/app.js') }}"></script>

@endsection(js)
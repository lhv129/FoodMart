<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Theme CSS -->


@endsection

@section('title')
Hồ sơ cá nhân
@endsection

@section('content')


<main>
    <section class="lg:my-14 my-8">
        <div class="container">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Hồ sơ cá nhân</h1>
            <!-- DataTales Example -->

            <form method="POST" enctype="multipart/form-data" action="{{ route('profile.change.password', Auth::user()->id) }}">
                @csrf
                @method('PUT')
                <div class="w-full md:w-1/2">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Thông tin cá nhân</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (old_password)-->
                                <div class="mb-3">
                                    <label class="mb-2 block text-gray-800">Mật khẩu cũ</label>
                                    <input type="password" value="{{ old('old_password') }}" name="old_password" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập mật khẩu cũ">
                                    @error('old_password')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                    @enderror
                                </div>

                                <!-- Form Group (new_password)-->
                                <div class="mb-3">
                                    <label class="mb-2 block text-gray-800">Mật khẩu mới</label>
                                    <input type="password" value="{{ old('password') }}" name="password" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập mật khẩu cũ">
                                    @error('password')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 block text-gray-800">Nhập lại mật khẩu mới</label>
                                    <input type="password" value="{{ old('password_confirm') }}" name="password_confirm" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập mật khẩu cũ">
                                    @error('password_confirm')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                    @enderror
                                </div>
                                
                                <!-- Save changes button-->
                                <button type="submit" class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
                                    Cập nhật
                                </button>
                                <a href="{{ route('profile') }}" class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </form>

        </div>
    </section>
</main>


@endsection

@section('js')
@endsection(js)
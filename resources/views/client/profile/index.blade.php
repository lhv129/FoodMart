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

            <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update', Auth::user()->id) }}">
                @csrf
                @method('PUT')
                <div class="flex md:space-x-2 lg:space-x-6 flex-wrap md:flex-nowrap">
                    <div class="w-full md:w-1/2 mb-3 lg:">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Ảnh đại diện</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <div class="flex justify-center items-center h-screen">
                                    <img class="rounded-full mb-2 w-full md:w-1/2" src="{{ Auth::user()->avatar }}" alt="ảnh đại diện">
                                </div>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">Khuyến khích nên chọn ảnh vuông</div>
                                <div class="small font-italic text-muted mb-4">
                                    <input type="file" name="avatar">
                                    @error('avatar')
                                    <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Thông tin cá nhân</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="mb-2 block text-gray-800">Họ và tên</label>
                                        <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập họ và tên">
                                        @error('name')
                                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="flex md:space-x-2 lg:space-x-6 flex-wrap md:flex-nowrap">
                                        <!-- Form Group (phone name)-->
                                        <div class="w-full md:w-1/2 mb-3 lg:">
                                            <label class="mb-2 block text-gray-800">Số điện thoại</label>
                                            <input type="number" value="{{ Auth::user()->phone }}" name="phone" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập họ và tên">
                                            @error('phone')
                                            <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                            @enderror
                                        </div>
                                        <!-- Form Group (address)-->
                                        <div class="w-full md:w-1/2">
                                            <label class="mb-2 block text-gray-800">Địa chỉ</label>
                                            <input type="text" value="{{ Auth::user()->address }}" name="address" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập họ và tên">
                                            @error('address')
                                            <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="mb-2 block text-gray-800">Email</label>
                                        <input type="text" value="{{ Auth::user()->email }}" name="email" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập họ và tên">
                                        @error('email')
                                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="mb-2 block text-gray-800">Ngày sinh</label>
                                        <input type="date" value="{{ Auth::user()->birthday }}" name="birthday" class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base" placeholder="Nhập họ và tên">
                                        @error('birthday')
                                        <div class="mt-2"><i class="fa fa-exclamation-triangle text-red-600" style="font-size: 15px;" aria-hidden="true"></i><span class="ps-2 text-red-600"> {{ $message }}</span></div>
                                        @enderror
                                    </div>
                                    <!-- Save changes button-->
                                    <button type="submit" class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
                                        Lưu thay đổi
                                    </button>
                                    <a href="{{ route('user.profile.change') }}" class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">Đổi mật khẩu</a>
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
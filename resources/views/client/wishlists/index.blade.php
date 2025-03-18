<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
FoodMart
@endsection
@section('content')

<main>
    <section class="lg:my-14 my-8">
        <div class="container">
            <!-- Page Heading -->
            <h3 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h3>
            <!-- DataTales Example -->

            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead class="text-center" style="background-color: #d8dbda;">
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 102px;">Ảnh sản phẩm</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Tên sản phẩm</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Gía bán</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Trạng thái</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Hành động</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 154px;">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($wishlists as $index => $wishlist)
                                    <tr class="odd">
                                        <td>
                                            <img src="{{ asset($wishlist->image) }}" alt="Ảnh sản phẩm" width="150px">
                                        </td>
                                        <td>{{ $wishlist->name }}</td>
                                        <td>{{ number_format($wishlist->retail_price - $wishlist->discount, 0, ',', '.') }} vnđ</td>
                                        <td>
                                            <p class="badge {{ $wishlist->quantity > 0 ? 'badge-success' : 'badge-danger' }}"> {{ $wishlist->quantity > 0 ? 'Còn Hàng' : 'Hết hàng' }}</p>
                                        </td>
                                        <td>
                                            @if($wishlist->quantity > 0)
                                            <div>
                                                <button type="button" class="btn inline-flex items-center gap-x-1 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="14" height="14" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 5l0 14"></path>
                                                        <path d="M5 12l14 0"></path>
                                                    </svg>
                                                    <span>Thêm</span>
                                                </button>
                                            </div>
                                            @else
                                            <div>
                                                <a href="{{ route('contact') }}">
                                                    <button type="button" class="btn inline-flex items-center gap-x-1 bg-gray-800 text-white border-bg-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 btn-sm">
                                                        <span>Liên hệ</span>
                                                    </button>
                                                </a>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('products.wishlist.delete', ['id' => $wishlist->id]) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $wishlists->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('js')

@endsection(js)
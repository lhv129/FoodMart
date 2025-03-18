<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Theme CSS -->


@endsection

@section('title')
Sản phẩm
@endsection

@section('content')


<main>
    <!-- Products Search Start-->
    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full mb-6">
                    <h2 class="text-lg">Danh sách sản phẩm</h2>
                </div>
            </div>
            <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:gap-4 xl:grid-cols-5 mb-3">
                @foreach ($products as $index => $product)
                <div class="relative rounded-lg break-words border bg-white border-gray-300 card-product">
                    <div class="flex-auto p-4">
                        <div class="text-center relative flex justify-center">
                            @if ($product->discount > 0)
                            <div class="absolute top-0 left-0">
                                <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-red-600 text-white">Sale</span>
                            </div>
                            @endif
                            <a href="{{ route('products.detail' , $product->slug) }}"><img src="{{ $product->image }}"
                                    alt="ảnh sản phẩm" class="w-full" style="height:210px" /></a>

                            <div class="absolute w-full bottom-[15%] opacity-0 invisible card-product-action">
                                <form method="POST" action="{{ route('products.wishlist.store' , $product->slug) }}">
                                    @csrf
                                    <a href="{{ route('products.detail' , $product->slug) }}"
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Chi tiết">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye" width="16" height="16"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path
                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </span>
                                    </a>
                                    <button
                                        class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Yêu thích" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-heart" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <a href="{{ route('products.category',$product->category_slug) }}" class="text-decoration-none text-gray-500"><small>{{ $product->category_name }}</small></a>
                            <div class="flex flex-col gap-2">
                                <h3 class="text-base truncate"><a href="{{ route('products.detail', $product->slug) }}">{{ $product->name }}</a></h3>
                                <div class="flex items-center">
                                    <div class="flex flex-row gap-3">
                                        <small class="text-yellow-500 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-star-half-filled" width="14"
                                                height="14" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                        </small>
                                        <div class="flex flex-row gap-1">
                                            <span class="text-gray-500 text-sm">4.5</span>
                                            <span class="text-gray-500 text-sm">{{ $index+15 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    @if($product->discount > 0)
                                    <span class="text-gray-900 font-semibold">{{ number_format($product->retail_price - $product->discount, 0, ',', '.') }} vnđ</span>
                                    <span class="line-through text-gray-500">{{ number_format($product->retail_price, 0, ',', '.') }}</span>
                                    @else
                                    <span class="text-gray-900 font-semibold">{{ number_format($product->retail_price, 0, ',', '.') }} vnđ</span>
                                    @endif
                                </div>
                                <div>
                                    <button type="button"
                                        class="btn inline-flex items-center gap-x-1 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-plus" width="14" height="14"
                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                        <span>Thêm</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </section>
    <!-- Products Search End-->
</main>


@endsection

@section('js')
@endsection(js)
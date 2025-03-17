<!-- footer -->
<footer class="bg-gray-200 py-8">
	<div class="container">
		<div class="w-full md:w-full lg:w-1/3 flex flex-col gap-4 mb-6">
			<h6>Danh mục</h6>
			<div class="flex flex-wrap">
				@foreach ($footerData['categories'] as $index => $category)
				@if ($index == 0 || $index % 5 == 0)
				<div class="w-1/2">
					<ul class="flex flex-col gap-2">
						@endif
						<li>
							<a href="{{ route('products.category',$category->slug) }}" class="inline-block hover:text-green-600">{{ $category->name }}</a>
						</li>
						@if (($index + 1) % 5 == 0 || $loop->last)
					</ul>
				</div>
				@endif
				@endforeach
			</div>
		</div>
		<div class="w-full md:w-full lg:w-2/3">
			<div class="flex flex-wrap">
				<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4 mb-6">
					<h6>Tìm hiểu về chúng tôi</h6>
					<ul class="flex flex-col gap-2">
						<li><a href="#!" class="inline-block hover:text-green-600">Công ty</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Về chúng tôi</a></li>
						<li><a href="#!" class="inline-block">Nhật ký trực tuyến</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Trung tâm trợ giúp</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Giá trị của chúng tôi</a></li>
					</ul>
				</div>
				<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4 mb-6">
					<h6>Dành cho người tiêu dùng</h6>
					<ul class="flex flex-col gap-2">
						<li><a href="#!" class="inline-block hover:text-green-600">Thanh toán</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Vận chuyển</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Trả hàng sản phẩm</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Câu hỏi thường gặp</a></li>
						<li><a href="#!" class="inline-block">Thanh toán giỏ hàng</a></li>
					</ul>
				</div>
				<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4">
					<h6>Trở thành người mua sắm</h6>
					<ul class="flex flex-col gap-2">
						<li><a href="#!" class="inline-block hover:text-green-600">Cơ hội dành cho người mua</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Trở thành người mua sắm</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Thu nhập</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Ý tưởng & hướng dẫn</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Nhà bán lẻ mới</a></li>
					</ul>
				</div>
				<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4">
					<h6>Các chương trình của Freshcart</h6>
					<ul class="flex flex-col gap-2">
						<li><a href="#!" class="inline-block hover:text-green-600">Các chương trình của Freshcart</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Thẻ quà tặng</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Khuyến mãi & phiếu giảm giá</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Quảng cáo Freshcart</a></li>
						<li><a href="#!" class="inline-block hover:text-green-600">Nghề nghiệp</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="border-t py-4 border-gray-300">
			<div class="gap-y-4 flex flex-wrap items-center justify-center lg:justify-start">
				<div class="lg:w-2/5 lg:text-left text-center">
					<div class="flex md:flex-row flex-col gap-3 md:gap-6 items-center">
						<div class="text-gray-900">Payment Partners</div>
						<ul class="flex items-center flex-row gap-4">
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/payment/amazonpay.svg') }}"
										alt="amazon pay" /></a>
							</li>
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/payment/american-express.svg') }}"
										alt="american express" /></a>
							</li>
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/payment//mastercard.svg') }}"
										alt="mastercard" /></a>
							</li>
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/payment/paypal.svg') }}" alt="paypal" /></a>
							</li>
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/payment/visa.svg') }}" alt="visa" /></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="lg:w-3/5 flex justify-end">
					<div class="flex flex-col md:flex-row items-center gap-3 md:gap-6">
						<div class="text-gray-900">Get deliveries with FreshCart</div>
						<ul class="flex flex-row gap-2">
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/appbutton/appstore-btn.svg') }}" alt=""
										style="width: 140px" /></a>
							</li>
							<li>
								<a href="#!"><img src="{{ asset('assets/clients/images/appbutton/googleplay-btn.svg') }}" alt=""
										style="width: 140px" /></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
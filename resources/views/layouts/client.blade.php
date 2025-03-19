<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link href="{{ asset('assets/clients/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('assets/clients/libs/swiper/swiper-bundle.min.css') }}" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/clients/images/favicon/favicon.ico') }}" />
	<link href="{{ asset('assets/admins/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

	<!-- Libs CSS -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css" />
	<link rel="stylesheet" href="{{ asset('assets/clients/libs/simplebar/dist/simplebar.min.css') }}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('assets/clients/css/theme.min.css') }}">
	@yield('css')
</head>

<body id="page-top">
	<!-- Header -->
	@include('client.blocks.header')

	@auth
	<!-- Modal user -->
	<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<x-profile :user="Auth::user()" />
		</div>
	</div>
	@endauth

	<!-- Modal -->
	<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body p-6">
					<div class="flex justify-between items-start">
						<div>
							<h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
							<p class="text-sm">Enter your address and we will specify the offer you area.</p>
						</div>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
								width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
								fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />

							</svg>
						</button>
					</div>
					<div class="my-5">
						<label for="searhNavbarSecond" class="invisible hidden">Search</label>
						<input
							class="border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
							type="search" placeholder="Search for products" id="searhNavbarSecond" />
					</div>
					<div class="flex justify-between items-center mb-2">
						<h6>Select Location</h6>
						<a href="#" class="btn btn-outline-gray-400 text-gray-500 btn-sm">Clear All</a>
					</div>
					<div>
						<div data-simplebar style="height: 300px">
							<div class="list-none">
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3 active active:bg-gray-100 bg-gray-100">
									<span>Alabama</span>
									<span>Min:$20</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Alaska</span>
									<span>Min:$30</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Arizona</span>
									<span>Min:$50</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>California</span>
									<span>Min:$29</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Colorado</span>
									<span>Min:$80</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Florida</span>
									<span>Min:$90</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Arizona</span>
									<span>Min:$50</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>California</span>
									<span>Min:$29</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Colorado</span>
									<span>Min:$80</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Florida</span>
									<span>Min:$90</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="wrapper">
		<div id="content-wrapper">
			<div id="content">
				@yield('content')
			</div>
		</div>
	</div>

	<!-- Footer -->
	@include('client.blocks.footer')

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Libs JS -->
	<script src="{{ asset('assets/clients/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/clients/libs/simplebar/dist/simplebar.min.js') }}"></script>

	<!-- Theme JS -->
	<script src="{{ asset('assets/clients/js/theme.min.js') }}"></script>
	<!-- endbuild -->

	<script src="{{ asset('assets/clients/js/vendors/countdown.js') }}"></script>

	<script src="{{ asset('assets/clients/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
	<script src="{{ asset('assets/clients/js/vendors/tns-slider.js') }}"></script>
	<script src="{{ asset('assets/clients/js/vendors/zoom.js') }}"></script>
	<script src="{{ asset('assets/clients/js/vendors/language.js') }}"></script>
	<!-- Swiper JS -->
	<script src="{{ asset('assets/clients/libs/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('assets/clients/js/vendors/swiper.js') }}"></script>
	<script src="{{ asset('assets/clients/js/vendors/validation.js') }}"></script>
	<!-- Sử dụng sweetalert2 để thông báo -->
	@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
	<script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

	<!-- Button Scroll -->
	<script src="{{ asset('assets/admins/vendor/jquery/jquery.min.js') }}"></script>
	<!-- Core plugin JavaScript-->
	<script src="{{ asset('assets/admins/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('assets/admins/js/sb-admin-2.min.js') }}"></script>

	<!-- Model Cart -->
	<script src="{{ asset('assets/clients/js/model-cart.js') }}"></script>
	@yield('js')

</body>

</html>
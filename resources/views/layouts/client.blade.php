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

<body>
	<!-- Header -->
	@include('client.blocks.header')

	<!-- Modal -->
	<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content p-8">
				<div class="flex justify-between items-center mb-4">
					<h3 class="font-bold text-gray-800" id="userModalLabel">Sign Up</h3>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
							width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
							fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
						</svg>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="fullName" class="mb-2 block text-gray-800">Name</label>
							<input type="text"
								class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
								id="fullName" placeholder="Enter Your Name" required />
							<div class="invalid-feedback">Please enter name.</div>
						</div>
						<div class="mb-3">
							<label for="email" class="mb-2 block text-gray-800">Email address</label>
							<input type="email"
								class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
								id="email" placeholder="Enter Email address" autocomplete="email" required />
							<div class="invalid-feedback">Please enter email.</div>
						</div>
						<div class="mb-5">
							<label for="password" class="mb-2 block text-gray-800">Password</label>
							<input type="password"
								class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
								id="password" placeholder="Enter Password" required />
							<div class="invalid-feedback">Please enter password.</div>
							<span class="block mt-1 text-sm text-gray-500">
								By Signup, you agree to our
								<a href="#!" class="text-green-600">Terms of Service</a>
								&
								<a href="#!" class="text-green-600">Privacy Policy</a>
							</span>
						</div>

						<button type="submit"
							class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
							Sign Up
						</button>
					</form>
				</div>
				<div class="modal-footer flex border-0 justify-center mt-3">
					Already have an account?
					<a href="#" class="text-green-600 ml-1">Sign in</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Shop Cart -->

	<div class="offcanvas offcanvas-right" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header border-b">
			<div>
				<h5 id="offcanvasRightLabel">Shop Cart</h5>
				<span>Location in 382480</span>
			</div>
			<button type="button" class="btn-close text-inherit" data-bs-dismiss="offcanvas" aria-label="Close">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700" width="24"
					height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
					stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none" />

				</svg>
			</button>
		</div>
		<div class="offcanvas-body p-4">
			<div>
				<!-- alert -->
				<div class="bg-red-500 bg-opacity-25 text-red-800 mb-3 rounded-lg p-4" role="alert">
					You’ve got FREE delivery. Start
					<a href="#!" class="alert-link">checkout now!</a>
				</div>
				<ul class="list-none">
					<!-- list group -->
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="./assets/images/products/product-img-1.jpg" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<!-- title -->
										<a href="#!" class="text-inherit">
											<h6>Haldiram's Sev Bhujia</h6>
										</a>
										<span><small class="text-gray-500">.98 / lb</small></span>
										<!-- text -->
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- input group -->
							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<!-- input -->
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<!-- price -->
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$5.00</span>
							</div>
						</div>
					</li>
					<!-- list group -->
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="./assets/images/products/product-img-2.jpg" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="#!" class="text-inherit">
											<h6>NutriChoice Digestive</h6>
										</a>
										<span><small class="text-gray-500">250g</small></span>
										<!-- text -->
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<!-- input group -->
							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<!-- input -->
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<!-- price -->
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-red-600">$20.00</span>
								<div class="line-through text-gray-500 small">$26.00</div>
							</div>
						</div>
					</li>
					<!-- list group -->
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="./assets/images/products/product-img-3.jpg" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<!-- title -->
										<a href="#!" class="text-inherit">
											<h6>Cadbury 5 Star Chocolate</h6>
										</a>
										<span><small class="text-gray-500">1 kg</small></span>
										<!-- text -->
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<!-- input group -->
							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<!-- input -->
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<!-- price -->
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$15.00</span>
								<div class="line-through text-gray-500 small">$20.00</div>
							</div>
						</div>
					</li>
					<!-- list group -->
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="./assets/images/products/product-img-4.jpg" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<!-- title -->
										<!-- title -->
										<a href="#!" class="text-inherit">
											<h6>Onion Flavour Potato</h6>
										</a>
										<span><small class="text-gray-500">250g</small></span>
										<!-- text -->
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<!-- input group -->
							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<!-- input -->
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<!-- price -->
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$15.00</span>
								<div class="line-through text-gray-500 small">$20.00</div>
							</div>
						</div>
					</li>
					<!-- list group -->
					<li class="py-3 border-t border-b">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="./assets/images/products/product-img-5.jpg" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<!-- title -->
										<a href="#!" class="text-inherit">
											<h6>Salted Instant Popcorn</h6>
										</a>
										<span><small class="text-gray-500">100g</small></span>
										<!-- text -->
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<!-- input group -->
							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<!-- input -->
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<!-- price -->
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$15.00</span>
								<div class="line-through text-gray-500 small">$25.00</div>
							</div>
						</div>
					</li>
				</ul>
				<!-- btn -->
				<div class="flex justify-between mt-4">
					<a href="#!"
						class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
						Continue Shopping
					</a>
					<a href="#!"
						class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
						Update Cart
					</a>
				</div>
			</div>
		</div>
	</div>

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

	@yield('content')

	<!-- Footer -->
	@include('client.blocks.footer')

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
	@yield('js')

</body>

</html>
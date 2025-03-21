<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.client')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
<link rel="stylesheet" href="{{ asset('assets/clients/css/theme-order.min.css') }}">

@endsection

@section('title')
Đơn đặt hàng
@endsection
@section('content')


<main>
    <section class="py-5">
        <div class="container">
            <div class="bootstrap-tabs product-tabs">
                <div class="tabs-header border-bottom my-5">
                    <div class="col-sm-4 offset-sm-2 offset-md-0 col-lg-6 d-none d-lg-block">
                        <div class="search-bar row bg-light p-2 my-2 rounded-4">
                            <div class="col-11 col-md-11">
                                <form class="text-center" action="http://127.0.0.1:8001/san-pham/tim-kiem" method="GET">
                                    <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm" name="search">
                                </form>
                            </div>
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <nav>
                        <div class="nav nav-tabs justify-center" id="nav-tab" role="tablist">
                            <a href="#" class="nav-link text-uppercase fs-6 mx-10" id="nav-success-tab" data-bs-toggle="tab" data-bs-target="#nav-success" aria-selected="false" tabindex="-1" role="tab">
                                Hoàn thành
                            </a>
                            <a href="#" class="nav-link text-uppercase fs-6 mx-10" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" aria-selected="true" role="tab">Chờ xác nhận</a>
                            <a href="#" class="nav-link text-uppercase fs-6 mx-10" id="nav-failed-tab" data-bs-toggle="tab" data-bs-target="#nav-failed" aria-selected="false" tabindex="-1" role="tab">Đã hủy</a>
                        </div>
                    </nav>
                </div>

                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade" id="nav-success" role="tabpanel" aria-labelledby="nav-success-tab">
                        <div class="product-grid row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mx-auto w-full md:w-1/2">
                            <x-order-list :orders="$orderData['success']" />
                        </div>
                    </div>

                    <div class="tab-pane fade " id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                        <div class="product-grid row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mx-auto w-full md:w-1/2">
                            <x-order-list :orders="$orderData['pending']" />
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-failed" role="tabpanel" aria-labelledby="nav-failed-tab">
                        <div class="product-grid row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mx-auto w-full md:w-1/2">
                            <x-order-list :orders="$orderData['failed']" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navTabs = document.getElementById('nav-tab');
        const navTabContent = document.getElementById('nav-tabContent');

        // Khôi phục trạng thái tab từ localStorage
        const activeTabId = localStorage.getItem('activeTab');
        if (activeTabId) {
            const activeTab = navTabs.querySelector(`#${activeTabId}-tab`);
            if (activeTab) {
                // Kích hoạt tab
                const bsTab = new bootstrap.Tab(activeTab);
                bsTab.show();

                // Hiển thị nội dung tab
                const targetId = activeTab.dataset.bsTarget;
                const targetContent = navTabContent.querySelector(targetId);
                if (targetContent) {
                    targetContent.classList.add('show', 'active');
                }
            }
        }

        // Lưu trạng thái tab khi click
        navTabs.addEventListener('click', function(event) {
            const target = event.target;
            if (target.classList.contains('nav-link')) {
                localStorage.setItem('activeTab', target.id.replace('-tab', ''));
            }
        });
    });
</script>
@endsection(js)
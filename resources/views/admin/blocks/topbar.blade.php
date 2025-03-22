<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <!-- <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a> -->
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        @if($topBarData['pendingOrderCount'])
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{ $topBarData['pendingOrderCount'] }}+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Đơn đặt hàng chờ xác nhận {{ $topBarData['pendingOrderCount'] }}+
                </h6>

                @foreach ($topBarData['pendingOrderList'] as $pendingList)
                <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.orders.detail', $pendingList->code) }}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ $pendingList->created_at }}</div>
                        <span class="font-weight-bold">Đơn hàng với mã đơn là {{ $pendingList->code }} đang chờ xác nhận!</span>
                    </div>
                </a>
                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.orders.pending') }}">Tất cả đơn đặt hàng</a>
            </div>
        </li>
        @endif
        @if($topBarData['goodReceiptNoteCount'])
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{ $topBarData['goodReceiptNoteCount'] }}+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Đơn nhập hàng chờ xác nhận {{ $topBarData['goodReceiptNoteCount'] }}+
                </h6>

                @foreach ($topBarData['goodReceiptNoteList'] as $goodReceiptNote)
                <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.goods.detail', $goodReceiptNote->code) }}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ $goodReceiptNote->created_at }}</div>
                        <span class="font-weight-bold">Đơn hàng với mã đơn là {{ $goodReceiptNote->code }} đang chờ xác nhận!</span>
                    </div>
                </a>
                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.goods') }}">Tất cả đơn nhập hàng</a>
            </div>
        </li>
        @endif
        @if($topBarData['goodDeliveryNoteCount'])
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{ $topBarData['goodDeliveryNoteCount'] }}+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Đơn bán hàng chờ xác nhận {{ $topBarData['goodDeliveryNoteCount'] }}+
                </h6>

                @foreach ($topBarData['goodDeliveryNoteList'] as $goodDeliveryNote)
                <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.delivery.detail', $goodDeliveryNote->code) }}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ $goodDeliveryNote->created_at }}</div>
                        <span class="font-weight-bold">Đơn hàng với mã đơn là {{ $goodDeliveryNote->code }} đang chờ xác nhận!</span>
                    </div>
                </a>
                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.delivery') }}">Tất cả bán hàng</a>
            </div>
        </li>
        @endif

        

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ Auth::user()->avatar }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Hồ sơ cá nhân
                </a>
                <!-- <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
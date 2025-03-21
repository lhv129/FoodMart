<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo/logo.png') }}" width="100px">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Giao diện
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.products') }}" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <img src="{{ asset('images/sidebar-icons/dairy-products.png') }}">
            <span>Sản phẩm</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                <a class="collapse-item" href="{{ route('admin.products') }}">Danh sách</a>
                @endif
                @if(Auth::user()->role_id === 1)
                <a class="collapse-item" href="{{ route('admin.products.create') }}">Thêm mới</a>
                @endif
            </div>
        </div>
    </li>

    @if(Auth::user()->role_id === 1)
    <!-- Nav Item - Categories Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.categories') }}" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <img src="{{ asset('images/sidebar-icons/options.png') }}">
            <span>Danh mục sản phẩm</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.categories') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Units Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.units') }}" data-toggle="collapse" data-target="#collapseUnits"
            aria-expanded="true" aria-controls="collapseUnits">
            <img src="{{ asset('images/sidebar-icons/boxes.png') }}">
            <span>Đơn vị</span>
        </a>
        <div id="collapseUnits" class="collapse" aria-labelledby="headingUnits"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.units') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.units.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>



    <!-- Nav Item - Suppliers Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.suppliers') }}" data-toggle="collapse" data-target="#collapseSuppliers"
            aria-expanded="true" aria-controls="collapseSuppliers">
            <img src="{{ asset('images/sidebar-icons/supplier.png') }}">
            <span>Nhà cung cấp</span>
        </a>
        <div id="collapseSuppliers" class="collapse" aria-labelledby="headingSuppliers"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.suppliers') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.suppliers.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Payments Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.payments') }}" data-toggle="collapse" data-target="#collapsePayments"
            aria-expanded="true" aria-controls="collapsePayments">
            <img src="{{ asset('images/sidebar-icons/payment-method.png') }}">
            <span>Phương thức thanh toán</span>
        </a>
        <div id="collapsePayments" class="collapse" aria-labelledby="headingPayments"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.payments') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.payments.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.users') }}" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <img src="{{ asset('images/sidebar-icons/profile.png') }}">
            <span>Người dùng</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.users') }}">Danh sách người dùng</a>
                <a class="collapse-item" href="{{ route('admin.users.staff') }}">Danh sách quản trị viên</a>
            </div>
        </div>
    </li>
    @endif

    <!-- Nav Item - Order Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.delivery') }}" data-toggle="collapse" data-target="#collapseOrder"
            aria-expanded="true" aria-controls="collapseOrder">
            <img src="{{ asset('images/sidebar-icons/food-delivery.png') }}">
            <span>Đơn đặt hàng</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingOrder"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.orders') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.orders.pending') }}">Đơn chờ xử lý</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Warehouses Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.warehouses') }}" data-toggle="collapse" data-target="#collapseWarehouses"
            aria-expanded="true" aria-controls="collapseWarehouses">
            <img src="{{ asset('images/sidebar-icons/warehouse.png') }}">
            <span>Kho hàng</span>
        </a>
        <div id="collapseWarehouses" class="collapse" aria-labelledby="headingWarehouses"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.warehouses') }}">Danh sách</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Goods Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.goods') }}" data-toggle="collapse" data-target="#collapseGoods"
            aria-expanded="true" aria-controls="collapseGoods">
            <img src="{{ asset('images/sidebar-icons/import.png') }}">
            <span>Đơn nhập hàng</span>
        </a>
        <div id="collapseGoods" class="collapse" aria-labelledby="headingGoods"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.goods') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.goods.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Delivery Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.delivery') }}" data-toggle="collapse" data-target="#collapseDelivery"
            aria-expanded="true" aria-controls="collapseDelivery">
            <img src="{{ asset('images/sidebar-icons/cargo.png') }}">
            <span>Đơn bán hàng</span>
        </a>
        <div id="collapseDelivery" class="collapse" aria-labelledby="headingDelivery"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('admin.delivery') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.delivery.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
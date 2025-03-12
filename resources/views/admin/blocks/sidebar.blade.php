<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <i class="fas fa-fw fa-cog"></i>
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
            <i class="fas fa-fw fa-wrench"></i>
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
            <i class="fas fa-fw fa-wrench"></i>
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
            <i class="fas fa-fw fa-wrench"></i>
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
            <i class="fas fa-fw fa-wrench"></i>
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
    @endif

    <!-- Nav Item - Warehouses Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.warehouses') }}" data-toggle="collapse" data-target="#collapseWarehouses"
            aria-expanded="true" aria-controls="collapseWarehouses">
            <i class="fas fa-fw fa-wrench"></i>
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
            <i class="fas fa-fw fa-wrench"></i>
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

</ul>
<!-- End of Sidebar -->
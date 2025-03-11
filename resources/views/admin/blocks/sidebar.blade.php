<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fa fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Warehouse</div>
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
        Interface
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
                <a class="collapse-item" href="{{ route('admin.products') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('admin.products.create') }}">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Categories Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.categories') }}" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Danh mục</span>
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
</ul>
<!-- End of Sidebar -->
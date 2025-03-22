<!-- Dùng để chọn layout kế thừa -->
@extends('layouts.admin')

@section('css')
<!-- Nội dung ở trong đây sẽ được truyền sang yield('css') ở file layout/client -->
@endsection

@section('title')
Thống kê
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> In văn bản</button>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh thu tháng này</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalMonthly, 0, ',', '.') }} vnđ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tiền nhập hàng tháng này</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalImportMonthly, 0, ',', '.') }} vnđ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lợi nhuận tháng này
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($totalMonthly - $totalImportMonthly, 0, ',', '.') }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Thành viên</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-8 col-lg-7">

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Doanh thu trong 1 tuần</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myBarChart" width="613" height="320" style="display: block; width: 613px; height: 320px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-wrap justify-content-between">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu</h6>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <form method="GET">
                            <div class="form-group">
                                <div class="d-flex">
                                    <select name="time_range" class="form-control">
                                        <option value="30" {{ $timeRange == 30 ? 'selected' : '' }}>1 tháng nay</option>
                                        <option value="90" {{ $timeRange == 90 ? 'selected' : '' }}>3 tháng trước</option>
                                        <option value="180" {{ $timeRange == 180 ? 'selected' : '' }}>6 tháng trước</option>
                                        <option value="360" {{ $timeRange == 360 ? 'selected' : '' }}>1 năm trước</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary ml-2">Lọc</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart" width="613" height="320" style="display: block; width: 613px; height: 320px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4 col-12">
                <div class="card-header py-3 d-flex flex-wrap justify-content-between">
                <div class="col-xl-6 col-md-6 mb-4">
                        <h6 class="m-0 font-weight-bold text-primary">Biểu đồ tổng tiền nhập hàng</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="403" height="245" style="display: block; width: 403px; height: 245px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

@endsection

@section('js')
<script>
    var dailyTotals = <?php echo json_encode($dailyTotals); ?>;
    var TotalBarChart = <?php echo json_encode($TotalBarChart); ?>;
    var TotalImport = <?php echo json_encode($TotalImport); ?>;
</script>

<script src="{{ asset('assets/admins/js/demo/Chart.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/demo/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('assets/admins/js/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('assets/admins/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/admins/js/demo/chart-area-2-demo.js') }}"></script>

@endsection(js)
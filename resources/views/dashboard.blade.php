@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-user"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Patients</span>
                        <h3 class="card-title mb-2">{{ $totalPatients }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-clipboard"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Prescriptions</span>
                        <h3 class="card-title mb-2">{{ $totalPrescriptions }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-info">
                                    <i class="bx bx-dollar"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Sales</span>
                        <h3 class="card-title mb-2">{{ number_format($totalSales, 2) }} DA</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="bx bx-cart"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Purchases</span>
                        <h3 class="card-title mb-2">{{ number_format($totalPurchases, 2) }} DA</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-secondary">
                                    <i class="bx bx-store"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Suppliers</span>
                        <h3 class="card-title mb-2">{{ $totalSuppliers }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bx bx-box"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Products</span>
                        <h3 class="card-title mb-2">{{ $totalProducts }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-trending-up"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Today's Sales</span>
                        <h3 class="card-title mb-2">{{ number_format($todaySales, 2) }} DA</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="bx bx-trending-down"></i>
                                </span>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Today's Purchases</span>
                        <h3 class="card-title mb-2">{{ number_format($todayPurchases, 2) }} DA</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Chart -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Monthly Sales</h5>
                    </div>
                    <div class="card-body">
                        <div id="monthlySalesChart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity and Top Products -->
        <div class="row">
            <!-- Recent Prescriptions -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Prescriptions</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentPrescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->patient->nom ?? 'N/A' }}</td>
                                        <td>{{ $prescription->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge bg-label-primary">Completed</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Selling Products -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Top Selling Products</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Sales Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topMontures as $monture)
                                    <tr>
                                        <td>{{ $monture->nom }}</td>
                                        <td>{{ $monture->vents_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Suppliers -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Top Suppliers</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Total Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($topSuppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->nom }}</td>
                                        <td>{{ number_format($supplier->vents_sum_total, 2) }} DA</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>

@push('scripts')
<script>
    // Monthly Sales Chart
    const monthlySalesChartEl = document.querySelector('#monthlySalesChart');
    const monthlySalesChartConfig = {
        series: [{
            name: 'Sales',
            data: @json($monthlySalesData)
        }],
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        colors: [config.colors.primary],
        fill: {
            type: 'gradient',
            gradient: {
                shade: shadeColor,
                shadeIntensity: 0.6,
                opacityFrom: 0.5,
                opacityTo: 0.25,
                stops: [0, 95, 100]
            }
        },
        stroke: {
            width: 2,
            curve: 'smooth'
        },
        grid: {
            borderColor: borderColor,
            strokeDashArray: 3,
            padding: {
                top: -20,
                bottom: -8,
                left: -10,
                right: 8
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            labels: {
                show: true,
                style: {
                    fontSize: '13px',
                    colors: axisColor
                }
            }
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    fontSize: '13px',
                    colors: axisColor
                }
            }
        }
    };
    if (typeof monthlySalesChartEl !== undefined && monthlySalesChartEl !== null) {
        const monthlySalesChart = new ApexCharts(monthlySalesChartEl, monthlySalesChartConfig);
        monthlySalesChart.render();
    }
</script>
@endpush
@endsection

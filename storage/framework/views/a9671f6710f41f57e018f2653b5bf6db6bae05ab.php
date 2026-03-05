<?php $__env->startSection('content'); ?>



    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">

                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-16 mb-1">Welcome to Dashboard</h4>
                                            <p class="text-muted mb-0">
                                                <?php if($isAdmin): ?>
                                                    Here's your sales analytics overview
                                                <?php else: ?>
                                                    Here's your personal sales overview
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="mt-3 mt-lg-0">
                                            <form action="javascript:void(0);">
                                                <div class="row g-3 mb-0 align-items-center">

                                                    <!--end col-->
                                                    <!-- <div class="col-auto">
                                                        <button type="button" class="btn btn-soft-secondary"><i class="ri-add-circle-line align-middle me-1"></i> Add Sale</button>
                                                    </div> -->
                                                    <!--end col-->

                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                    </div><!-- end card header -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="row">
                                
                                <div class="col-xl-<?php echo e($isAdmin ? '3' : '4'); ?> col-md-6">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Earnings</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="<?php echo e($total_earnings); ?>">0</span> </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-secondary-subtle rounded fs-3">
                                                        <i class="bx bx-dollar-circle text-secondary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>

                                <div class="col-xl-<?php echo e($isAdmin ? '3' : '4'); ?> col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Customers</p>
                                                </div>

                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo e($total_customers); ?>">0</span></h4>

                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-primary"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>

                                <div class="col-xl-<?php echo e($isAdmin ? '3' : '4'); ?> col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Commission <?php echo e($isAdmin ? 'Paid' : 'Earned'); ?></p>
                                                </div>

                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="<?php echo e($total_commissions); ?>">0</span> </h4>

                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-success"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>

                                <?php if($isAdmin): ?>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Owed</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-20 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="<?php echo e($total_owed); ?>">0</span> </h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-wallet text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div> 

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1"><?php echo e($isAdmin ? 'Revenue Overview' : 'Your Sales Overview'); ?></h4>

                                        </div><!-- end card header -->

                                        <div class="card-header p-0 border-0 bg-light-subtle">
                                            <div class="row g-0 text-center">
                                                <div class="col-6 col-sm-4">
                                                    <div class="p-3 border border-dashed border-start-0">
                                                        <h5 class="mb-1"><span class="counter-value" data-target="<?php echo e($total_customers); ?>">0</span></h5>
                                                        <p class="text-muted mb-0">Customers</p>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-sm-4">
                                                    <div class="p-3 border border-dashed border-start-0">
                                                        <h5 class="mb-1">$<span class="counter-value" data-target="<?php echo e(number_format($total_earnings/1000, 2)); ?>">0</span>k</h5>
                                                        <p class="text-muted mb-0">Total Earnings</p>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-sm-4">
                                                    <div class="p-3 border border-dashed border-start-0">
                                                        <h5 class="mb-1">$<span class="counter-value" data-target="<?php echo e(number_format($total_commissions/1000, 2)); ?>">0</span>k</h5>
                                                        <p class="text-muted mb-0"><?php echo e($isAdmin ? 'Commissions Paid' : 'Commissions Earned'); ?></p>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <!--end col-->
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-body p-0 pb-2">
                                            <div class="w-100">
                                                <div id="customer_impression_charts"
                                                    data-sales='<?php echo e(json_encode($chart_data["sales_count"])); ?>'
                                                    data-price='<?php echo e(json_encode($chart_data["contract_price"])); ?>'
                                                    data-commission='<?php echo e(json_encode($chart_data["commission"])); ?>'
                                                    data-colors='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                                    class="apex-charts"
                                                    dir="ltr">
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Leads Overview</h4>
                                        </div><!-- end card header -->



                                        <div class="card-body p-0 pb-2">
                                            <div class="w-100">
                                                <div id="customer_impression_charts2"
                                                    data-leads='<?php echo e(json_encode($chart_data["leads_count"])); ?>'
                                                    data-colors='["--vz-primary"]'
                                                    class="apex-charts"
                                                    dir="ltr">
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Recent Sales</h4>
                                            
                                        </div><!-- end card header -->

                                        <div class="card-body">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Contract</th>
                                                        <th scope="col">Commission</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $recent_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td><a href="#" class="fw-medium text-reset">#<?php echo e($sale->id); ?></a></td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1"><?php echo e($sale->name); ?></div>
                                                                </div>
                                                            </td>
                                                            <td>$<?php echo e(number_format($sale->price, 2)); ?></td>

                                                            <td>$<?php echo e(number_format($sale->commissions->sum('amount'), 2)); ?></td>
                                                            <td>
                                                                <span class="badge bg-<?php echo e($sale->status == 'approved' ? 'success' : 'warning'); ?>-subtle text-<?php echo e($sale->status == 'approved' ? 'success' : 'warning'); ?>">
                                                                    <?php echo e(ucfirst($sale->status)); ?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">No recent sales found</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                  <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Conversion</h4>
                                    </div>
                                    <div class="card-body">
                                    <div id="customer_impression_charts3"
                                                    data-leads-status='<?php echo e(json_encode($leads_by_status)); ?>'
                                                    data-colors='["--vz-success", "--vz-info", "--vz-danger"]'
                                                    class="apex-charts"
                                                    dir="ltr">
                                                </div>
                                    </div>
                                  </div>
                                </div>
                            </div>



                            <div class="row">


                            </div> <!-- end row-->

                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->


                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function getChartColorsArray(e) {
    if (null !== document.getElementById(e)) {
        var t = document.getElementById(e).getAttribute("data-colors");
        if (t) return (t = JSON.parse(t)).map(function (e) {
            var t = e.replace(" ", "");
            return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) || t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")" : t
        });
        console.warn("data-colors attributes not found on", e)
    }
}

var options, chart, linechartcustomerColors = getChartColorsArray("customer_impression_charts");
if (linechartcustomerColors) {
    const chartElement = document.querySelector("#customer_impression_charts");
    const salesData = JSON.parse(chartElement.getAttribute("data-sales") || "[]");
    const priceData = JSON.parse(chartElement.getAttribute("data-price") || "[]");
    const commissionData = JSON.parse(chartElement.getAttribute("data-commission") || "[]");

    options = {
        series: [{
            name: "Sold",
            type: "area",
            data: salesData
        }, {
            name: "Estimate Completed",
            type: "bar",
            data: priceData
        }, {
            name: "Dead Leads",
            type: "line",
            data: commissionData
        }],
        chart: {
            height: 370,
            type: "line",
            toolbar: {
                show: false
            }
        },
        stroke: {
            curve: "straight",
            dashArray: [0, 0, 8],
            width: [2, 0, 2.2]
        },
        fill: {
            opacity: [0.1, 0.9, 1]
        },
        markers: {
            size: [0, 0, 0],
            strokeWidth: 2,
            hover: {
                size: 4
            }
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false
            }
        },
        grid: {
            show: true,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },
            padding: {
                top: 0,
                right: -2,
                bottom: 15,
                left: 10
            }
        },
        legend: {
            show: true,
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: -5,
            markers: {
                width: 9,
                height: 9,
                radius: 6
            },
            itemMargin: {
                horizontal: 10,
                vertical: 0
            }
        },
        plotOptions: {
            bar: {
                columnWidth: "30%",
                barHeight: "70%"
            }
        },
        colors: linechartcustomerColors,
        tooltip: {
            shared: true,
            y: [{
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " sales";
                    }
                    return y;
                }
            }, {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return "$" + y.toFixed(2) + "k";
                    }
                    return y;
                }
            }, {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return "$" + y.toFixed(2) + "k";
                    }
                    return y;
                }
            }]
        }
    };
    chart = new ApexCharts(document.querySelector("#customer_impression_charts"), options);
    chart.render();
}
var options, chart, linechartcustomerColors = getChartColorsArray("customer_impression_charts2");
if (linechartcustomerColors) {
    const chartElement = document.querySelector("#customer_impression_charts2");
    const leadsData = JSON.parse(chartElement.getAttribute("data-leads") || "[]");

    options = {
        series: [{
            name: "Total Leads",
            type: "column",
            data: leadsData
        }],
        chart: {
            height: 370,
            type: "bar",
            toolbar: {
                show: false
            }
        },
        stroke: {
            curve: "straight",
            width: 2
        },
        fill: {
            opacity: 0.8
        },
        markers: {
            size: 0,
            strokeWidth: 2,
            hover: {
                size: 4
            }
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false
            }
        },
        grid: {
            show: true,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },
            padding: {
                top: 0,
                right: -2,
                bottom: 15,
                left: 10
            }
        },
        legend: {
            show: false
        },
        plotOptions: {
            bar: {
                columnWidth: "60%",
                barHeight: "70%"
            }
        },
        colors: linechartcustomerColors,
        tooltip: {
            shared: false,
            y: {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " leads";
                    }
                    return y;
                }
            }
        }
    };
    chart = new ApexCharts(document.querySelector("#customer_impression_charts2"), options);
    chart.render();
}
var options, chart, pieChartColors = getChartColorsArray("customer_impression_charts3");
if (pieChartColors) {
    const chartElement = document.querySelector("#customer_impression_charts3");
    const leadsStatusData = JSON.parse(chartElement.getAttribute("data-leads-status") || "{}");

    const seriesData = [
        leadsStatusData.sold || 0,
        leadsStatusData.estimate_complete || 0,
        leadsStatusData.no_contact || 0
    ];

    options = {
        series: seriesData,
        chart: {
            height: 370,
            type: "pie",
            toolbar: {
                show: false
            }
        },
        labels: ["Sold", "Estimate Completed", "Dead Leads"],
        colors: pieChartColors,
        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 12,
                height: 12,
                radius: 6
            },
            itemMargin: {
                horizontal: 15,
                vertical: 10
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "70%"
                },
                expandOnClick: true
            }
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: "14px",
                fontWeight: "bold"
            },
            formatter: function(val, opts) {
                return opts.w.config.series[opts.seriesIndex].toFixed(0);
            }
        },
        tooltip: {
            enabled: true,
            y: {
                formatter: function(value, { seriesIndex, w }) {
                    const labels = ["Sold", "Estimate Completed", "Dead Leads"];
                    const label = labels[seriesIndex];
                    return value.toFixed(0) + " leads";
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 300
                },
                legend: {
                    position: "bottom"
                }
            }
        }]
    };
    chart = new ApexCharts(document.querySelector("#customer_impression_charts3"), options);
    chart.render();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/drimpacto_app/resources/views/index.blade.php ENDPATH**/ ?>
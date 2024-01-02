<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fleet</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        // print_r($params);
        // print_r($this->frontEnd->companyInfo());
        print_r($this->frontEnd->subUsers());
        ?>
        <div class="row project-wrapper">
            <div class="col-xxl-8">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
                                            <i class="ri-car-fill text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Araçlarım</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="75">0</span></h4>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Toplam sahip olunan araç sayısı</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                            <i class="bx bx-user text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Şoförler</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="122">0</span></h4>
                                        </div>
                                        <p class="text-muted mb-0">Toplam şoför sayısı</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
                                            <i class="bx bx-euro text-info"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Gider</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="4785">0</span>€</h4>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Toplam gider tutarı</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-animate overflow-hidden">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body" style="z-index:1 ;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-grow-1 overflow-hidden" style="justify-content: center; display: flex; align-items: center; flex-direction: column;">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Toplam Km</p>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="178254">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-animate overflow-hidden">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body" style="z-index:1 ;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-grow-1 overflow-hidden" style="justify-content: center; display: flex; align-items: center; flex-direction: column;">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Toplam Kaza</p>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="28">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-animate overflow-hidden">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body" style="z-index:1 ;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-grow-1 overflow-hidden" style="justify-content: center; display: flex; align-items: center; flex-direction: column;">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Toplam Ceza</p>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="73">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-animate overflow-hidden">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body" style="z-index:1 ;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-grow-1 overflow-hidden" style="justify-content: center; display: flex; align-items: center; flex-direction: column;">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Toplam Sorun</p>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="123">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-animate overflow-hidden">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body" style="z-index:1 ;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-grow-1 overflow-hidden" style="justify-content: center; display: flex; align-items: center; flex-direction: column;">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Toplam Yakıt</p>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="2358">0</span> Litre</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-animate overflow-hidden">
                            <div class="position-absolute start-0" style="z-index: 0;">
                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                    <style>
                                        .s0 {
                                            opacity: .05;
                                            fill: var(--vz-success)
                                        }
                                    </style>
                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                </svg>
                            </div>
                            <div class="card-body" style="z-index:1 ;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-grow-1 overflow-hidden" style="justify-content: center; display: flex; align-items: center; flex-direction: column;">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Toplam Bakım</p>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="147">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Gider Grafiği</h4>
                            </div>

                            <div class="card-body">
                                <div id="store-visits-source" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="card-title mb-0">Yaklaşan Servis & Bakım</h4>
                    </div><!-- end cardheader -->
                    <div class="card-body pt-0 table-responsive" style="max-height:500px">
                        <div class="mini-stats-wid d-flex align-items-center mt-3">
                            <div class="flex-shrink-0 avatar-sm">
                                <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-7">
                                    22.12
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Pejo 206</h6>
                                <p class="text-muted mb-0">Yağ Bakımı</p>
                            </div>
                        </div>
                        <div class="mini-stats-wid d-flex align-items-center mt-3">
                            <div class="flex-shrink-0 avatar-sm">
                                <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-7">
                                    25.12
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Pejo 206</h6>
                                <p class="text-muted mb-0">Yağ Bakımı</p>
                            </div>
                        </div>
                        <div class="mini-stats-wid d-flex align-items-center mt-3">
                            <div class="flex-shrink-0 avatar-sm">
                                <span class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-7">
                                    05.01
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Pejo 206</h6>
                                <p class="text-muted mb-0">Yağ Bakımı</p>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div>
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Araç Durumları</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush border-dashed mb-0">
                            <li class="list-group-item px-0">
                                <div class="d-flex">
                                    <div class="flex-grow-1 ms-2">
                                        <p class="fs-15 mb-0"><i class="mdi mdi-circle fs-10 align-middle text-success me-1"></i>Aktif </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <p class="text-success fs-16 mb-0">13</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="d-flex">
                                    <div class="flex-grow-1 ms-2">
                                        <p class="fs-15 mb-0"><i class="mdi mdi-circle fs-10 align-middle text-danger me-1"></i>Inaktif </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <p class="text-danger fs-16 mb-0">3</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="d-flex">
                                    <div class="flex-grow-1 ms-2">
                                        <p class="fs-15 mb-0"><i class="mdi mdi-circle fs-10 align-middle text-warning me-1"></i>Hizmet Dışı </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <p class="text-warning fs-16 mb-0">1</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="d-flex">
                                    <div class="flex-grow-1 ms-2">
                                        <p class="fs-15 mb-0"><i class="mdi mdi-circle fs-10 align-middle text-dark me-1"></i>Satıldı</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <p class="text-dark fs-16 mb-0">5</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="d-flex">
                                    <div class="flex-grow-1 ms-2">
                                        <p class="fs-15 mb-0"><i class="mdi mdi-circle fs-10 align-middle text-info me-1"></i>Alım Süreci</p>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <p class="text-info fs-16 mb-0">1</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
</div>


<script src="<?= ASSET_PATH ?>/libs/apexcharts/apexcharts.min.js"></script>

<script>
    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var t = document.getElementById(e).getAttribute("data-colors");
            if (t) return (t = JSON.parse(t)).map(function(e) {
                var t = e.replace(" ", "");
                return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) || t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")" : t
            });
            console.warn("data-colors atributes not found on", e)
        }
    }
    var options, chart, linechartcustomerColors = getChartColorsArray("customer_impression_charts"),
        chartDonutBasicColors = (linechartcustomerColors && (options = {
            series: [{
                name: "Orders",
                type: "area",
                data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67]
            }, {
                name: "Earnings",
                type: "bar",
                data: [89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57, 42.36, 88.51, 36.57]
            }, {
                name: "Refunds",
                type: "line",
                data: [8, 12, 7, 17, 21, 11, 5, 9, 7, 29, 12, 35]
            }],
            chart: {
                height: 370,
                type: "line",
                toolbar: {
                    show: !1
                }
            },
            stroke: {
                curve: "straight",
                dashArray: [0, 0, 8],
                width: [2, 0, 2.2]
            },
            fill: {
                opacity: [.1, .9, 1]
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
                    show: !1
                },
                axisBorder: {
                    show: !1
                }
            },
            grid: {
                show: !0,
                xaxis: {
                    lines: {
                        show: !0
                    }
                },
                yaxis: {
                    lines: {
                        show: !1
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
                show: !0,
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
                shared: !0,
                y: [{
                    formatter: function(e) {
                        return void 0 !== e ? e.toFixed(0) : e
                    }
                }, {
                    formatter: function(e) {
                        return void 0 !== e ? "$" + e.toFixed(2) + "k" : e
                    }
                }, {
                    formatter: function(e) {
                        return void 0 !== e ? e.toFixed(0) + " Sales" : e
                    }
                }]
            }
        }, (chart = new ApexCharts(document.querySelector("#customer_impression_charts"), options)).render()), getChartColorsArray("store-visits-source")),
        worldemapmarkers = (chartDonutBasicColors && (options = {
            series: [753, 159, 369, 147, 258],
            labels: ["Kaza", "Yakıt", "Ceza", "Sorun", "Servis&Bakım"],
            chart: {
                height: 333,
                type: "donut"
            },
            legend: {
                position: "bottom"
            },
            stroke: {
                show: !1
            },
            dataLabels: {
                dropShadow: {
                    enabled: !1
                }
            },
            colors: chartDonutBasicColors
        }, (chart = new ApexCharts(document.querySelector("#store-visits-source"), options)).render()), "");
</script>
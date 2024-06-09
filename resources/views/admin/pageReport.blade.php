@extends('components.table')

@section('title')
    Dashboard|FurniCrafts
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daily Revenue Analysis</h5>
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Top 5 Best Selling Products</h5>
                <div id="top-products-chart"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Most Popular Categories</h5>
                        <div id="category-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Registration by Month</h5>
                        <div id="userchart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js" integrity="sha512-qiVW4rNFHFQm0jHli5vkdEwP4GPSzCSp85J7JRHdgzuuaTg31tTMC8+AHdEC5cmyMFDByX639todnt6cxEc1lQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css" integrity="sha512-LJwWs3xMbOQNFpWVlpR0Dv3ND8TQgLzvBJsfjMcPKax6VJQ8p9WnQvB5J5Lb9/0D31cbnNsh9x5Lz6+mzxgw1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Rupiah formatter
        function formatRupiah(value) {
            return 'Rp ' + value.toLocaleString('id-ID');
        }

        var options = {
            series: [{
                name: "Revenue",
                data: @json($revenues)
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: @json($dates),
                title: {
                    text: 'Date'
                }
            },
            yaxis: {
                title: {
                    text: 'Revenue'
                },
                labels: {
                    formatter: function(value) {
                        return formatRupiah(value);
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return formatRupiah(value);
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data produk dan kuantitas terjual
        var productData = @json($productData);

        var productNames = productData.map(function(product) {
            return product.Nama_Product;
        });

        var productQuantities = productData.map(function(product) {
            return product.qty_sold;
        });

        // Opsi grafik batang
        var options = {
            series: [{
                name: "Quantity Sold",
                data: productQuantities
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    borderRadius: 4
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: productNames,
                title: {
                    text: 'Product Name'
                }
            },
            yaxis: {
                title: {
                    text: 'Quantity Sold'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#top-products-chart"), options);
        chart.render();
    });
    </script>

    <script>
    var categoryData = @json($categoryData);

var options = {
    series: categoryData.map(function(category) {
        return category.qty_sold;
    }),
    labels: categoryData.map(function(category) {
        return category.Category_Name;
    }),
    chart: {
        type: 'donut'
    },
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

var categoryChart = new ApexCharts(document.querySelector("#category-chart"), options);
categoryChart.render();

    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var months = @json($months);
        var monthNames = {
            1: 'Januari',
            2: 'Februari',
            3: 'Maret',
            4: 'April',
            5: 'Mei',
            6: 'Juni',
            7: 'Juli',
            8: 'Agustus',
            9: 'September',
            10: 'Oktober',
            11: 'November',
            12: 'Desember'
        };

        var monthLabels = months.map(function(month) {
            return monthNames[month];
        });

        var options = {
            series: [{
                name: 'User Registration',
                data: @json($userCounts)
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            xaxis: {
                categories: monthLabels, // Menggunakan nama bulan sebagai label x-axis
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                }
            },
            title: {
                text: 'User Registration by Month',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#userchart"), options);
        chart.render();
    });
</script>
@endsection

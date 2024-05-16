@extends('layouts.app')
@section('title', 'Dashboard')


@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <a href="{{ auth()->user()->role == 0 ? route('kereta.index') : '#' }}"
                                class="text-decoration-none">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">train</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Kereta</span>
                                        <span class="widget-stats-amount">{{ $keretas }}</span>
                                    </div>
                                    {{-- <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                    <i class="material-icons">train</i>
                                </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <a href="{{ auth()->user()->role == 0 ? route('user.index') : '#' }}"
                                class="text-decoration-none">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">people</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">User</span>
                                        <span class="widget-stats-amount">{{ $users }}</span>
                                    </div>
                                    {{-- <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 12%
                                </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <a href="{{ auth()->user()->role == 0 ? route('checksheet.index') : '#' }}"
                                class="text-decoration-none">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">checklist_rtl</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Checksheet</span>
                                        <span class="widget-stats-amount">{{ $checksheet }}</span>
                                    </div>
                                    {{-- <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 7%
                                </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card widget widget-stats-large">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="widget-stats-large-chart-container">
                                    <div class="card-header">
                                        <h5 class="card-title">SO/TSO Tahunan<span
                                                class="badge badge-light badge-style-light">{{ date('Y') }}</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="apex-earnings"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="widget-stats-large-chart-container">
                                    <div class="card-header">
                                        <h5 class="card-title">SO/TSO Bulanan<span
                                                class="badge badge-light badge-style-light">{{ date('F') }}</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //retrieve from $checksheet_so
        var so = @json($checksheet_so);
        var tso = @json($checksheet_tso);

        var options1 = {
            chart: {
                height: 350,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "55%",
                    endingShape: "rounded",
                    borderRadius: 10,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            series: [{
                    name: "SO",
                    data: so,
                },
                {
                    name: "TSO",
                    data: tso,
                },
            ],
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "Mei",
                    "Jun",
                    "Jul",
                    "Ags",
                    "Sep",
                    "Okt",
                    "Nov",
                    "Des",
                ],
                labels: {
                    style: {
                        colors: "rgba(94, 96, 110, .5)",
                    },
                },
            },
            yaxis: {
                title: {
                    text: "Jumlah",
                },
            },
            fill: {
                opacity: 1,

            },
            colors: ['#28a745', '#dc3545'],
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val;
                    },
                },
            },
            grid: {
                borderColor: "#e2e6e9",
                strokeDashArray: 4,
            },
        };
        var chart1 = new ApexCharts(
            document.querySelector("#apex-earnings"),
            options1
        );

        chart1.render();
    </script>

    <script>
        var checksheet_m = @json($checksheet_m);

        var options = {
            series: checksheet_m,
            chart: {
                type: 'pie',
            },
            labels: ['SO', 'TSO'],
            colors: ['#28a745', '#dc3545'],
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

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush

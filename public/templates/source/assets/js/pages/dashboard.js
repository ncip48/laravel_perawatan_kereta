$(document).ready(function () {
    "use strict";

    var options2 = {
        chart: {
            id: "sparkline1",
            type: "area",
            height: 80,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "smooth",
        },
        fill: {
            opacity: 1,
        },
        series: [
            {
                name: "Sales",
                data: [14, 40, 35, 20, 50, 25, 49],
            },
        ],
        labels: [1, 2, 3, 4, 5, 6, 7],
        yaxis: {
            min: 0,
            max: 60,
        },
        colors: ["#FFDDB8"],
    };

    var chart2 = new ApexCharts(
        document.querySelector("#widget-stats-chart1"),
        options2
    );
    chart2.render();

    var options3 = {
        chart: {
            id: "sparkline3",
            type: "area",
            height: 80,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "smooth",
        },
        fill: {
            opacity: 1,
        },
        series: [
            {
                name: "Sales",
                data: [50, 20, 50, 40, 55, 15, 58],
            },
        ],
        labels: [1, 2, 3, 4, 5, 6, 7],
        yaxis: {
            min: 0,
            max: 60,
        },
        colors: ["#ffccce"],
    };

    var chart3 = new ApexCharts(
        document.querySelector("#widget-stats-chart2"),
        options3
    );
    chart3.render();

    var options4 = {
        chart: {
            id: "sparkline1",
            type: "area",
            height: 80,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: "smooth",
        },
        fill: {
            opacity: 1,
        },
        series: [
            {
                name: "Sales",
                data: [40, 15, 55, 32, 20, 50, 41],
            },
        ],
        labels: [1, 2, 3, 4, 5, 6, 7],
        yaxis: {
            min: 0,
            max: 60,
        },
        colors: ["#DCE6EC"],
    };

    var chart4 = new ApexCharts(
        document.querySelector("#widget-stats-chart3"),
        options4
    );
    chart4.render();
});

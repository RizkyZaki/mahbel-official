$(document).ready(function () {
    var ctx = $("#chartMediaOrder")[0].getContext("2d");

    var defaultMediaOrderCount = {
        0: 0,
        1: 0,
        2: 0,
    };

    var mediaOrderCountWithDefaults = {
        ...defaultMediaOrderCount,
        ...mediaOrderCount,
    };

    var values = Object.values(mediaOrderCountWithDefaults);
    var rawLabels = Object.keys(mediaOrderCountWithDefaults);

    var labels = rawLabels.map(function (label) {
        switch (label) {
            case "0":
                return "Menunggu";
            case "1":
                return "Diterima";
            case "2":
                return "Ditolak";
            case "4":
                return "Selesai";
            default:
                return label;
        }
    });

    var chartData = {
        labels: labels,
        datasets: [
            {
                label: "Data",
                backgroundColor: [
                    "#f4bd0e",
                    "#1ee0ac",
                    "#e85347",
                    "#4634eb",
                    "#00e9f5",
                ],
                data: values,
            },
        ],
    };

    var options = {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    };

    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: chartData,
        options: options,
    });
});

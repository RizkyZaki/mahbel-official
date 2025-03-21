$(document).ready(function () {
    var ctx = $('#chartChannelContentRecap')[0].getContext('2d');
    var labels = totalChannelContentRecap.map(function (item) {
        return item.channel;
    });

    var values = totalChannelContentRecap.map(function (item) {
        return item.total_channel;
    });

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Data',
            backgroundColor: [
                '#3F5D90',
                '#364a63',
                '#1ee0ac',
                '#09c2de',
                '#f4bd0e',
                '#e5e9f2',
            ],
            data: values,
        }]
    };

    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: chartData,
        options: options
    });
});

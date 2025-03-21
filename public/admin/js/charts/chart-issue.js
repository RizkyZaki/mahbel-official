$(document).ready(function () {
    var ctx = $('#chartTotalIssue')[0].getContext('2d');
    var labels = issueManagement.map(function (item) {
        return item.issue;
    });

    var values = issueManagement.map(function (item) {
        return item.total_issue;
    });

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Data',
            backgroundColor: [
                '#1ee0ac',
                '#e85347',
                '#8091a7',
                '#1f2b3a'
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

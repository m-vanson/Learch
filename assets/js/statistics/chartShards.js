var ctx = $("#doughnut-chartcanvas-2");
ctx.height = 200;
var options = {
        responsive: true,
        legend: {
            display: false,
        }
    };

var chartShards = new Chart(ctx, {
    type: 'horizontalBar',
    data: data,
    options: options
});

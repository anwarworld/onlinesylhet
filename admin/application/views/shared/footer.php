<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="tools/js/jquery-slim.min.js"><\/script>')</script>
<script src="tools/js/popper.min.js"></script>
<script src="tools/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="tools/js/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
<script src="tools/js/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
            },
            legend: {
                display: false,
            }
        }
    });
</script>
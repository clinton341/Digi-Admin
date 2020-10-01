<html>
  <head>
    <script type="text/javascript" src="../scripts/chart.js"></script>
  </head>
  <body>
    <div style="width: 30%; float: left; margin-top: 2%;border:1px solid #ddd;padding: 1%;line-height: 400%;font-size: 120%;color: grey;">
        <h2>Data Summary: May</h2>
        <p id="income">Total Income: 12000</p>
        <p id="expense">Total Expenses: 18000</p>
        <p>Loss: 6000</p>
    </div>
    <div style="width: 50%; margin-top: 2%;margin-right: 15%; border:1px solid #ddd;float: right;">
    <canvas id="myChart" width="300" height="300"></canvas>
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var income = document.getElementById('income');
        var expense = document.getElementById('expense');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Income', 'Expenses'],
                datasets: [{
                    label: 'Financial Summary',
                    data: [12000, 18000],
                    backgroundColor: [
                        'green',
                        'red',
                        
                        
                    ],
                    borderColor: [
                        'lightgreen',
                        'pink'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
    </div>
  </body>
</html>
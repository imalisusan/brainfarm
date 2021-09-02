<x-app-layout>
   
<!DOCTYPE html>
<html>   
<body>
<div id="container"></div>
</body>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var income_amount =  <?php echo json_encode($income_amount) ?>;
    var expenditure_amount =  <?php echo json_encode($expenditure_amount) ?>;
   
    Highcharts.chart('container', {
        title: {
            text: 'Income/Expenditure Variation'
        },
        subtitle: {
            text: 'Source: highcharts.com'
        },
         xAxis: {
            categories: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',]
        },
        yAxis: {
            title: {
                text: 'Amount'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Income',
            data: income_amount,   
        },

        {
            name: 'Expenditure',
            data: expenditure_amount,     
        },
    
    ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 300
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>
</html>
</x-app-layout>

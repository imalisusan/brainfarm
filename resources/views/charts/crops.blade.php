<x-app-layout>
   
<!DOCTYPE html>
<html>   
<body>
<div id="container"></div>
</body>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var crop_prices =  <?php echo json_encode($crop_prices) ?>;
    var names =  <?php echo json_encode($names) ?>;
   
    Highcharts.chart('container', {
        title: {
            text: 'Crop Market Price'
        },
        subtitle: {
            text: 'Source: highcharts.com'
        },
         xAxis: {
            categories: names
            //categories: ['Avocado', 'Maize', 'Cabbage', 'Mango', 'Cashew Nuts', 'Cassava', 'Coffee', 'Rice', 'Potato', 'Sweet Potato', 'Tea', 'Wheat', 'Tomato', 'Orange', 'Onion', 'Banana', 'Peas', 'Lemon', 'Kale', 'Millet', 'Sorghum', 'Beans', 'Carrot', 'Pineapple', 'Pawpaw']
        },
        yAxis: {
            title: {
                text: 'Market Price Per Kg'
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
            name: 'Market Price Per Kg',
            data: crop_prices
        }],
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

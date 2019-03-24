<?php 
include('database.php');
include('function_file.php');
$stateListObj = stateList();
?>
<script type="text/javascript" src="fusion-chart/js/fusioncharts.js"></script>
<!-- <script type="text/javascript" src="fusion-chart/js/fusioncharts.charts.js"></script> -->
<div id="chart-container"></div>
<script type="text/javascript">
 var chartInstance = new FusionCharts({
      type: 'column2D',
      width: '700', // Width of the chart
      height: '400', // Height of the chart
      dataFormat: 'json', // Data type
      renderAt:'chart-container', //container where the chart will render
      dataSource: {
          "chart": {
              "caption": "Countries With Most Oil Reserves [2017-2018]",
              "subCaption": "In MMbbl = One Million barrels",
              "xAxisName": "Country",
              "yAxisName": "Reserves (MMbbl)",
              "numberSuffix": "K",
              "theme": "fusion",
          },
          // Chart Data
          "data": [
                    <?php foreach($stateListObj as $value){ ?>
                    {
                        "label":"<?php echo $value->state;?>",
                        "value": "<?php echo $value->population;?>"
                    },
                <?php }?>
          ]
      }
});
// Render
chartInstance.render(); 
</script>

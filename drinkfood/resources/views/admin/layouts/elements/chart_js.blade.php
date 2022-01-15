<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
    var totalRevenueMonthly = <?php  echo json_encode($arrayMonthlyRevenue); ?>;
    var dataChart = [['Element', 'VND', { role: 'style' }]];
    for(var month = 13; month >= 1; month--)
    {
        dataMonth = [totalRevenueMonthly[month]['month'], totalRevenueMonthly[month]['total'], totalRevenueMonthly[month]['color']];
        dataChart.push(dataMonth);
    }
    var data = google.visualization.arrayToDataTable(dataChart);

      var options = {
        title: "<?php echo trans('chart_lang.title_chart_2')?>" + '  ' + new Date().getFullYear(),
        chartArea: {width: '50%'},
        hAxis: {
          title: "<?php echo trans('chart_lang.title_chart_2')?>" + '  ' + new Date().getFullYear(),
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: "<?php echo trans('chart_lang.month')?>",
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>
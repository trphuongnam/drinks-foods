<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var objRatioOrders = <?php echo json_encode($arrayRatioOrders);?>;      
    var arrayDataChart = [['Order', 'Number orders per month']];
    for(status = 0; status <= 4; status++)
    {
      elementArrayDataChart = [objRatioOrders[status]['status'], objRatioOrders[status]['ratio']];
      arrayDataChart.push(elementArrayDataChart);
    }
    
    var data = google.visualization.arrayToDataTable(arrayDataChart);
    var month = new Array();
      month[0] = "1";
      month[1] = "2";
      month[2] = "3";
      month[3] = "4";
      month[4] = "5";
      month[5] = "6";
      month[6] = "7";
      month[7] = "8";
      month[8] = "9";
      month[9] = "10";
      month[10] = "11";
      month[11] = "12";
  
    var paramDate = "<?php echo request()->date?>";
    var paramMonth = "<?php echo request()->month?>";
    if(paramDate != "" && paramMonth != "") 
    {
      strDate = paramDate + '/' + paramMonth + '/' + new Date().getFullYear();  
    }else{
      var date = new Date().getDate();
      var month = month[new Date().getMonth()];
      var year = new Date().getFullYear();
      strDate = date+'/'+month+'/'+year;
    }

    var options = {
      title: "<?php echo trans('chart_lang.title_chart_1');?>" + '  '+ strDate,
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
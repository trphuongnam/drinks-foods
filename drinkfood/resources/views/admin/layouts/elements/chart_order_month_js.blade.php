<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var objRatioOrders = <?php echo json_encode($arrayRatioOrders);?>;
      console.log(objRatioOrders);
      var data = google.visualization.arrayToDataTable([
        ['Order', 'Number orders per month'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
      ]);

      var options = {
        title: 'Biểu đồ thống kê đơn hàng theo tháng năm '+new Date().getFullYear(),
        pieHole: 0.4,
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
    }
  </script>
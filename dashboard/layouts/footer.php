    <!-- Essential javascripts for application to work-->
    <script src="/eCommerce/dashboard/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/eCommerce/dashboard/assets/js/popper.min.js"></script>
    <script src="/eCommerce/dashboard/assets/js/bootstrap.min.js"></script>
    <script src="/eCommerce/dashboard/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/eCommerce/dashboard/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="/eCommerce/dashboard/assets/js/plugins/chart.js"></script>
    <?php if(isset($chartJs)): ?>
    <script type="text/javascript">
      var pdata = [
        <?php
        $color = array('#F7464A','#17a2b8','#009688','#222d32');
        $highlight = array('#FF46FF','#FFa2bF','#FF968F','#FF2d32');
        foreach($chartProduct as $index => $charts): 
          ?>
      	{
          
      		value: <?php echo $charts['countP'] ?>,
      		color: "<?php echo $color[$index] ?>",
      		highlight: "<?php echo $highlight[$index] ?>",
      		label: "<?php echo $charts['name'] ?>"
      	},
        <?php
        
        endforeach ?>
      	// {
      	// 	value: 6,
      	// 	color:"#F7464A",
      	// 	highlight: "#FF5A5E",
      	// 	label: "In-Progress"
      	// }
      ]
      
      
      var ctxp = $("#pieChartDemo1").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <?php endif ?>

  </body>
</html>
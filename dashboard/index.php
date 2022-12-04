<?php
include_once  "../init.php";
include "../genral/config.php";

  $chartJs =true;
    $orderReviewing = "SELECT * FROM `order_manager` WHERE order_status = 1";
    $sReviewing = mysqli_query($connectSQL ,$orderReviewing);
    $numRowReviewing = mysqli_num_rows($sReviewing);
    
    $orderDelivered = "SELECT * FROM `order_manager` WHERE order_status = 4";
    $sDelivered = mysqli_query($connectSQL ,$orderDelivered);
    $numRowDelivered = mysqli_num_rows($sDelivered);
    
    $orderProfits = "SELECT SUM(sumTotal) AS Profits FROM `order_manager` WHERE order_status = 4";
    $sProfits = mysqli_query($connectSQL ,$orderProfits);
    $numRowProfits = mysqli_fetch_assoc($sProfits);
    $Profits = $numRowProfits['Profits'];

    $selectOrders = "SELECT * FROM `order_manager`";
    $sOrders = mysqli_query($connectSQL ,$selectOrders);
    $numRowOrders = mysqli_num_rows($sOrders);

    $selectProduct = "SELECT * FROM `product`";
    $sProduct = mysqli_query($connectSQL ,$selectProduct);
    $numRowProduct = mysqli_num_rows($sProduct);


    $selectCategory = "SELECT * FROM `category`";
    $sCategory = mysqli_query($connectSQL ,$selectCategory);
    $numRowCategory = mysqli_num_rows($sCategory);

    $chartQuery = "SELECT category.name, COUNT(product.id) AS countP FROM `product` JOIN category ON product.categoryId =category.id GROUP BY categoryId";
    $chartProduct = mysqli_query($connectSQL ,$chartQuery);
    include "../genral/functions.php";
    include "layouts/header.php";
    include "layouts/sidebar.php";
?>

    <main class="app-content">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Products</h4>
              <p><b><?php echo $numRowProduct  ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Category</h4>
              <p><b><?php echo $numRowCategory  ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Profits</h4>
              <p><b></i> <?php echo $Profits  ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Orders</h4>
              <p><b><?php echo $numRowOrders  ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Order Reviewing</h4>
              <p><b><?php echo $numRowReviewing  ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Order Delivered On</h4>
              <p><b><?php echo $numRowDelivered  ?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
        
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Products in Categories</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo1"></canvas>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php
include "layouts/footer.php";

?>
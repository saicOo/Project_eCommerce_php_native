<?php include "../shared/header.php" ;
 include "../shared/nav_admin.php" ;
 include "../genral/config.php";
include "../genral/functions.php";
 notUserPermissions();

 if(isset($_SESSION['admin'])){
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
    

 ?>
 <div class="dashboard">
     <h1 class="text-center pt-2 display-2" style="color:#7f6032">Dashboard</h1>
     <div class="container col-md-10 ">
    <div class="stats text-center my-5 ">
      <div class="row mr-0 ml-0">
        <div class="col-md-6 px-md-0 order-2 order-md-0 p-4">
          <h2>eCommerce Stats</h2>
          <hr>
          <div class="row justify-content-around mr-0 ml-0">
              
              <div class="card text-white bg-primary mb-3 col-5">
                <div class="card-body">
                  <h5 class="card-title">Products</h5>
                  <h4><i class="fas fa-vest"></i> <?php echo $numRowProduct  ?></h4>  
                </div>
              </div>
              
              <div class="card text-white bg-secondary mb-3 col-5">
                <div class="card-body">
                  <h5 class="card-title">Category</h5>
                  <h4><i class="far fa-flag fa-1x mt-2 "></i> <?php echo $numRowCategory  ?></h4>  
                </div>
              </div>
              <div class="card text-white bg-warning mb-3 col-5">
                <div class="card-body">
                  <h5 class="card-title">Profits</h5>
                  <h4><i class="fas fa-dollar-sign"></i> <?php echo $Profits  ?></h4>  
                </div>
              </div>
              
              <div class="card text-white bg-info mb-3 col-5">
                <div class="card-body">
                  <h5 class="card-title">Orders</h5>
                  <h4><i class="fas fa-shopping-bag"></i> <?php echo $numRowOrders  ?></h4>  
                </div>
              </div>

              <div class="card text-white bg-danger mb-3 col-5">
                <div class="card-body">
                  <h5 class="card-title">Order Reviewing</h5>
                  <h4><i class="fas fa-check"></i> <?php echo $numRowReviewing  ?></h4>  
                </div>
              </div>

              <div class="card text-white bg-success mb-3 col-5">
                <div class="card-body">
                  <h5 class="card-title">Order Delivered On</h5>
                  <h4><i class="fas fa-check-double"></i> <?php echo $numRowDelivered  ?></h4>  
                </div>
              </div>
              </div>
          <!-- div/ -->
        </div>
        <div class="col-md-6 p-md-0 image-stat order-0 order-md-2">
          <div class="overlay"></div>
          <img src="/eCommerce/image/stat_bg.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
 </div>
 <?php }else{ ?>
    
    <div class="dashboard">
     
     
 </div>
    <?php } ?>
    <?php include "../shared/footer.php" ?>
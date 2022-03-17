<?php 
session_start(); 

if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location: /eCommerce/dashboard/list_dashboard.php");
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<?php if(isset($_SESSION['admin'])): ?>
  <a class="navbar-brand" href="/eCommerce/index.php"><img class='img-logo' src="https://www.designmantic.com/images/fashion-logo-portfolio-1.png" alt=""></a>
  <a class="navbar-brand"  href="/eCommerce/dashboard/list_dashboard.php"><?php echo $_SESSION['admin'];?></a>
  <?php else:?>
    <a class="navbar-brand" href="/eCommerce/index.php"><img class='img-logo' src="https://www.designmantic.com/images/fashion-logo-portfolio-1.png" alt=""></a>
  <?php endif;?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if(isset($_SESSION['admin'] )) :?>  
  <ul class="navbar-nav mr-auto">
  <li class="nav-item">
        <a class="nav-link" href="/eCommerce/Dashboard/list_dashboard.php">dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/dashboard/orderCustomer/order_customer.php">Orders</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/eCommerce/dashboard/category/add.php">category Add</a>
          <a class="dropdown-item" href="/eCommerce/dashboard/category/list.php">category List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/eCommerce/dashboard/product/add.php">product Add</a>
          <a class="dropdown-item" href="/eCommerce/dashboard/product/list.php">product List</a>
      </li>
      
      <?php if($_SESSION['role'] == 0): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/eCommerce/dashboard/admin/add.php">Admin Add</a>
          <a class="dropdown-item" href="/eCommerce/dashboard/admin/list.php">Admin List</a>
      </li>
    </ul>
    <?php endif; ?>
  </ul>
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" >Logout</button>
    </form>
    <?php else : ?>
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <a href="/eCommerce/dashboard/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" >Login</a>
    </form>
    <?php endif; ?>
  </div>
</nav>
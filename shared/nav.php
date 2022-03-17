<?php 

session_start(); 

if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location: /eCommerce/index.php");
}
$host = "localhost";
$user = "root";
$password= "";
$dbName = "ecommerce";

$connectSQL = mysqli_connect($host , $user , $password , $dbName);

$slecet_category = "SELECT * FROM `category`";
$s_category = mysqli_query($connectSQL ,$slecet_category );


if(isset($_SESSION['id'])){
$ccId = $_SESSION['id'];
$slecetOrder = "SELECT * FROM `orders` JOIN `product` , `customers` WHERE customers.id = $ccId AND orders.productId = product.id AND customerId = customers.id";
$sc = mysqli_query($connectSQL ,$slecetOrder);
$numRowOrder = mysqli_num_rows($sc);
}
if(isset($_SESSION['id'])){
$cId = $_SESSION['id'];
$slecetCstum = "SELECT * FROM `customers` WHERE customers.id = $cId ";
$sCstum= mysqli_query($connectSQL ,$slecetCstum);
$rowCstum = mysqli_fetch_assoc($sCstum);
    $nameR = $rowCstum['name'];
    $email = $rowCstum['email'];
    $addressR = $rowCstum['address'];
    $image = $rowCstum['image_user'];
}


?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="/eCommerce/index.php">Fashion <span class="text-warning">Store</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/eCommerce/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php foreach($s_category as $item){ ?>
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/collection/collection.php?category=<?php echo $item['id'];?>"><?php echo $item['name']; ?></a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/blog/blog.php">blog</a>
      </li>
      <?php if(isset($_SESSION['customer'] )) :?>
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/order/cart.php">Cart
        ( <span class='count_cart'> <?php echo $numRowOrder ;?></span> )</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/customer_requests/customer_requests.php">requests</a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/dashboard/list_dashboard.php">Admin</a>
      </li>
      <?php endif; ?>
    </ul>
    <div class="box_srarch">
    <form class="form-inline my-2 my-lg-0"  autocomplete="off" method="GET">
      <input id="search_text" name="search_term" class="form-control w-100" type="text" placeholder="Search" aria-label="Search">
      <button name="search" class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <div class="search-box" id="search-box"></div>
      </div>
    <?php if(isset($_SESSION['customer'] )) :?>
      <div class="form-inline my-2 my-lg-0 ml-auto dropdown ">
        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><img class='img-logo' src="/eCommerce/user/upload_user_image/<?php echo $image ?>" alt=""></a>
        
        <div class="dropdown-menu custm-drop" aria-labelledby="dropdownMenuLink">
        <div class="main-header p-3 border-bottom border-primary bg-primary text-white">
  <div class="row no-gutters">
    <div class="col-md-4">
    <img class='img-fluid rounded-circle border border-light' src="/eCommerce/user/upload_user_image/<?php echo $image ?>" alt="...">
  </div>
    <div class="col-md-8 pl-2">
      <h6><?php echo $nameR ?></h6>
      <p><small class="text-white-50"><?php echo $email ?></small></p>
      </div>
  </div>
</div>
    <a class="dropdown-item border-bottom" href="/eCommerce/user/user_profile.php"><i class="fas fa-user"></i> Profile</a>
    <a class="dropdown-item border-bottom" href="/eCommerce/order/cart.php"><i class="fas fa-shopping-cart"></i> cart</a>
    <a class="dropdown-item text-danger" href="/eCommerce/index.php?logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
      </div>
    <?php else : ?>
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <a href="/eCommerce/user/signUp.php" class="btn btn-outline-info my-2 my-sm-0 " >Sign Up</a>
      <a href="/eCommerce/user/login.php" class="btn btn-outline-success my-2 my-sm-0 ml-3" >Login</a>
    </form>
    <?php endif; ?>
  </div>
</nav>
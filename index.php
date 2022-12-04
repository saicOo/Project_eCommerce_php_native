<?php
include_once  "./init.php";
include "./genral/config.php";
include "./genral/functions.php";


 $slecet = "SELECT * FROM product";
$s = mysqli_query($connectSQL ,$slecet );
 $slecetMen = "SELECT category.name AS categoryName , product.id , product.title , product.descriptions , product.price , product.image FROM category JOIN product ON categoryId = category.id AND product.categoryId = 1";
$sMen = mysqli_query($connectSQL ,$slecetMen );
 $slecetFmale = "SELECT category.name AS categoryName , product.id , product.title , product.descriptions , product.price , product.image FROM category JOIN product ON categoryId = category.id AND product.categoryId = 2";
$sFmale = mysqli_query($connectSQL ,$slecetFmale );
// get search
if(isset($_GET['search'])){
  $search = $_GET['search_term'];
  header("location: $root_path/search/search.php?search=$search");
}
include "shared/header.php" ;
 include "shared/nav.php" ;
 ?>
 <section id="home">
<div class="home">
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="overlay"></div>
      <img src="https://image.freepik.com/free-photo/joyful-girl-with-curly-brown-hair-dancing-purple-background-with-kissing-face-expression_197531-7071.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class='display-4'>Women Colection 2022</h5>
        <h2 class='display-2 pb-4 mb-3'>NEW SEASON</h2>
        <a href="<?php echo $root_path ?>/collection/collection.php?category=2" class="btn btn-outline-info rounded-pill" >SHOP NOW</a>
      </div>
    </div>
    <div class="carousel-item">
    <div class="overlay"></div>
      <img src="https://images.pexels.com/photos/7544694/pexels-photo-7544694.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h5 class='display-4'>Men Colection 2022</h5>
        <h2 class='display-2 pb-4 mb-3'>NEW ARRIVAL</h2>
        <a href="<?php echo $root_path ?>/collection/collection.php?category=1" class="btn btn-outline-info rounded-pill" >SHOP NOW</a>
      </div>
    </div>
    <div class="carousel-item">
    <div class="overlay"></div>
      <img src="https://images.pexels.com/photos/5264898/pexels-photo-5264898.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h5 class='display-4'>Men New-Season</h5>
        <h2 class='display-2 pb-4 mb-3'>JACETS & COATS</h2>
        <a href="<?php echo $root_path ?>/collection/collection.php?category=1" class="btn btn-outline-info rounded-pill" >SHOP NOW</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
  <i class="fas fa-caret-left fa-4x" aria-hidden="true"></i>

  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
  <i class="fas fa-caret-right fa-4x" aria-hidden="true"></i>
  </button>
</div>
</div>
<div class="product">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        
        <a href="<?php echo $root_path ?>/collection/collection.php?category=2">
        <div class="card">
          <img src="https://image.freepik.com/free-photo/two-cheerful-girls-sitting-floor-together-looking-away-white-wall_171337-2652.jpg" alt="">
          <div class="overlay"></div>
          <div class="card-body">
          <h5>Women</h5>
          <span>New</span>
        </div>
        <h4>Shop Now</h4>
        </div>
      </a>
      </div>
      <div class="col-md-6">
      <a href="<?php echo $root_path ?>/collection/collection.php?category=1">
        <div class="card">
        <img src="https://image.freepik.com/free-photo/portrait-handsome-smiling-stylish-young-man-model-wearing-jeans-clothes-sunglasses-fashion-man_158538-5015.jpg" alt="">
        <div class="overlay"></div>
        <div class="card-body">
          <h5>Men</h5>
          <span>New</span>
        </div>
        <h4>Shop Now</h4>
        </div>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="product_overview">
    <div class="container">
      <div class="landing">
        <h2>PRODUCT OVERVIEW</h2>
        <div class="row">
          <div class="col-6">

  </div>
  <!-- filter product -->

<div id="content_product" class="content_product mt-4">
  <div id="content-filter" class="row">
  <?php foreach($s as $data){ ?>
    <div class="col-lg-3 col-md-4 col-12 mb-3">
      <div class="card wow animate__bounceInUp" >
        <div class="card-head">
          <img src="./dashboard/product/upload/<?php echo $data['image'] ; ?>" class="card-img-top" alt="...">
          <a href="<?php echo $root_path ?>/product_profile/profile.php?pId=<?php echo $data['id'];?>" class="btn btn-light quick_view rounded-pill">Quick View</a>
        </div>
        <div class="card-body p-2">
          <h5 class='card-title'><?php echo $data['title'] ; ?></h5>
          <p class=""><?php echo '$' . $data['price'] ;?></p>
        </div>
      </div>
    </div>
    <?php }?>
        </div>
      </div>
    </div>
  </div>
  </section>
  <?php if(isset($_SESSION['customer'])): ?>
<?php include "shared/contact.php" ?>
<?php endif; ?>
<?php include "shared/footer.php" ?>

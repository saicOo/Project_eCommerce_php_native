<?php include "../shared/header.php" ;
 include "../shared/nav.php" ;
 include "../genral/config.php";
 include "../genral/functions.php";
if(isset($_GET['category'])){
  $category = $_GET['category'];
  // select table category 1 row
  $slecetCategory = "SELECT * FROM category WHERE category.id = $category";
 $sCategory = mysqli_query($connectSQL ,$slecetCategory );
 $fetchCategory= mysqli_fetch_assoc($sCategory);
// select table product join category
  $slecetProduct = "SELECT * FROM category JOIN product ON categoryId = category.id AND product.categoryId = $category";
 $sProduct = mysqli_query($connectSQL ,$slecetProduct );
 $numRowSearch = mysqli_num_rows($sProduct);
}

if(isset($_GET['search'])){
    $search_term = mysqli_real_escape_string($connectSQL, $_GET['search_term'] );
    $slecet_search = "SELECT * FROM category JOIN product ON categoryId = category.id AND product.categoryId = $category WHERE title LIKE '%$search_term%'";
    $sMen = mysqli_query($connectSQL ,$slecet_search );
    $numRowSearch = mysqli_num_rows($sProduct);
  }

 ?>
<section id="home">
  
    <div class="product_carousel">
        <div class="container">
        <div class="Advertisement">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="overlay"></div>
      <img src="https://media.gq.com/photos/5871a1deb745bdd27295822e/master/pass/London-Collection-Mens-Day1-23.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <div class="overlay"></div>
      <img src="https://hips.hearstapps.com/harpersbazaaruk.cdnds.net/16/23/2560x1280/landscape-1465315975-tinie-tempah.jpg?resize=1200:*" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <div class="overlay"></div>
      <img src="https://images.indianexpress.com/2021/04/trousers_1200_getty-1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
    </div>

            <div class="landing pb-2 mt-5">
                <div class="row">
                    <div class="col-6">
                        <h2><?php echo $fetchCategory['name'] ?> collection fashion</h2>
                        </div>
                          <!-- filter product -->
          <div class="col-6">
          </div>
        </div>
        <div id="content_product" class="content_product py-5">
            <!-- men product -->
            <?php if($numRowSearch > 0  ): ?>
                <div id="content-filter" class="row">
                        <?php foreach($sProduct as $data){ ?>
                            <div class="col-lg-3 col-md-4 col-12 mb-3">
                                <div class="card wow animate__bounceInUp">
                                        <div class="card-head">
                                            <img src="../dashboard/product/upload/<?php echo $data['image'] ; ?>" class="card-img-top" alt="...">
                                            <a href="/eCommerce/product_profile/profile.php?pId=<?php echo $data['id'];?>" class="btn btn-light quick_view rounded-pill">Quick View</a>
                                        </div>        
                                    <div class="card-body">
                                        <h5 class='card-title'><?php echo $data['title'] ; ?></h5>
                                        <p class=""><?php echo '$' . $data['price'] ;?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }?>  
                </div>
                <?php else : ?>
                    <div class="not_found">
                    </div>
                    <?php endif; ?>
            </div>
        </div>
        </div>
    </div>
</section>
<?php if(isset($_SESSION['customer'])): ?>
<?php include "../shared/contact.php" ?>
<?php endif; ?>
<?php include "../shared/footer.php" ?>
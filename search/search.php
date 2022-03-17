<?php include "../shared/header.php" ;
 include "../shared/nav.php" ;
 include "../genral/config.php";
 include "../genral/functions.php";




if(isset($_GET['search'])){
    $search_term = mysqli_real_escape_string($connectSQL, $_GET['search_term'] );
    $slecet_search = "SELECT * FROM product WHERE title LIKE '%$search_term%'";
    $sS = mysqli_query($connectSQL ,$slecet_search );
    // $fetchSearch= mysqli_fetch_assoc($sS);
    $numRowSearch = mysqli_num_rows($sS);
  }else{
    $numRowSearch = 0;
  }

 ?>
<section id="home">
    <div class="product_overview">
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
                        <h2>research results : <span class="text-danger"><?php if(isset($_GET['search'])){echo $numRowSearch ;}?></span></h2>
                    </div>
                         <!-- filter product -->
          <div class="col-6">
          </div>
        </div>
        <div id="content_product" class="content_product mt-4">
                <?php if($numRowSearch > 0  ): ?>
                  <div id="content-filter" class="row">
                        <?php foreach($sS as $data){ ?>
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
</section>
<?php include "../shared/footer.php" ?>
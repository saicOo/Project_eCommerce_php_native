<?php
include_once  "../init.php";
include "../genral/config.php";
include "../genral/functions.php";
include "../shared/header.php" ;
 include "../shared/nav.php" ;
//  SELECT * FROM comment_blog JOIN blog , customers WHERE customers.id = comment_blog.customer_Id
//  blog
 $slecet = "SELECT * FROM customers JOIN blog ON customers.id = blog.customerId";
$s = mysqli_query($connectSQL ,$slecet );
$numRow = mysqli_num_rows($s);

// comment
$slecetc = "SELECT * FROM customers JOIN comment_blog , blog WHERE customers.id = comment_blog.customer_Id AND comment_blog.blog_Id = blog.blogId";
$sc = mysqli_query($connectSQL ,$slecetc );
$numRowc = mysqli_num_rows($sc);


if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM blog WHERE blogId = $id";
  mysqli_query($connectSQL, $delete);
  header("location: $root_path/blog/blog.php");
}

if(isset($_SESSION['id'])){
  $ccId = $_SESSION['id'];
}
$add= 0;
if(isset($_GET['add'])){
  if(isset($_SESSION['customer'])){ 
  $add = $_GET['add'];
  if(isset($_POST['send'])){
    $comment = $_POST['comment'];
    if(empty($comment)){
      $errorcomment[]="The comment field is empty!";
    }elseif(strlen($comment)>500){
      $errorcomment[]="(500) max for this field!";
    }
    if(empty($errorcomment)){
      $insertc = "INSERT INTO `comment_blog` VALUES (NULL ,'$comment',$ccId,$add)";
      $ic = mysqli_query($connectSQL ,$insertc);
      header("location: $root_path/blog/blog.php");
    }
     }}else{
      header("location: $root_path/user/login.php");
    }
  }
  if(isset($_GET['deleteC'])){
    $idC = $_GET['deleteC'];
    $deleteC = "DELETE FROM comment_blog WHERE id_comment = $idC";
    mysqli_query($connectSQL, $deleteC);
    header("location: $root_path/blog/blog.php");
  }
 ?>
<section id="blog">
  
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
<!-- blog -->
            <div class="content_blog py-5">
  
                        <h2 class="wow animate__backInLeft text-center py-5">customers <span>blog</span></h2>
                        <?php if($numRow > 0  ): ?>
            <?php foreach($s as $data){ ?>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="trainer-item wow animate__backInLeft">
                        <img class="card-img" src="../user/upload_user_image/<?php echo $data['image_user'] ?>" alt="">
                        <div class="down-content pb-3">
                            <span class="font-weight-bold" ><?php echo $data['name'] ;?></span>
                            <h4 class="text-center"><?php echo $data['message'] ;?></h4>
                            <?php if(isset($data['customerId']) == isset($ccId) ): ?>
                            <?php if($data['customerId'] == $ccId ): ?>
                            <a href="<?php echo $root_path ?>/blog/blog.php?delete=<?php echo $data['blogId']; ?> " class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <span><?php echo $data['time_blog']; ?></span>
                            <div class="box-comment">
                              <h5>COMMENTS :</h5>
                              <hr>
                            <?php foreach($sc as $datac){ ?>
                              <?php if($data['blogId'] == $datac['blog_Id']): ?>
                            <div class="content">
                    <img src="../user/upload_user_image/<?php echo $datac['image_user'] ?>" alt="">
                    <div class="text">

                      <h6><?php echo $datac['comment'] ?>
                      <p><?php echo $datac['name'] ?></p>
                    </h6> 
                    </div>
                    <?php if( isset($datac['customer_Id']) == isset($ccId) ): ?>
                    <?php if( $datac['customer_Id'] == $ccId ): ?>
                            <a href="<?php echo $root_path ?>/blog/blog.php?deleteC=<?php echo $datac['id_comment']; ?> " class="btn btn-outline-danger ml-3"><i class="far fa-minus-square"></i></a>
                            <?php endif; ?>
                            <?php endif; ?>
                  </div>
                  <?php endif; ?>
                  <?php } ?>
                </div>
                            <a href="<?php echo $root_path ?>/blog/blog.php?add=<?php echo $data['blogId']; ?> " class="btn text-info" ><i class="far fa-comment-dots"></i> comment....</a>
                        </div>
                        <?php  if(isset($_GET['add'])  && $data['blogId'] == $add ): ?>
                        <?php  if($_GET['add']  && $data['blogId'] == $add ): ?>
                        <form class="form-inline" method="POST">
                        <div class="form-group mx-sm-3 ">
                          <input type="text" class="form-control"  placeholder="comment" name="comment" >
                          <button name="send" type="submit" class="btn btn-primary">Send</button>
                          <?php if(!empty($errorcomment)):  ?>
                          </div>
                          <div class="alert alert-danger" role="alert">
                      <?php echo $errorcomment[0] ;?>
                    </div>
                    <?php endif; ?>
                      </form>
                      <?php endif; ?>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php }?>
            </div>
        </div>
        <?php else : ?>
                    <div class="not_found">
                    </div>
                    <?php endif; ?>
    </div>
</section>
<?php if(isset($_SESSION['customer'])): ?>
<?php include "../shared/contact.php" ?>
<?php endif; ?>
<?php include "../shared/footer.php" ?>
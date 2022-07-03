<?php 
include "../genral/config.php";
include "../genral/functions.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `customers` Where `email` = '$email' and password = '$password'";
    $s = mysqli_query($connectSQL ,$select);
    $numRow = mysqli_num_rows($s);
     $row = mysqli_fetch_assoc($s);
     if($numRow > 0){
       $_SESSION['customer'] = $email;
       $_SESSION['customerName'] = $row['name'];
       $_SESSION['id'] = $row['id'];
       header("location: /eCommerce/index.php");
      }else{
        
          $errorEmail[]="Email or password error!";
        
      }

}
include "../shared/header.php"; 
 include "../shared/nav.php"; 
?>
<section class='Login_page pt-5'>
    <div class="login">
      <div class="row mr-0 ml-0">
        <div class="col-md-6 px-md-0 pt-5">
          <div class="text-center">
            <img style="width:200px" src="https://www.designmantic.com/images/fashion-logo-portfolio-1.png" alt="">
          </div>
          <div class="form">
          <h2 class="text-center">Login</h2>
          <form method="POST">
            <div class="form-group">
              <label for="inputemail4">email</label>
              <input value="<?php if(isset($_POST['email'])  ){echo $_POST['email'];}  ;?>"  name='email' type="email" class="form-control" id="inputname4" placeholder="email">
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <div class="content_password">
                <input value="<?php if(isset($_POST['password'])  ){echo $_POST['password'];}  ;?>" name='password' type="password" class="form-control " id="inputPassword" placeholder="Password">
                <i class="fas fa-eye showPass" onclick="showpas()" id="showPassword"></i>
              </div>
            </div>
                  <?php if(!empty($errorEmail)):  ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $errorEmail[0] ;?>
                </div>
                  <?php endif; ?>
              <div class="text-center form-group">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
              </div>
          </form>
          </div>
        </div>
        <div class="col-md-6 p-md-0 image-login d-md-block d-none">
          <img src="/eCommerce/image/login-image.jpg" alt="">
        </div>
    </div>
</section>
<?php include "../shared/footer.php" ?>
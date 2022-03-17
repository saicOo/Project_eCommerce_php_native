<?php include "../shared/header.php"; 
 include "../shared/nav.php"; 
 include "../genral/config.php";
include "../genral/functions.php";

if(isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  if(empty($name)){
    $errorName[]="The name field is empty!";
  }elseif(strlen($name)>25){
    $errorName[]="(20) max for this field!";
  }
  if(empty($email)){
    $errorEmail[]="The email field is empty!";
  }elseif(strlen($email)>50){
    $errorEmail[]="(50) max for this field!";
  }
  if(empty($password)){
    $errorPassword[]="The Password field is empty!";
  }elseif(strlen($password)>12){
    $errorPassword[]="(12) max for this field!";
  }elseif(strlen($password)<4){
    $errorPassword[]="(4) minimum for this field!";
  }
  if(empty($address)){
    $errorAddress[]="The address field is empty!";
  }elseif(strlen($address)>25){
    $errorAddress[]="(20) max for this field!";
  }
  if(empty($phone)){
    $errorPhone[]="The phone field is empty!";
  }elseif(strlen($phone) != 11){
    $errorPhone[]="Enter (11) numbers!";
  }
  $select = "SELECT * FROM `customers` Where `email` = '$email'";
  $s = mysqli_query($connectSQL ,$select);
  $numRow = mysqli_num_rows($s);
   if($numRow > 0){
    $errorEmail[]="This name is already in use: enter a new name!";
    }


  if(empty($errorName) && empty($errorEmail) && empty($errorPassword) && empty($errorAddress) && empty($errorPhone) ){
    $insert = "INSERT INTO customers (`id`,`name`, `email` ,`password`, `phone`, `address`) Values (NULL,'$name','$email','$password','$phone','$address')";
  $i = mysqli_query($connectSQL, $insert);
  header("location: /eCommerce/index.php");
  }



  
}
?>

<section class='Sign_page pt-5'>
    <div class="Sign">
      <div class="row mr-0 ml-0">
        <div class="col-md-6 px-md-0 pt-5">
          <div class="text-center">
            <img style="width:200px" src="https://www.designmantic.com/images/fashion-logo-portfolio-1.png" alt="">
          </div>
          <div class="form">
          <h2 class="text-center">Sign Up</h2>
          <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputemail4">email</label>
      <input value="<?php if(isset($_POST['email'])  ){echo $_POST['email'];}  ?>" name='email' type="text" class="form-control" id="inputemail4" placeholder="Email">
      <?php if(!empty($errorEmail)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorEmail[0] ;?>
</div>
<?php endif; ?>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <div class="content_password">
        <input value="<?php if(isset($_POST['password'])  ){echo $_POST['password'];}  ?>" name='password' type="password" class="form-control" id="inputPassword" placeholder="Password">
        <i class="fas fa-eye showPass" onclick="showpas()" id="showPassword"></i>
      </div>
      <?php if(!empty($errorPassword)):  ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $errorPassword[0] ;?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputname4">name</label>
      <input value="<?php if(isset($_POST['name'])  ){echo $_POST['name'];}  ?>" name='name' type="text" class="form-control" id="inputname4" placeholder="name">
      <?php if(!empty($errorName)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorName[0] ;?>
</div>
<?php endif; ?>
    </div>
  <div class="form-group">
    <label for="inputphone">phone</label>
    <input value="<?php if(isset($_POST['phone'])  ){echo $_POST['phone'];}  ?>" name='phone' type="text" class="form-control" id="inputphone" placeholder="phone">
    <?php if(!empty($errorPhone)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorPhone[0] ;?>
</div>
<?php endif; ?>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input value="<?php if(isset($_POST['address'])  ){echo $_POST['address'];} ?>" name='address' type="text" class="form-control" id="inputAddress" placeholder="Address">
    <?php if(!empty($errorAddress)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorAddress[0] ;?>
</div>
<?php endif; ?>
  </div>

  <div class="text-center form-group">
    <button type="submit" name="send" class="btn btn-primary">Sign Up</button>
  </div>

</form>
          </div>
        </div>
        <div class="col-md-6 p-md-0 image-Sign d-md-block d-none">
          <img src="/eCommerce/image/login-image.jpg" alt="">
        </div>
    </div>
</section>
<?php include "../shared/footer.php" ?>
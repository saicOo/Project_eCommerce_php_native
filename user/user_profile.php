<?php include "../shared/header.php"; 
 include "../shared/nav.php"; 
 include "../genral/config.php";
include "../genral/functions.php";


    $showBtn = true;
    $idp = $_SESSION['id'];
    $select = "SELECT * FROM customers where id = $idp";
    $sr = mysqli_query($connectSQL , $select);
    $row = mysqli_fetch_assoc($sr);
    $nameR = $row['name'];
    $phoneR = $row['phone'];
    $addressR = $row['address'];
    $image = $row['image_user'];

  $name = "";
  $password = "";
  $address = "";
  $phone = "";
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select = "SELECT * FROM customers where id = $id";
    $ss= mysqli_query($connectSQL, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'] ;
    $address = $row['address'] ;
    $password = $row['password'] ;
    $phone = $row['phone'] ;
    include "./update_user.php"; 
if(isset($_POST['update'])){
  $name = $_POST['name'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  if(empty($name)){
    $errorName[]="The name field is empty!";
  }elseif(strlen($name)>25){
    $errorName[]="(20) max for this field!";
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

  if(empty($errorName) && empty($errorPassword) && empty($errorAddress) && empty($errorPhone) ){
    $updateQ =  "UPDATE customers SET name='$name',password='$password',address='$address',phone='$phone' WHERE id = $id";
  $u = mysqli_query($connectSQL, $updateQ);
  $_SESSION['customer'] = $name;
  }

}
}
if(isset($_POST['add'])){
 $location = './upload_user_image/';
   $image_type = $_FILES['image']['type'];
   $image_name = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp ,$location . $image_name );
 
      $idp = $_SESSION['id'];
      $updateQ =  "UPDATE customers SET `image_user`='$image_name' WHERE id = $idp";
      $u = mysqli_query($connectSQL, $updateQ);
      header("location: /eCommerce/user/user_profile.php");
    }




    userPermissions();
?>
 <br>
<div class="container col-md-4 cart pt-4 ">
  <br>
    <div class="user_profile pt-4">
    <div class="card ">
  <div class="card-header text-center "> 
    <div class='profile-image'>
    <img src="./upload_user_image/<?php echo $image ?>" alt="image" class="image_profile_user">
    <form method="POST" enctype="multipart/form-data">
      <label for="image" class="icone-image"><i class="far fa-image"></i></label>
      <input type="file" name="image" id="image">
      <button name='add' class='add_image btn btn-success'>Add</button>
    </form>
    </div>
  </div>
  <div class="card-body">
    <h5 class="card-title">NAME : <?php echo $nameR  ?></h5>
    <p class="card-text">ADDRESS : <?php echo $addressR  ?></p>
    <p class="card-text">PHONE : <?php echo $phoneR  ?></p>
    <div class="text-center mt-5">
      <a href="/ecommerce/user/user_profile.php?edit=<?php echo $idp; ?>" class="btn btn-primary">Update Data <i class="fas fa-user-edit"></i></a>
    </div>
  </div>
</div>
    </div>
</div>
 
<?php include "../shared/footer.php" ?>
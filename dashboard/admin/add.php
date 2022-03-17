<?php include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";



if($_SESSION['role'] == 0 && $_SESSION['admin'] ){
  
  if(isset($_POST['sginUp'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

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
    $select = "SELECT * FROM `admins` Where name = '$name'";
    $s = mysqli_query($connectSQL ,$select);
    $numRow = mysqli_num_rows($s);
     if($numRow > 0){
      $errorName[]="This name is already in use: enter a new name!";
      }


    if(empty($errorName) && empty($errorPassword) ){
      $insert = "INSERT INTO `admins` VALUES (NULL ,'$name','$password',$role)";
      $i = mysqli_query($connectSQL ,$insert);
    }
  }
  $name = "";
  $password = "";
  $update = false;
if(isset($_GET['edit'])){
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * FROM admins where id = $id";
  $ss= mysqli_query($connectSQL, $select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'] ;
if(isset($_POST['update'])){
  $name = $_POST['name'];
  $password = $_POST['password'];
  $role = $_POST['role'];
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
  
  if(empty($errorName)){
  $updateQ =  "UPDATE admins SET name='$name' , password='$password',`roles`=$role WHERE id = $id";
  $u = mysqli_query($connectSQL, $updateQ);
  header("location: /eCommerce/dashboard/admin/list.php");
  }
}
}
?>
<div class="page_admin">
<div class="container py-4">
    <div class="card text-white bg-dark">
<div class="card-header">
<?php if($update): ?>
    <div class="heading-landing text-center ">Update Admin <?php echo $id?></div>
  <?php else: ?>
    <div class="heading-landing text-center ">sgin Up Admin</div>
    <?php endif;?>
</div>
  <div class="card-body">
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname4">name</label>
      <input value="<?php echo $name ?>"  name='name' type="text" class="form-control" id="inputname4" placeholder="name">
    <?php if(!empty($errorName)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorName[0] ;?>
</div>
<?php endif; ?>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <div class="content_password">
      <input name='password' type="password" class="form-control" id="inputPassword" placeholder="Password">
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
  <label>ROle</label>

  <select class="form-control" name="role">
    <option value="0">All Accsess</option>
    <option value="1">Semi Accsess</option>
  </select>    

</div>
<?php if($update): ?>
  <div class="text-center form-group col-12">
    <button name="update" class="btn btn-info">Update Data</button>
  </div>
  <?php else: ?>
  <div class="text-center form-group col-12">
  <button type="submit" name="sginUp" class="btn btn-primary">sgin Up</button>
  </div>
  <?php endif; ?>


  
</form>
</div>
</div>
</div>
</div>
<?php }else{
  header("location: /eCommerce/dashboard/admin/login.php");
}



include "../../shared/footer.php" ?>
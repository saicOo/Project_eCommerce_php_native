<?php include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";


if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `admins` Where name = '$name' and password = '$password'";
    $s = mysqli_query($connectSQL ,$select);
    $numRow = mysqli_num_rows($s);
     $row = mysqli_fetch_assoc($s);
     if($numRow > 0){
       $_SESSION['admin'] = $name;
       $_SESSION['role'] = $row['roles'];
       header("location: /eCommerce/dashboard/list_dashboard.php");
      }else{
        $errorName[]="Username or password error!";
    }

}

?>
<div class="page_admin">
<div class="container col-md-4 py-4">
    <div class="card text-white bg-dark">
<div class="card-header">Login</div>
  <div class="card-body">
<form method="POST">
<div class="form-group">
      <label for="inputname4">name</label>
      <input value="<?php if(isset($_POST['name'])  ){echo $_POST['name'];}  ;?>"  name='name' type="text" class="form-control" id="inputname4" placeholder="name">
    </div>
    <div class="form-group">
      <label for="inputPassword">Password</label>
      <div class="content_password">
      <input value="<?php if(isset($_POST['password'])  ){echo $_POST['password'];}  ;?>" name='password' type="password" class="form-control" id="inputPassword" placeholder="Password">
      <i class="fas fa-eye showPass" onclick="showpas()" id="showPassword"></i>
      </div>
    </div>
    <?php if(!empty($errorName)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorName[0] ;?>
</div>
<?php endif; ?>
  <div class="text-center form-group">
    <button type="submit" name="login" class="btn btn-primary">Login</button>
  </div>
</form>
</div>
</div>
</div>
</div>
<?php include "../../shared/footer.php" ?>
<?php 
include_once  "../../init.php";
include "../../genral/config.php";
include "../../genral/functions.php";
checkLogin();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `admins` Where email = '$email' and password = '$password'";
    $s = mysqli_query($connectSQL ,$select);
    $numRow = mysqli_num_rows($s);
     $row = mysqli_fetch_assoc($s);
     if($numRow > 0){
       $_SESSION['admin'] = $email;
       $_SESSION['adminName'] = $row['name'];
       $_SESSION['role'] = $row['roles'];
       header("location: $root_path/dashboard/index.php");
      }else{
        $errorEmail[]="User Email or password error!";
    }

}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - eCommerce Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>eCommerce</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" value="<?php if(isset($_POST['email'])  ){echo $_POST['email'];}  ?>"  name='email' type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input value="<?php if(isset($_POST['password'])  ){echo $_POST['password'];}  ;?>" name='password' class="form-control" type="password" placeholder="Password">
         
            <?php if(!empty($errorEmail)):  ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errorEmail[0] ;?>
      </div>
      <?php endif; ?>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="login"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../assets/js/plugins/pace.min.js"></script>
  </body>
</html>
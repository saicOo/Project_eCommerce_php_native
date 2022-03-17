<?php include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";



if(isset($_POST['send'])){
  $name = $_POST['name'];
  if(empty($name)){
    $errorName[]="The name field is empty!";
  }elseif(strlen($name)>25){
    $errorName[]="(20) max for this field!";
  }
  if(empty($errorName)){
  $insert = "INSERT INTO `category` Values (NULL,'$name')";
  $i = mysqli_query($connectSQL, $insert);
  header("location: /eCommerce/dashboard/category/list.php");
  }
}
$name = "";
  $update = false;
if(isset($_GET['edit'])){
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * FROM category where id = $id";
  $ss= mysqli_query($connectSQL, $select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'] ;
if(isset($_POST['update'])){
  $name = $_POST['name'];
  if(empty($name)){
    $errorName[]="The name field is empty!";
  }elseif(strlen($name)>25){
    $errorName[]="(25) max for this field!";
  }if(empty($errorName)){
  $updateQ =  "UPDATE category SET name='$name' WHERE id = $id";
  $u = mysqli_query($connectSQL, $updateQ);
  header("location: /eCommerce/dashboard/category/list.php");
  }
}
}
auth(0);
?>
<div class="page_admin">
<div class="container py-4">
  
<div class="card text-white bg-dark">
<div class="card-header">
<?php if($update): ?>
    <div class="heading-landing text-center ">
        Update category <?php echo $id ?>
    </div>
  <?php else: ?>
    <div class="heading-landing text-center ">
        Add category
    </div>
    <?php endif;?>
</div>
  <div class="card-body">
<form method="POST" autocomplete="off">
  <div class="form-row">
    <div class="form-group col-12">
      <label for="inputname4">name category :</label>
      <input value="<?php echo $name ?>" name='name' type="text" class="form-control" id="inputname4" placeholder="name category">
      <?php if(!empty($errorName)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorName[0] ;?>
</div>
<?php endif; ?>
    </div>
  <?php if($update): ?>
  <div class="text-center form-group col-12">
    <button name="update" class="btn btn-info">Update Data</button>
  </div>
  <?php else: ?>
  <div class="text-center form-group col-12">
    <button type="submit" name="send" class="btn btn-primary">Add Data</button>
  </div>
  <?php endif; ?>
</form>
</div>
</div>
</div>
</div>
</div>
<?php include "../../shared/footer.php" ?>
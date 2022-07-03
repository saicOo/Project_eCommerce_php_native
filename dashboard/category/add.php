<?php 
include "../../genral/functions.php";
 include "../../genral/config.php";

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
  header("location: /eCommerce/dashboard/category/index.php");
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
  header("location: /eCommerce/dashboard/category/index.php");
  }
}
}

include "../layouts/header.php";
include "../layouts/sidebar.php";
?>
<main class="app-content">
<div class="row">
  <div class="col-md-6">
    <div class="tile">
          <?php if($update): ?>
            <h3 class="tile-title">
            Update category <?php echo $id ?>
            </h3>
            <?php else: ?>
              <h3 class="tile-title">
            Add category
            </h3>
              <?php endif;?>
            <div class="tile-body">
              <form class="form-horizontal" method="POST" autocomplete="off">
                <div class="form-group row">
                  <label class="control-label col-md-3">Name category :</label>
                  <div class="col-md-8">
                    <input class="form-control" value="<?php echo $name ?>" name='name' type="text" placeholder="Name Category">
                    <?php if(!empty($errorName)):  ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $errorName[0] ;?>
                    </div>
                  <?php endif; ?>
                  </div>
                </div>
                <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                <?php if($update): ?>
                  <button class="btn btn-primary" type="update"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Data</button>
                  <?php else: ?>
                  <button class="btn btn-primary" type="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Data</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</main>
<?php include "../layouts/footer.php"; ?>
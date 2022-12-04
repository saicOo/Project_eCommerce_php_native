

<?php 

include_once  "../../init.php";
include "../../genral/config.php";
 
 if(isset($_POST['send'])){
   $title = $_POST['title'];
   $descriptions = $_POST['descriptions'];
   $price = $_POST['price'];
   $categoryId = $_POST['categoryId'];
   
   
   $location = './upload/';
   // image 1
   $image_type = $_FILES['image']['type'];
   $image_name = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
   move_uploaded_file($image_tmp ,$location . $image_name );
   // image 2
   $image_type2 = $_FILES['image2']['type'];
   $image_name2 = $_FILES['image2']['name'];
   $image_tmp2 = $_FILES['image2']['tmp_name'];
   move_uploaded_file($image_tmp2 ,$location . $image_name2 );
   // image 3
   $image_type3 = $_FILES['image3']['type'];
   $image_name3 = $_FILES['image3']['name'];
   $image_tmp3 = $_FILES['image3']['tmp_name'];
   move_uploaded_file($image_tmp3 ,$location . $image_name3 );
   
   if(empty($title)){
     $errorTitle[]="The Title field is empty!";
    }elseif(strlen($title)>50){
      $errorTitle[]="(50) Max for this field!";
    }
    if(empty($descriptions)){
      $errorDescriptions[]="The descriptions field is empty!";
    }elseif(strlen($descriptions)>255){
      $errorDescriptions[]="(255) Max for this field!";
    }
    if(empty($price)){
      $errorPrice[]="The price field is empty!";
    }elseif(strlen($price)>5){
      $errorPrice[]="Verification error. Enter numbers (99999) as a maximum!";
    }
    if(filter_var($price,FILTER_VALIDATE_INT) === false){
      $errorPrice[]="Enter a number!";
    }
    if(empty($image_name)){
      $errorImage1[]="The Image field is empty!";
    }
    if(empty($image_name2)){
      $errorImage2[]="The Image field is empty!";
    }
    if(empty($image_name3)){
      $errorImage3[]="The Image field is empty!";
    }

    if(empty($errorTitle) && empty($errorDescriptions) && empty($errorPrice) && empty($errorImage1) && empty($errorImage2) && empty($errorImage3)){
      $insert = "INSERT INTO product Values (NULL,'$image_name','$image_name2','$image_name3' ,'$title','$descriptions',$price, $categoryId )";
      $i = mysqli_query($connectSQL, $insert);
      $_SESSION['success'] = "Product added successfully";
      header("Refresh:0");
      exit;
      
    }
  
}
$title = "";
$descriptions = "";
$price = "";
$image_name = "";
$image_name2 = "";
  $image_name3 = "";
  $update = false;
if(isset($_GET['edit'])){
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * FROM product where id = $id";
  $ss= mysqli_query($connectSQL, $select);
  $row = mysqli_fetch_assoc($ss);
  $title = $row['title'] ;
  $price = $row['price'] ;
  $image_name = $row['image'] ;
  $image_name2 = $row['image2'] ;
  $image_name3 = $row['image3'] ;
  $categoryId = $row['categoryId'] ;
  $descriptions = $row['descriptions'] ;

if(isset($_POST['update'])){
  $title = $_POST['title'];
  $descriptions = $_POST['descriptions'];
  $price = $_POST['price'];
  $categoryId = $_POST['categoryId'];
  
  $location = './upload/';
  // image 1
  $image_type = $_FILES['image']['type'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  move_uploaded_file($image_tmp ,$location . $image_name );
  // image 2
  $image_type2 = $_FILES['image2']['type'];
  $image_name2 = $_FILES['image2']['name'];
  $image_tmp2 = $_FILES['image2']['tmp_name'];
  move_uploaded_file($image_tmp2 ,$location . $image_name2 );
  // image 3
  $image_type3 = $_FILES['image3']['type'];
  $image_name3 = $_FILES['image3']['name'];
  $image_tmp3 = $_FILES['image3']['tmp_name'];
  move_uploaded_file($image_tmp3 ,$location . $image_name3 );

  if(empty($title)){
    $errorTitle[]="The Title field is empty!";
  }elseif(strlen($title)>50){
    $errorTitle[]="(50) Max for this field!";
  }
  if(empty($descriptions)){
    $errorDescriptions[]="The descriptions field is empty!";
  }elseif(strlen($descriptions)>255){
    $errorDescriptions[]="(255) Max for this field!";
  }
  if(empty($price)){
    $errorPrice[]="The price field is empty!";
  }elseif(strlen($price)>5){
    $errorPrice[]="(99999) Max for this field!";
  }
  if(empty($image_name)){
    $errorImage1[]="The Image field is empty!";
  }
  if(empty($image_name2)){
    $errorImage2[]="The Image field is empty!";
  }
  if(empty($image_name3)){
    $errorImage3[]="The Image field is empty!";
  }

  if(empty($errorTitle) && empty($errorDescriptions)  && empty($errorPrice)  && empty($errorImage1)  && empty($errorImage2) && empty($errorImage3)){
  $updateQ =  "UPDATE product SET `image`='$image_name', image2='$image_name2', image3='$image_name3', `title`='$title',categoryId = $categoryId,descriptions = '$descriptions' , price = $price WHERE id = $id";
  $u = mysqli_query($connectSQL, $updateQ);
  header("location: $root_path/dashboard/product/index.php");
  }
}
}
include "../../genral/functions.php";
include "../layouts/header.php";
include "../layouts/sidebar.php";
?>
<main class="app-content">

      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">ِAdd Product</h3>
            <div class="tile-body">
            <?php if(isset($_SESSION['success'])):  ?>
      <div class="alert alert-success" role="alert"><?php
         echo $_SESSION['success'] ;
         unset($_SESSION['success']);
         ?></div>
      <?php endif; ?>
<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
  <div class="form-group row">
      <!-- input title -->
      <label class="control-label col-md-3" for="inputname4">Title</label>
      <div class="col-md-8">
      <input  name='title' type="text" value="<?php echo $title ?>" class="form-control" id="inputname4" placeholder="name">
      
      <?php if(!empty($errorTitle)):  ?>
      <div class="alert alert-danger" role="alert"><?php echo $errorTitle[0] ;?></div>
      <?php endif; ?>
</div>
    </div>
    <!-- input category -->
    <div class="form-group row">
      <label class="control-label col-md-3" for="inputcategory">category</label>
    <?php
    $slecet = "SELECT * FROM category";
    $c = mysqli_query($connectSQL ,$slecet );
    ?>
    <div class="col-md-8">
      <select class="form-control" name="categoryId">
      <?php foreach($c as $data){?>
        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
        <?php }?>
      </select>
      </div>
    </div>
  </div>
  
    <!-- input price -->
    <div class="form-group row">
      <label class="control-label col-md-3" for="inputprice4">Price</label>
      <div class="col-md-8">
      <input value="<?php echo $price ?>" name='price' type="number" class="form-control" id="inputprice4" placeholder="price">
      <?php if(!empty($errorPrice)):  ?>
      <div class="alert alert-danger" role="alert"><?php echo $errorPrice[0] ;?></div>
      <?php endif; ?>
    </div>
    </div>
    <!-- input image 1 -->
    <div class="form-group row">
      <label class="control-label col-md-3" for="inputimage">image1</label>
    <div class="col-md-8">
      <input type="file" name="image"  value='<?php echo $image_name ?>' id="inputimage" class="form-control">
    <?php if(!empty($errorImage1)):  ?>
      <div class="alert alert-danger" role="alert"><?php echo $errorImage1[0] ;?></div>
    <?php endif; ?>
    </div>
    </div>
    <!-- input image 2 -->
    <div class="form-group row">
      <label class="control-label col-md-3" for="inputimage2">image2</label>
    <div class="col-md-8">
      <input type="file" name="image2" value='<?php echo $image_name2 ?>'  id="inputimage2" class="form-control">
    <?php if(!empty($errorImage2)):  ?>
      <div class="alert alert-danger" role="alert"><?php echo $errorImage2[0] ;?></div>
    <?php endif; ?>
    </div>
    </div>
    <!-- input image 3 -->
    <div class="form-group row">
      <label class="control-label col-md-3" for="inputimage3">image3</label>
    <div class="col-md-8">
      <input type="file" name="image3" value='<?php echo $image_name3 ?>'  id="inputimage3" class="form-control">
      
    <?php if(!empty($errorImage3)):  ?>
      <div class="alert alert-danger" role="alert"><?php echo $errorImage3[0] ;?></div>
    <?php endif; ?>
    </div>
    </div>
  <!-- input descriptions -->
  <div class="form-group row">
    <label class="control-label col-md-3" for="inputdescriptions">descriptions</label>
    <div class="col-md-8">
    <textarea rows="4" name='descriptions' type="text" class="form-control" id="inputdescriptions" placeholder="descriptions"><?php echo $descriptions ?></textarea>
    <?php if(!empty($errorDescriptions)):  ?>
      <div class="alert alert-danger" role="alert"><?php echo $errorDescriptions[0] ;?></div>
  <?php endif ?>
  </div>
  </div>
  
  <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
  <?php if($update): ?>
    <button name="update" class="btn btn-info"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update Data</button>
  <?php else: ?>
    <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Add Data</button>
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


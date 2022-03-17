<?php include "../shared/header.php"; 
 include "../shared/nav.php"; 
 include "../genral/config.php";
include "../genral/functions.php";

if(isset($_GET['pId'])){
    $showBtn = true;
    $id = $_GET['pId'];
    $select = "SELECT * FROM product where id = $id";
    $sr = mysqli_query($connectSQL , $select);
    $row = mysqli_fetch_assoc($sr);
    $nameR = $row['title'];
    $descriptionsyR = $row['descriptions'];
    $imageR = $row['image'];
    $imageR2 = $row['image2'];
    $imageR3 = $row['image3'];
    $priceR = $row['price'];
    }
    if(isset($_POST['send'])){
        if(isset($_SESSION['customer'])){
            $quantity = $_POST['quantity'];
            $productId =  $_GET['pId'];
            $customerId = $_SESSION['id'];
            $insert = "INSERT INTO orders VALUES (NULL ,$quantity,$customerId ,$productId)";
            $i = mysqli_query($connectSQL ,$insert);
            $massege =  testMessage($i , "insert order");
            header("location: /eCommerce/product_profile/profile.php?pId=$productId");
        }else{
            header("location: /eCommerce/user/login.php");
        }
    }
?>
<div class="Product_profile">
    <div class="container py-3 border mb-4">
        <div class="row">
            <div class="col-md-6 p-md-5">
            <div class="collection-image gallery">
        <div class="row"  >
          <div class="col-12 ">
              <img class="image_top" src="../dashboard/product/upload/<?php echo $imageR ?>" alt="image">
          </div>
          <div class="col-4 py-2">
            <img src="../dashboard/product/upload/<?php echo $imageR ?>" alt="image">
          </div>
          <div class="col-4 py-2">
            <img src="../dashboard/product/upload/<?php echo $imageR2 ?>" alt="image">
          </div>
          <div class="col-4 py-2">
            <img src="../dashboard/product/upload/<?php echo $imageR3 ?>" alt="image">
          </div>
        </div>
      </div>
            </div>
                <div class="col-md-6 p-md-5">
                    <h3 class='mt-5 border-bottom  pb-1'><?php echo $nameR ;?></h3>
                    <h4 class='my-3 border-bottom  pb-1'><?php echo "$" . $priceR; ?></h4>
                    <p class='my-5 border-bottom pb-1'><?php echo $descriptionsyR ;?></p>
                    <form method="POST">
                    <div class="form-group col-md-4">
                            <label for="inputcategory">quantity</label>
                            <select class="form-control" name="quantity">
                            <?php for($i = 1;$i <=6 ; $i++){?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php }?>
                            </select>
                    </div>
                    <div class="text-center form-group mt-5">
                        <button type="submit" name="send" class="btn btn-warning">Add To Cart</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "../shared/footer.php" ?>
<?php

include_once  "../../init.php";
include "../../genral/config.php";
$slecet = "SELECT category.name AS categoryName ,  product.id , product.title , product.descriptions , product.price , product.image  FROM category JOIN product ON categoryId = category.id ORDER BY product.id DESC";
$s = mysqli_query($connectSQL ,$slecet);
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM product WHERE id = $id";
  mysqli_query($connectSQL, $delete);
  header("location: $root_path/dashboard/product/index.php");
}
include "../../genral/functions.php";
include "../layouts/header.php";
include "../layouts/sidebar.php";


?>
<main class="app-content">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Display Products</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">descriptions</th>
      <th scope="col">price</th>
      <th scope="col">category</th>
      <th scope="col">image</th>
      <th scope="col" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($s as $data){ ?>
    <tr>
      <th scope="row"><?php echo $data['id']; ?></th>
      <td><?php echo $data['title'] ;?></td>
      <td><?php echo $data['descriptions'] ;?></td>
      <td>$<?php echo $data['price'] ;?></td>
      <td><?php echo $data['categoryName'] ;?></td>
      <td><img  style="width:50px;" src="./upload/<?php echo $data['image'] ;?>" alt="" ></td>
      <td>
        <a href="<?php echo $root_path ?>/dashboard/product/add.php?edit=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
    </td>
      <td>
        <a href="<?php echo $root_path ?>/dashboard/product/index.php?delete=<?php echo $data['id']; ?> " class="btn btn-danger">remove</a>
    </td>
    </tr>
    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </main>
<?php
include "../layouts/footer.php";
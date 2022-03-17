<?php 
include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";
$slecet = "SELECT category.name AS categoryName ,  product.id , product.title , product.descriptions , product.price , product.image  FROM category JOIN product ON categoryId = category.id";
$s = mysqli_query($connectSQL ,$slecet );
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM product WHERE id = $id";
  mysqli_query($connectSQL, $delete);
  header("location: /eCommerce/dashboard/product/list.php");
}
auth(1);
?>
<div class="page_admin ">
<div class="container py-4">
    
    <div class="card bg-dark ">
    <div class="card-body overflow-auto">
        <h5 class="card-title text-secondary">List / Product</h5>
    <table class="table table-hover table-dark">
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
      <td><img  class="image_add_product_list" src="./upload/<?php echo $data['image'] ;?>" alt="" ></td>
      <td>
        <a href="/ecommerce/dashboard/product/add.php?edit=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
    </td>
      <td>
        <a href="/ecommerce/dashboard/product/list.php?delete=<?php echo $data['id']; ?> " class="btn btn-danger">remove</a>
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</div>
</div>
</div>
<?php include "../../shared/footer.php" ?>
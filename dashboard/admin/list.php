<?php include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";



if($_SESSION['role'] == 0){
  
  $slecet = "SELECT * FROM admins";
  $s = mysqli_query($connectSQL ,$slecet );
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM admins WHERE id = $id";
    mysqli_query($connectSQL, $delete);
    header("location: /eCommerce/dashboard/admin/list.php");
  }


?>
<div class="page_admin">
<div class="container py-4">
    <div class="card bg-dark ">
    <div class="card-body overflow-auto">
        <h5 class="card-title text-secondary">List / Admins</h5>
    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($s as $data){ ?>
    <tr>
      <th scope="row"><?php echo $data['id']; ?></th>
      <td><?php echo $data['name'] ;?></td>
      <td>
        <a href="/ecommerce/dashboard/admin/add.php?edit=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
    </td>
      <td>
        <a href="/ecommerce/dashboard/admin/list.php?delete=<?php echo $data['id']; ?> " class="btn btn-danger">remove</a>
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</div>
</div>
</div>
<?php }include "../../shared/footer.php" ?>
<?php 
include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";
$slecet = "SELECT * FROM `order_manager` ORDER BY order_manager.order_Id DESC";
$s = mysqli_query($connectSQL ,$slecet );

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM order_manager WHERE order_Id = $id ";
  mysqli_query($connectSQL, $delete);
  header("location: /eCommerce/dashboard/orderCustomer/order_customer.php");
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $selectr = "SELECT * FROM order_manager WHERE order_Id = $id";
$sr = mysqli_query($connectSQL , $selectr);
$row = mysqli_fetch_assoc($sr);
$dateR = $row['order_date'];
  include "./modal_status.php";
  if(isset($_POST['update'])){
      $status = $_POST['status'];
      $update = "UPDATE order_manager SET  order_status = $status , order_date = '$dateR' where order_Id = $id";
      $u = mysqli_query($connectSQL , $update);

  }
}

auth(1);
?>
<div class="page_admin">
<div class="px-5 py-4">
    <div class="card bg-dark ">
    <div class="card-body overflow-auto">
        <h5 class="card-title text-secondary">List / Orders</h5>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">OrderID</th>
      <th scope="col">CustomerName</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">total</th>
      <th scope="col">PayMode</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Orders</th>
      <th scope="col">DELETE</th>
      <th scope="col">print</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($s as $data){ ?>
    <tr>
      <th scope="row"><?php echo $data['order_Id']; ?></th>
      <td><?php echo $data['name_customer'] ;?></td>
      <td><?php echo $data['phone_customer'] ;?></td>
      <td><?php echo $data['address_customer'] ;?></td>
      <td>$<?php echo $data['sumTotal'] ;?></td>
      <td><?php echo $data['payment_method'] ;?></td>
      <td><?php echo $data['order_date'] ;?></td>
      <td class="text-success"><?php echo $data['order_status'] ;?> 
      <a href="/eCommerce/dashboard/orderCustomer/order_customer.php?edit=<?php echo $data['order_Id']; ?>" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></a>
</td>
      
      
      <td>
          <table class="table table-hover main_table table-dark">
              <thead>
                  <tr>
                      <th scope="col">ItemName</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php
                    
                    $oId = $data['order_Id'];
                    $slecetP = "SELECT * FROM `chekout` JOIN order_manager WHERE order_manager.order_Id = chekout.order_Id AND chekout.order_Id = $oId";
$sP = mysqli_query($connectSQL ,$slecetP ); ?>
                    <?php foreach($sP as $ddata){ ?>
                    <tr>
                    <th scope="row"><?php echo $ddata['product_name']; ?></th>
                    <td>$<?php echo $ddata['price'] ;?></td>
                    <td><?php echo $ddata['quantity'] ;?></td>

                    </tr>
                    <?php } ?>
                </tbody>
                </table>
      </td>
      <td>
        <a href="/eCommerce/dashboard/orderCustomer/order_customer.php?delete=<?php echo $data['order_Id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
    </td>
      <td>
        <a href="/eCommerce/dashboard/orderCustomer/print_order.php?print=<?php echo $data['order_Id']; ?>" class="btn btn-success"><i class="fas fa-print"></i></a>
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


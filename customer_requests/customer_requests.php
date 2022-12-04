
<?php
include_once  "../init.php";
include "../genral/config.php";
include "../genral/functions.php";
include "../shared/header.php"; 
 include "../shared/nav.php"; 
    if(isset($_SESSION['customerName'])){
    $User = $_SESSION['customerName'];
    $slecet = "SELECT * FROM `order_manager` WHERE name_customer = '$User' ORDER BY order_manager.order_Id DESC";
  $s = mysqli_query($connectSQL ,$slecet );
  $numRow = mysqli_num_rows($s);
}
    userPermissions();
?>

<div class="cart pt-5">
<div class="container text-center">
<h2 class="text-center py-3 mt-4">Order Tracking <i class="fas fa-truck-moving"></i></h2>
<?php if($numRow > 0): ?>
<div class="row mt-3">

  <div class="card m-auto">
  <table class="table">
  <thead>
    <tr>
    <th scope="col">OrderID</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">total</th>
      <th scope="col">PayMode</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($s as $data){ ?>
    <tr>
      <th scope="row"><?php echo $data['order_Id']; ?></th>
      <td><?php echo $data['phone_customer'] ;?></td>
      <td><?php echo $data['address_customer'] ;?></td>
      <td>$<?php echo $data['sumTotal'] ;?></td>
      <td><?php echo $data['payment_method'] ;?></td>
      <td><?php echo $data['order_date'] ;?></td>
      <?php if($data['order_status'] == "Reviewing"): ?>
      <td class="text-info font-weight-bold"><?php echo $data['order_status'] ;?> 
      <?php elseif($data['order_status'] == "Ready"): ?>
        <td class="text-success font-weight-bold"><?php echo $data['order_status'] ;?> 
      <?php elseif($data['order_status'] == "Delivery"): ?>
        <td class="text-warning font-weight-bold"><?php echo $data['order_status'] ;?> 
      <?php elseif($data['order_status'] == "Delivered On"): ?>
        <td class="text-muted font-weight-bold"><?php echo $data['order_status'] ;?> 
        <?php endif; ?>
    </tr>
 
    <?php } ?>
  </tbody>
</table>


</div>

</div>

<?php else: ?>
  <div class="col-md-6 mx-auto text-center">

    <a href="<?php echo $root_path ?>/index.php" class="btn btn-warning">Shopping</a>
  </div>
<?php endif; ?>


</div>
</div>

<?php include "../shared/footer.php" ?>
<?php 
include "../../shared/header.php"; 
 include "../../shared/nav_admin.php"; 
 include "../../genral/config.php";
include "../../genral/functions.php";


if(isset($_GET['print'])){
  $id = $_GET['print'];
  $select = "SELECT * FROM order_manager where order_Id = $id";
  $sr = mysqli_query($connectSQL , $select);
  $row = mysqli_fetch_assoc($sr);
  $name_customer = $row['name_customer'];
  $phone_customer = $row['phone_customer'];
  $address_customer = $row['address_customer'];
  $sumTotal = $row['sumTotal'];
  $payment_method = $row['payment_method'];
  $order_date = $row['order_date'];
  }
  $slecetP = "SELECT * FROM `chekout` JOIN order_manager WHERE order_manager.order_Id = chekout.order_Id AND chekout.order_Id = $id";
  $sP = mysqli_query($connectSQL ,$slecetP );

auth(1);
?>
<div style="min-height:100vh" class="page_admin_print">
<div class="px-5 py-4">
  <div id="print" class="card  border-dark shadow-lg   bg-white rounded">
    <br>
      <div class="card-header bg-dark text-white " style="width:300px; max-width:100%;">
      <h2 class="display-4">Fashion</h2>
    </div>
    <div class="card-body">
    <br>
        <h6 class="card-title font-weight-bold">Order ID: <span class="text-secondary">#<?php echo $id ;?></span></h6>
        <h6 class="card-title font-weight-bold">Costumer Name: <span class="text-secondary"><?php echo $name_customer ;?></span></h6>
        <h6 class="card-title font-weight-bold">Costumer Address: <span class="text-secondary"><?php echo $address_customer ;?></span></h6>
        <h6 class="card-title font-weight-bold">Costumer Phone: <span class="text-secondary"><?php echo $phone_customer ;?></span></h6>
        <?php if($payment_method == 'PayPal'): ?>
        <h6 class="card-title font-weight-bold">Payment method: <span class="text-success">Prepaid</h6>
        <?php elseif($payment_method == 'credit card'): ?>
          <h6 class="card-title font-weight-bold">Payment method: <span class="text-success">Prepaid</h6>
        <?php elseif($payment_method == 'pay cash'): ?>
          <h6 class="card-title font-weight-bold">Payment method: <span class="text-danger">Paiement when recieving</span></h6>
        <?php endif; ?>
        <br>
          <table class="table table-hover">
              <thead class="text-white bg-dark">
                  <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">QTY</th>
                      <th scope="col">total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sP as $ddata){ ?>
                    <tr>
                    <th scope="row"><?php echo $ddata['product_name']; ?></th>
                    <td>$<?php echo $ddata['price'] ;?></td>
                    <td><?php echo $ddata['quantity'] ;?></td>
                    <td>$<?php echo $ddata['price'] * $ddata['quantity'] ;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                <hr>
                <br>
                <br>
                <h4 class="card-title font-weight-bold text-right">Total: <span class="text-secondary"><?php echo $sumTotal ;?></span></h4>
                <button class="btn btn-success  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"><i class="fas fa-print"></i></button>
              </div>
  </div>
</div>
</div>
<script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
<?php include "../../shared/footer.php" ?>


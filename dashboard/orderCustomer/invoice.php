<?php 

include "../../genral/config.php";

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
    include "../../genral/functions.php";
    include "../layouts/header.php";
    include "../layouts/sidebar.php";
 ?>

<main class="app-content">
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice" id="print">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> eCommerce</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: <?php echo $order_date ?></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>eCommerce.</strong></address>
                </div>
                <div class="col-4">To
                  <address><strong><?php echo $name_customer ?></strong><br>Address: <?php echo $address_customer ?><br>Phone: <?php echo $phone_customer ?><br>Email: john.doe@example.com</address>
                </div>
                <div class="col-4"><b>Order ID:</b># <?php echo $id ?><br>
                <b>Payment method:</b> <?php echo $payment_method ?>
                <br><b>Total:</b> <?php echo $sumTotal ?></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
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
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><button class="btn btn-primary" id="print_Button" onclick="printDiv()"><i class="fa fa-print"></i> Print</button></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
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
<?php include "../layouts/footer.php"; ?>
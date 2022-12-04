<div class="modal" style="display: block;" >
  <div class="modal-dialog mt-5">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Order Status Inquiry No. ( <?php echo $id ?> )</h5>
      </div>
      <div class="modal-body">
      <form method="post">
  <div class="form-group">
    <label for="Order_Status">Order Status</label>
    <select   name="status" class="form-control" id="Order_Status">

                <option value="1">Reviewing</option>
                <option value="2">Ready</option>
                <option value="3">Delivery</option>
                <option value="4">Delivered On</option>

            </select>
  </div>
  <?php if(isset($_POST['update'])): ?>
    <button disabled name='update' class="btn btn-success">update</button>
    <?php else: ?>
    <button name='update' class="btn btn-success">update</button>
    <?php endif; ?>
    <a class="btn btn-secondary" href="<?php echo $root_path ?>/dashboard/orderCustomer/index.php">Close</a>
</form>
      </div>
    </div>
  </div>
</div>
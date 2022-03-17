
 




<div class="modal" style="display: block;" >
  <div class="modal-dialog mt-5">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Update > <?php echo $id ?></h5>
      </div>
      <div class="modal-body">
      <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname4">name</label>
      <input value="<?php echo $name ?>" name='name' type="text" class="form-control" id="inputname4" placeholder="name">
      <?php if(!empty($errorName)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorName[0] ;?>
</div>
<?php endif; ?>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <div class="content_password">
        <input value="<?php echo $password ?>" name='password' type="password" class="form-control" id="inputPassword" placeholder="Password">
        <i class="fas fa-eye showPass" onclick="showpas()" id="showPassword"></i>
      </div>
      <?php if(!empty($errorPassword)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorPassword[0] ;?>
</div>
<?php endif; ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputphone">phone</label>
    <input value="<?php echo $phone ?>" name='phone' type="text" class="form-control" id="inputphone" placeholder="phone">
    <?php if(!empty($errorPhone)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorPhone[0] ;?>
</div>
<?php endif; ?>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input value="<?php echo $address ?>" name='address' type="text" class="form-control" id="inputAddress" placeholder="Address">
    <?php if(!empty($errorAddress)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorAddress[0] ;?>
</div>
<?php endif; ?>
  </div>
  <div class="text-center form-group">
  <?php if(isset($_POST['update'])): ?>
    <button disabled name='update' class="btn btn-info">update</button>
    <?php else: ?>
    <button name='update' class="btn btn-info">update</button>
    <?php endif; ?>
    <a class="btn btn-secondary" href="/ecommerce/user/user_profile.php">Close</a>
  </div>
</form>
      </div>
    </div>
  </div>
</div>

<?php
// if($_SESSION['role'] == 0 && $_SESSION['admin'] ){
  
    if(isset($_POST['sendMessage'])){
    $ccId = $_SESSION['id'];
      $message = $_POST['message'];
      if(empty($message)){
        $errorMessage[]="The Message field is empty!";
      }elseif(strlen($message)>500){
        $errorMessage[]="(500) max for this field!";
      }
      if(empty($errorMessage)){
        $insert = "INSERT INTO `blog` VALUES (NULL ,'$message',current_timestamp(),$ccId)";
        $i = mysqli_query($connectSQL ,$insert);
      }
    }
?>

<!-- contact us -->
    <section id="contact-us"  class="contact-us">
        <div class="container">
            <h2 class="text-center pt-4 text-light">contact us</h2>
        <div class="container-fliud">
            <div class="row m-0">
                <div class="col-md-6 p-0">
                    <div class="box-frame">
                    <iframe class="wow pulse" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d96808.35796848999!2d-73.8783935!3d40.690245!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z576O5Zu957q957qm!5e0!3m2!1szh-CN!2seg!4v1636799112323!5m2!1szh-CN!2seg" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="contact-form wow pulse">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message"></textarea>
                              </fieldset>
                              <?php if(!empty($errorMessage)):  ?>
      <div class="alert alert-danger" role="alert">
  <?php echo $errorMessage[0] ;?>
</div>
<?php endif; ?>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button name="sendMessage" id="form-submit" class="btn btn-outline-info">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
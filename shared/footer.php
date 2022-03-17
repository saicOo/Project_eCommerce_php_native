<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright 2022 eCommerce-Designed by <span>Saico</span></p>
                </div>
            </div>
        </div>
    </footer>
<!-- java script -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<!-- wow Animate -->
<script src="/eCommerce/js/wow.min.js"></script>
<!-- main js -->
<script src="/eCommerce/js/main.js"></script>
<!-- jquery cdn -->
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <!-- jquery code search ajax -->
<script>
    $(document).ready(function(){
  $("#search_text").keyup(function(){
    var txt = $(this).val();
    console.log(txt);
    if (txt === "") {
        $("#search-box").html('');
    }else{
        $.ajax({
            url:"/eCommerce/genral/searchAjax.php",
            method:"post",
            data:{search:txt},
            dataType:"text",
            success:function(data){
                $("#search-box").html(data);
            }
        });
    }
  });
  });
</script>
</body>
</html>
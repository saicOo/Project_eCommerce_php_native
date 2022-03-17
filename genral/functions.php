<?php 

function testMessage($condation , $mess){
    if($condation){
        echo "<div class='alert alert-info text-center mx-auto w-50'>
        <h5> $mess Is True Proccess </h5>
        </div>";
    }else{
        echo "<div class='alert alert-danger text-center mx-auto w-50'>
        <h5> $mess Is flass Proccess </h5>
        </div>";
    }
}


function auth($role){
    if($_SESSION['admin']){
    if($_SESSION['role'] == $role || $_SESSION['role'] == 0){

    }else{
        header("location: /eCommerce/dashboard/admin/login.php");
    }

    }else{
        header("location: /eCommerce/dashboard/admin/login.php");
    }

}
function userPermissions(){
    if($_SESSION['customer']){

    }else{
        header("location: /eCommerce/user/login.php");
    }
}
function notUserPermissions(){
    if(isset($_SESSION['customer']) ){

        header("location: /eCommerce/index.php");
    }else{
    }
}
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

function authAdmin(){
    $root_path = $GLOBALS['root_path'];
if(!$_SESSION['admin']){
    header("location: $root_path/dashboard/admin/login.php");
    exit;
}
}
function checkLogin(){
if(isset($_SESSION['admin'])){
    header("location: $root_path/dashboard/");
    exit;
}
}

function permissionsAdmin($role){
    $root_path = $GLOBALS['root_path'];
    if($_SESSION['admin']){
    if($_SESSION['role'] == $role || $_SESSION['role'] == 0){

    }else{
        header("location: $root_path/dashboard/admin/login.php");
    }

    }else{
        header("location: $root_path/dashboard/admin/login.php");
    }

}
function userPermissions(){
    $root_path = $GLOBALS['root_path'];
    if($_SESSION['customer']){

    }else{
        header("location: $root_path/user/login.php");
    }
}
function notUserPermissions(){
    $root_path = $GLOBALS['root_path'];
    if(isset($_SESSION['customer']) ){

        header("location: $root_path/index.php");
    }else{
    }
}
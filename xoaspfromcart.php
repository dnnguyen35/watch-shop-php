<?php
session_start();
if(isset($_GET['id_sp'])){
    $id_sp = $_GET['id_sp'];
    if($id_sp == 0){
        unset($_SESSION['giohang'][$_SESSION['id_user']]);
    }else{
        unset($_SESSION['giohang'][$_SESSION['id_user']][$id_sp]);
        if(array_sum($_SESSION['giohang'][$_SESSION['id_user']])==0){
            unset($_SESSION['giohang'][$_SESSION['id_user']]);
        }
    }
    $_SESSION['deletesuccess'] = 1;
    header('location: ./index.php?layout=giohang');
    exit();
}
?>

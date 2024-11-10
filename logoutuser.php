<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['id_user'])){
    unset($_SESSION['username']);
    unset($_SESSION['id_user']);
    unset($_SESSION['totalAll']);
    header('location: ./index.php?layout=trangchu');
}
?>
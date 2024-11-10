<?php
session_start();
if(isset($_SESSION['adminname'])){
    unset($_SESSION['adminname']);
    header('location: ./loginadmin.php');
}
?>
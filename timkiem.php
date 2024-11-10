<?php
include('./config.php');
if(isset($_GET['tukhoa'])){
    $tukhoa = $_GET['tukhoa'];
    // header('location: ./index.php?layout=tatcasp&tukhoa='.$tukhoa.'');
    include('./product.php');
    header('location: ./index.php?layout=tatcasp&tukhoa='.$tukhoa.'');
}
?>
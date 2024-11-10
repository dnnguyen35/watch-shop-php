<?php
session_start();
include('./config.php');
if (isset($_GET['id_sp_se_duoc_xoa'])) {
    $idspseduocxoa = $_GET['id_sp_se_duoc_xoa'];

    $delete_query = "DELETE FROM products WHERE id = '$idspseduocxoa'";
    mysqli_query($conn, $delete_query);
    unset($_SESSION['adminxoasp']);
    header('location: admin.php?adminlayout=adminsanpham');
    exit();
}

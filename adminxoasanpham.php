<?php
session_start();
include('./config.php');
if (isset($_GET['id_sp'])) {
    $idsp = $_GET['id_sp'];

    $sqlspdaduocmua = "SELECT * FROM order_details WHERE product_id='$idsp'";
    $queryspdaduocmua = mysqli_query($conn, $sqlspdaduocmua);
    // $rowspdaduocmua = mysqli_fetch_assoc($queryspdaduocmua);

    if (mysqli_num_rows($queryspdaduocmua) > 0) {
        mysqli_query($conn, "UPDATE products SET isshow='1' WHERE id='$idsp'");
	$_SESSION['adminxoasp'] = 0;
	header('location: admin.php?adminlayout=adminsanpham');
        exit();
    } else {
        $_SESSION['adminxoasp'] = -1;
        // $delete_query = "DELETE FROM products WHERE id = '$idsp'";
        // mysqli_query($conn, $delete_query);
         header('location: admin.php?adminlayout=adminsanpham&id_sp_xoa='.$idsp.'');
        exit();
    }
}

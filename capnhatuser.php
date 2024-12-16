<?php
include('./config.php');
if(isset($_POST['nutcapnhatuser'])){
	$id_user = $_GET['id_user'];
	
    $matkhau_moi = $_POST['matkhau'];
    $sqlcapnhatuser = "UPDATE users SET password='$matkhau_moi'  WHERE id='$id_user'";
    $querycapnhatuserc = mysqli_query($conn,$sqlcapnhatuser);
    header('location: ./index.php?layout=thongtinuser');
    exit();
}
?>

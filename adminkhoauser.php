<?php
session_start();
include('./config.php');
$id_user = $_GET['id_user'];

$sql = "select * from users where id='$id_user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}



$mysqli = new mysqli('db', 'root', 'rootpassword', 'bandongho');

// Kiểm tra xem tên danh mục đã tồn tại chưa
// Check if the category exists
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id_user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Category does not exist, handle error
    $khoauser = "Tài khoản không tồn tại";
} else {
    $row = mysqli_fetch_assoc($result);
    if ($row['status'] == 1) {
        // Category exists, update its status to "hidden"
        $update_sql = "UPDATE users SET status = 0 WHERE id = ?";
        $stmt = $mysqli->prepare($update_sql);
        $stmt->bind_param('i', $id_user);
        $stmt->execute();

        // Handle success
	$khoauser = "Đổi trạng thái thành công";
	$_SESSION['isblocked'] = 0;
	header('location: ./admin.php?adminlayout=adminnguoidung&page=' . $page . '');
        exit();
    } else {
        // Category exists, update its status to "hidden"
        $update_sql = "UPDATE users SET status = 1 WHERE id = ?";
        $stmt = $mysqli->prepare($update_sql);
        $stmt->bind_param('i', $id_user);
        $stmt->execute();

        // Handle success
        $khoauser = "Đổi trạng thái thành công";
	$_SESSION['isblocked'] = 1;
	header('location: ./admin.php?adminlayout=adminnguoidung&page=' . $page . '');
        exit();
    }
}

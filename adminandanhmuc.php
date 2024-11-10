<?php
session_start();
include('./config.php');
$id_dm = $_GET['id_dm'];
$sql = "select * from categories where id='$id_dm'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//$tmptendanhmuc = strtolower($_POST['danhmuc']);


$mysqli = new mysqli('db', 'root', 'rootpassword', 'bandongho');

// Kiểm tra xem tên danh mục đã tồn tại chưa
// Check if the category exists
$sql = "SELECT * FROM categories WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id_dm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Category does not exist, handle error
    $andanhmuc = "Danh muc khong ton tai";
} else {
    $row = mysqli_fetch_assoc($result);
    if ($row['status'] == 1) {
        // Category exists, update its status to "hidden"
        $update_sql = "UPDATE categories SET status = '0' WHERE id = ?";
        $stmt = $mysqli->prepare($update_sql);
        $stmt->bind_param('i', $id_dm);
	$stmt->execute();
	$_SESSION['statedanhmuc'] = 0;
	// Handle success
        header('location: ./admin.php?adminlayout=admindanhmuc&page=' . $page . '');
        exit();
    } else {
        // Category exists, update its status to "hidden"
        $update_sql = "UPDATE categories SET status = '1' WHERE id = ?";
        $stmt = $mysqli->prepare($update_sql);
        $stmt->bind_param('i', $id_dm);
        $stmt->execute();
	$_SESSION['statedanhmuc'] = 1;
	// Handle success
        header('location: ./admin.php?adminlayout=admindanhmuc&page=' . $page . '');
        exit();
    }
}
?>

<?php
include('./config.php');
$page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
if (isset($_GET['role'])) {
	$role = $_GET['role'];
} else {
    $role = 0;
}
if ($role == 0){
	$nextRole = 1;
	$nextRoleTitle = 'Quản lí quản trị viên';
}else {
	$nextRole = 0;
	$nextRoleTitle = 'Quản lí khách hàng';
     }
$rowperpage = 5;
$perRow = $page * $rowperpage - $rowperpage;
$sqlphantrang = "SELECT * FROM users ORDER BY is_admin ASC LIMIT $perRow,$rowperpage";
$queryphantrang = mysqli_query($conn, $sqlphantrang);

$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE is_admin=$role"));
$totalPage = ceil($totalRow / $rowperpage);

$listPage = "";
for ($i = 1; $i <= $totalPage; $i++) {
    if ($page == $i) {
        $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
    } else {
        $listPage .= '<a href="./admin.php?adminlayout=adminnguoidung&page=' . $i . '&role=' .$role. '" class="phan_trang">' . $i . '</a>';
    }
}

if (isset($_SESSION['isblocked'])&& $_SESSION['isblocked']==1){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Yeahh, Da khoa",
        text: "Vui long nhap lai lan nua de mo khoa!!!!!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['isblocked']);
} else if (isset($_SESSION['isblocked'])&& $_SESSION['isblocked']==0){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Yeahhh, Mo khoa",
        text: "Vui long chon lai lan nua de khoa!!!!!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['isblocked']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Admin</title>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Quản lý người dùng</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
            <div class="element_btn">
                <div>
                    <a href="./admin.php?adminlayout=themadmin" class="addnew_btn"><i class="fas fa-plus"></i>Thêm Admin</a>
                </div>
            </div>

            <div class="table-responsive-lg">
                <table class="table table-bordered">
                    <form action="" method="post">
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col">Tài khoản</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Email</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Khóa/Mở</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($queryphantrang)) {
                                if($row['status']==1){
					$khoa = 'Đã khóa';
					$btnBlock = 'btn-primary';
					$textColor = 'text-danger';
					$textStatus = '<span>Mởo</span>';
                                }else{
					$khoa = 'Đang mở';
					$btnBlock = 'btn-danger';
					$textColor = 'text-primary';
					$textStatus = '<span>Khóa</span>';
                                }

                                if($row['is_admin']==1){
                                    $isadmin = 'Admin';
                                }else{
                                    $isadmin = 'User';
                                }

                                echo '<tr>
                       <td>' . $row['username'] . '</td>
                       <td>' . $row['password'] . '</td>
                       <td>' . $row['email'] . '</td>
                       <td class="' . $textColor . '"><strong> ' . $khoa . ' </strong></td>
                       <td><a href="./adminkhoauser.php?page='.$page.'&id_user=' . $row['id'] . '" class="addnew_btn ' . $btnBlock . '">'.$textStatus.'</a></td>
                   </tr>';
                            }

                            ?>


                        </tbody>
			<div>
			<a href="./admin.php?adminlayout=adminnguoidung&role=<?php echo $nextRole; ?>" class="btn btn-outline-success" style="width:100px;"><?php echo $nextRoleTitle; ?></a>

                        </div>
                    </form>
                </table>
            </div>
            <div class="category_paging">
                <?php
                echo $listPage;
                ?>
            </div>
        </div>
    </div>
    <!-- <script>
        function confirmAlert() {
            if (confirm("Bạn có muốn xóa người dùng này không?")) return true
            else return false
        }
    </script> -->

</body>

</html>

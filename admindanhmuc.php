<?php
include('./config.php');
$page;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$rowperpage = 2;
$perRow = $page*$rowperpage - $rowperpage;
$sqlphantrang = "SELECT * FROM categories ORDER BY id ASC LIMIT $perRow,$rowperpage";
$queryphantrang = mysqli_query($conn,$sqlphantrang);

$totalRow = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM categories"));
$totalPage = ceil($totalRow/$rowperpage);

$listPage = "";
for($i=1;$i<=$totalPage;$i++){
    if($page==$i){
        $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">'.$i.'</a>';
    }else{
        $listPage .= '<a href="./admin.php?adminlayout=admindanhmuc&page='.$i.'" class="phan_trang">'.$i.'</a>';
    }
}

if (isset($_SESSION['statedanhmuc'])&& $_SESSION['statedanhmuc']==0){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Yeahhh...",
        text: "Danh muc da duoc an!!!!!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['statedanhmuc']);
} else if (isset($_SESSION['statedanhmuc'])&& $_SESSION['statedanhmuc']==1){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Yeahhh...",
        text: "Danh muc da hien thi!!!!!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['statedanhmuc']);
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
    <title>Document</title>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Quản lý danh mục</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
            <div class="element_btn">
                <div>
                    <a href="./admin.php?adminlayout=themdanhmuc" class="addnew_btn"><i class="fas fa-plus"></i>Thêm danh mục</a>
                </div>
            </div>

            <div class="table-responsive-lg">
                <table class="table table-bordered">
                    <form action="" method="post">
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Ẩn</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($queryphantrang)) {
                                if($row['status']==1){
                                    $an = 'Đang hiện';
                                }else{
                                    $an = 'Đã ẩn';
                                }
                                echo '<tr>
                       <td>' . strtoupper($row['name']) . '</td>
                       <td>' . $an . '</td>
                       <td><a href="./admin.php?adminlayout=suadanhmuc&page='.$page.'&id_dm='.$row['id'].'" class="addnew_btn">Sửa</a></td>
                       <td><a href="./adminandanhmuc.php?page='.$page.'&id_dm='.$row['id'].'" class="addnew_btn">Ẩn</a></td>                                           
                       </tr>';
                            }

                            ?>


                        </tbody>
                        <div>
                            <button type="submit" name="trang_thai" class="btn btn-outline-success" style="width:100px;">Cập nhật</button>
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

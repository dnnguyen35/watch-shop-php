<?php
include('./config.php');
$id_dm = $_GET['id_dm'];
$sql = "select * from categories where id='$id_dm'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result) ;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
if (isset($_POST['nutsuadanhmuc'])) {
    $tendanhmuc = $_POST['danhmuc'];
    //$tmptendanhmuc = strtolower($_POST['danhmuc']);
    $suadanhmuc = "";
    
    $mysqli = new mysqli('db', 'root', 'rootpassword', 'bandongho');

    // Kiểm tra xem tên danh mục đã tồn tại chưa
    $check_sql = "SELECT * FROM categories WHERE name = ?";
    $check_stmt = $mysqli->prepare($check_sql);
    $check_stmt->bind_param('s', $tendanhmuc);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $suadanhmuc = "Danh mục đã tồn tại.";
    } else {
        // Thực hiện câu lệnh SQL
        $update_sql = "UPDATE categories SET name=? WHERE id=?";

        // Tạo prepared statement
        $stmt = $mysqli->prepare($update_sql);

        // Bind các tham số vào statement
        $stmt->bind_param('si', $tendanhmuc, $id_dm);

        // Thực hiện execute
        $stmt->execute();
        $suadanhmuc = "Sửa danh mục thành công!"; 
        header('location: ./admin.php?adminlayout=admindanhmuc&page='.$page.'') ;
    }
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
    <title>Danh mục</title>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Sửa danh mục</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
            <div class="table-responsive-lg">
                <table class="table table-bordered w">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input name="danhmuc" value="<?php echo $row['name'];?>" type="text" class="form-control" id="floatingInput" placeholder="abc" > 
                                        <span><?php if(isset($suadanhmuc)){ if($suadanhmuc!=""){echo $suadanhmuc;} } ?></span>
                                    </div>                              
                                </div>
                            </div>                         
                        </div>
                        <button type="submit" name="nutsuadanhmuc" class="btn btn-outline-success">Sửa danh mục</button>
                    </form>
                </table>
                <a  href="./admin.php?adminlayout=admindanhmuc" class="btn btn-outline-success">Trở lại</a>
            </div>
        </div>
    </div>

</body>

</html>

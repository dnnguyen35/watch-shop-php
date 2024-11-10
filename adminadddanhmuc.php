<?php
include('./config.php');
if (isset($_POST['nutthemdanhmuc'])) {
    $tendanhmuc = $_POST['danhmuc'];
    //$tmptendanhmuc = strtolower($_POST['danhmuc']);
    $danhmuctontai = "";
    
    $mysqli = new mysqli('localhost', 'root', '', 'bandongho');

    // Kiểm tra xem tên danh mục đã tồn tại chưa
    $check_sql = "SELECT * FROM categories WHERE name = ?";
    $check_stmt = $mysqli->prepare($check_sql);
    $check_stmt->bind_param('s', $tendanhmuc);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $danhmuctontai = "Danh muc da ton tai !";
    } else {
        // Thực hiện câu lệnh SQL
        $insert_sql = "INSERT INTO categories (name) VALUES (?)";

        // Tạo prepared statement
        $stmt = $mysqli->prepare($insert_sql);

        // Bind các tham số vào statement
        $stmt->bind_param('s', $tendanhmuc);

        // Thực hiện execute
        $stmt->execute();
        $danhmuctontai = "Them danh muc thanh cong !";

        
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
                <b>Thêm danh mục</b>
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
                                        <input name="danhmuc" value="" type="text" class="form-control" id="floatingInput" placeholder="abc" required>
                                        <label for="floatingInput">Tên danh mục</label><span><?php if(isset($danhmuctontai)){ if($danhmuctontai!=""){echo $danhmuctontai;} } ?></span>
                                    </div>                              
                                </div>
                            </div>                         
                        </div>
                        <button type="submit" name="nutthemdanhmuc" class="btn btn-outline-success">Thêm danh mục</button>
                    </form>
                </table>
                <a  href="./admin.php?adminlayout=admindanhmuc" class="btn btn-outline-success">Trở lại</a>
            </div>
        </div>
    </div>
</body>
</html>
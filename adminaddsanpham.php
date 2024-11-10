<?php
include('./config.php');
if (isset($_POST['nutthemsp'])) {
    $tensp = $_POST['ten'];
    $giasp = $_POST['gia'];
    $soluongsp = $_POST['soluong'];
    $danhmucsp = $_POST['danh_muc'];
    $noidungsp = $_POST['noi_dung'];
    $anhsp;
    if (isset($_FILES['hinh_anh']['name'])) {
        $anhsp = $_FILES['hinh_anh']['name'];
    }
    $mysqli = new mysqli('localhost', 'root', '', 'bandongho');

    // Thực hiện câu lệnh SQL
    $sql = "INSERT INTO products (name, description, image_url, price, quantity, category_id) VALUES (?, ?, ?, ?, ?, ?)";

    // Tạo prepared statement
    $stmt = $mysqli->prepare($sql);

    // Bind các tham số vào statement
    $stmt->bind_param('sssdii',$tensp, $noidungsp, $anhsp, $giasp, $soluongsp, $danhmucsp);

    // Thực hiện execute
    $stmt->execute();

    header('location: ./admin.php?adminlayout=adminsanpham');
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
                <b>Thêm sản phẩm</b>
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
                                        <input name="ten" value="" type="text" class="form-control" id="floatingInput" placeholder="abc" required>
                                        <label for="floatingInput">Tên sản phẩm</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="gia" value="" type="text" class="form-control" id="floatingInput" placeholder="123456" required>
                                        <label for="floatingInput">Giá</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="soluong" value="" type="text" class="form-control" id="floatingInput" placeholder="123456" required>
                                        <label for="floatingInput">Số lượng</label>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <select name="danh_muc" class="form-select" id="floatingSelect" aria-label="123" required>
                                            <option value="unselect" selected>Chọn danh mục</option>
                                            <?php
                                            $sql = "select * from categories";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value=' . $row['id'] . '  >' . strtoupper($row['name']) . '</option>';
                                            }
                                            ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" aria-label="123">
                                            <label for="floatingSelect">Danh mục</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <div class="as">
                                            <span>Hình ảnh</span><input type="file" name="hinh_anh" class="btn btn-outline-secondary" required>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                
                                <textarea id="noi_dung" name="noi_dung" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px" required></textarea>
                                <label for="floatingTextarea">Nội dung</label>
                            </div>
                        </div>
                        <button type="submit" name="nutthemsp" class="btn btn-outline-success">Thêm sản phẩm</button>
                    </form>
                </table>
                <a  href="./admin.php?adminlayout=adminsanpham" class="btn btn-outline-success">Trở lại</a>
            </div>
        </div>
    </div>

</body>

</html>
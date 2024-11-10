<?php
include('./config.php');
if (isset($_POST['nutcapnhatdonhang'])) {
    $id_donhang = $_GET['id_donhang'];
    $trangthaidonhang = $_POST['trangthaidonhang'];
    $ngaygiaohang = $_POST['ngaygiaohang'];

    $sql = "UPDATE orders SET status='$trangthaidonhang',delivery_at='$ngaygiaohang' WHERE id='$id_donhang'";
    $query = mysqli_query($conn, $sql);
    header('location: ./admin.php?adminlayout=quanlydonhang');
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
    <title>Cập nhật</title>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Cập nhật trạng thái đơn hàng</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
            <div class="table-responsive-lg">
                <table class="table table-bordered w">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3 row">
                                        <label class="col-4 col-form-label">Trạng thái</label>
                                        <div class="col-8">
                                            <!-- <input type="text" name="trangthaidonhang" class="form-control" value="Đã hoàn thành" style="width:200px" readonly required> -->
                                            <select id="order-status" name="trangthaidonhang" required>
                                                <option value="Đang giao">Đang giao</option>
                                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                                                <option value="Đã hủy">Đã hủy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3 row">
                                        <label class="col-4 col-form-label">Ngày cập nhật</label>
                                        <div class="col-8">
                                            <input type="date" name="ngaygiaohang" class="form-control" min="1900-01-01" max="9999-12-31" style="width:200px" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="nutcapnhatdonhang" class="btn btn-outline-success">Cập nhật</button>
                    </form>
                </table>
                <a href="./admin.php?adminlayout=quanlydonhang" class="btn btn-outline-success" style="margin-bottom: 20px;">Trở lại</a>
            </div>
        </div>
    </div>

</body>

</html>
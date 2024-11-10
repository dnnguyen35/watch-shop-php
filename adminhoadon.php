<?php
include('./config.php');
$page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$rowperpage = 5;
$perRow = $page * $rowperpage - $rowperpage;
if (isset($_POST['nutloctrangthaidonhang']) || isset($_GET['nutloctrangthaidonhang'])) {
    if (isset($_POST['trangthaidonhang'])) {
        $trangthaidonhang = $_POST['trangthaidonhang'];
    } else {
        $trangthaidonhang = $_GET['trangthaidonhang'];
    }

    if ($trangthaidonhang == 'toanbodonhang') {
        $sqlphantrang =  "SELECT * FROM orders  ORDER BY id DESC LIMIT $perRow,$rowperpage";
        $queryphantrang = mysqli_query($conn, $sqlphantrang);
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
        $totalPage = ceil($totalRow / $rowperpage);

        $listPage = "";
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($page == $i) {
                $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
            } else {
                $listPage .= '<a href="./admin.php?adminlayout=quanlydonhang&page=' . $i . '" class="phan_trang">' . $i . '</a>';
            }
        }
    } else if ($trangthaidonhang == 'dahoanthanh') {
        $sqlphantrang =  "SELECT * FROM orders WHERE status='Đã hoàn thành'  ORDER BY id DESC LIMIT $perRow,$rowperpage";
        $queryphantrang = mysqli_query($conn, $sqlphantrang);
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status!='Đang xử lý'"));
        $totalPage = ceil($totalRow / $rowperpage);

        $listPage = "";
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($page == $i) {
                $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
            } else {
                $listPage .= '<a href="./admin.php?adminlayout=quanlydonhang&nutloctrangthaidonhang&trangthaidonhang=' . $trangthaidonhang . '&page=' . $i . '" class="phan_trang">' . $i . '</a>';
            }
        }
    } else if ($trangthaidonhang == 'chuahoanthanh') {
        $sqlphantrang =  "SELECT * FROM orders WHERE status!='Đã hoàn thành'  ORDER BY id DESC LIMIT $perRow,$rowperpage";
        $queryphantrang = mysqli_query($conn, $sqlphantrang);
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status='Đang xử lý'"));
        $totalPage = ceil($totalRow / $rowperpage);

        $listPage = "";
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($page == $i) {
                $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
            } else {
                $listPage .= '<a href="./admin.php?adminlayout=quanlydonhang&nutloctrangthaidonhang&trangthaidonhang=' . $trangthaidonhang . '&page=' . $i . '" class="phan_trang">' . $i . '</a>';
            }
        }
    }
} else if (isset($_POST['nutlocngaydonhang']) || isset($_GET['nutlocngaydonhang'])) {
    if (isset($_POST['ngaytruoc']) && isset($_POST['ngaysau'])) {
        $ngaytruoc = $_POST['ngaytruoc'];
        $ngaysau = $_POST['ngaysau'];
    } else {
        $ngaytruoc = $_GET['ngaytruoc'];
        $ngaysau = $_GET['ngaysau'];
    }

    $sqlphantrang =  "SELECT * FROM orders WHERE created_at>='$ngaytruoc' AND created_at<='$ngaysau 23:59:59'  ORDER BY id DESC LIMIT $perRow,$rowperpage";
    $queryphantrang = mysqli_query($conn, $sqlphantrang);
    $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE created_at>='$ngaytruoc' AND created_at<='$ngaysau 23:59:59' "));
    $totalPage = ceil($totalRow / $rowperpage);

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
        } else {
            $listPage .= '<a href="./admin.php?adminlayout=quanlydonhang&nutlocngaydonhang&ngaytruoc=' . $ngaytruoc . '&ngaysau=' . $ngaysau . '&page=' . $i . '" class="phan_trang">' . $i . '</a>';
        }
    }
} else if (isset($_POST['nutlocdiachidonhang']) || isset($_GET['nutlocdiachidonhang'])) {
    if (isset($_POST['tinhthanh']) && isset($_POST['quanhuyen'])) {
        $tinhthanh = $_POST['tinhthanh'];
        $quanhuyen = $_POST['quanhuyen'];
    } else if (isset($_GET['tinhthanh']) && isset($_GET['quanhuyen'])) {
        $tinhthanh = urldecode($_GET['tinhthanh']);
        $quanhuyen = urldecode($_GET['quanhuyen']);
    }
    if ($quanhuyen != "") {
        $sqlphantrang =  "SELECT * FROM orders WHERE city='$tinhthanh' AND district='$quanhuyen'  ORDER BY id DESC LIMIT $perRow,$rowperpage";
        $queryphantrang = mysqli_query($conn, $sqlphantrang);
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE city='$tinhthanh' AND district='$quanhuyen' "));
        $totalPage = ceil($totalRow / $rowperpage);
    } else {
        $sqlphantrang =  "SELECT * FROM orders WHERE city='$tinhthanh'  ORDER BY id DESC LIMIT $perRow,$rowperpage";
        $queryphantrang = mysqli_query($conn, $sqlphantrang);
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE city='$tinhthanh' "));
        $totalPage = ceil($totalRow / $rowperpage);
    }

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
        } else {
            $listPage .= '<a href="./admin.php?adminlayout=quanlydonhang&nutlocdiachidonhang&tinhthanh=' . $tinhthanh . '&quanhuyen=' . $quanhuyen . '&page=' . $i . '" class="phan_trang">' . $i . '</a>';
        }
    }
} else {
    $sqlphantrang =  "SELECT * FROM orders  ORDER BY id DESC LIMIT $perRow,$rowperpage";
    $queryphantrang = mysqli_query($conn, $sqlphantrang);
    $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
    $totalPage = ceil($totalRow / $rowperpage);

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
        } else {
            $listPage .= '<a href="./admin.php?adminlayout=quanlydonhang&page=' . $i . '" class="phan_trang">' . $i . '</a>';
        }
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
    <style>
        div #divchonloc {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
    <title>Admin</title>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Quản lý đơn hàng</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
            <div class="element_btn">
                <div>
                    <p class="addnew_btn">Thông tin các đơn hàng</p></br>
                    <div class="loc" style="padding-left: 0px!important;">
                        <div id="divchonloc">
                            <div>
                                <form action="./admin.php?adminlayout=quanlydonhang" method="POST">
                                    <select aria-label="Default select example" name="trangthaidonhang">
                                        <option value="toanbodonhang" selected>Toàn bộ các đơn hàng</option>
                                        <option value="dahoanthanh">Các đơn hàng đã thanh toán</option>
                                        <option value="chuahoanthanh">Các đơn hàng chưa thanh toán</option>
                                    </select>
                                    <button type="submit" class="addnew_btn" name="nutloctrangthaidonhang" style="padding:1px 12px; border:0;">Lọc</button>
                                </form>
                            </div>
                            <div>
                                <form action="./admin.php?adminlayout=quanlydonhang" method="POST">
                                    <!-- class="form-select" -->
                                    <label class="col-4 col-form-label">Từ ngày</label>
                                    <div class="col-8">
                                        <input type="date" name="ngaytruoc" class="form-control" min="1900-01-01" max="9999-12-31" style="width:200px" required>
                                    </div>
                                    <span class="col-4 col-form-label">Đến ngày</span>
                                    <div class="col-8">
                                        <input type="date" name="ngaysau" class="form-control" min="1900-01-01" max="9999-12-31" style="width:200px" required>
                                    </div></br>
                                    <button type="submit" class="addnew_btn" name="nutlocngaydonhang" style="border:0;">Lọc đơn hàng theo ngày</button></br>
                                </form>
                            </div>
                            <div>
                                <form action="./admin.php?adminlayout=quanlydonhang" method="POST">
                                    <label class="col-4 col-form-label">Thành phố</label>
                                    <select name="tinhthanh" id="city" required>
                                        <option value="" selected disabled>Chọn tỉnh thành</option>
                                    </select>
                                    </br></br>
                                    <span class="col-4 col-form-label">Quận huyện</span></br>
                                    <select name="quanhuyen" id="district" >
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select></br></br>
                                    <button type="submit" class="addnew_btn" name="nutlocdiachidonhang" style="border:0;">Lọc đơn hàng theo địa chỉ</button></br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive-lg">
                <table class="table table-bordered">
                    <form action="" method="post">
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col">Email</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Cập nhật</th>
                                <th scope="col">Thành phố</th>
                                <th scope="col">Quận</th>
                                <th scope="col">Chi tiết</th>
                                <th scope="col">Cập nhật</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($queryphantrang)) {
                                echo '<tr>
                       <td>' . $row['customer_email'] . '</td>
                       <td>' . number_format($row['total_price'], 0, ".", ".") . '</td>
                       <td>' . date('Y-m-d', strtotime($row['created_at'])) . '</td>
                       <td>' . $row['status'] . '</td>
                       <td>' . $row['delivery_at'] . '</td>
                       <td>' . $row['city'] . '</td>
                       <td style="width:65px;">' . $row['district'] . '</td>
                       <td><a href="./admin.php?adminlayout=adminchitietdonhang&page=' . $page . '&id_donhang=' . $row['id'] . '" class="addnew_btn">Chi tiết</a></td>
                       <td><a href="./admin.php?adminlayout=capnhatdonhang&page=' . $page . '&id_donhang=' . $row['id'] . '" class="addnew_btn">Cập nhật</a></td>
                        </tr>';
                            }
                            ?>
                        </tbody>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data)
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        citis.onchange = function() {
            district.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Name === this.value);
                for (const k of result[0].Districts)
                    districts.options[districts.options.length] = new Option(k.Name, k.Name);
            }
        };
    }
</script>

</html>
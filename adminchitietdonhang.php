<?php
// session_start();
include('./config.php');
$totalAll = 0;
$hovaten = "";
$email = "";
$sodienthoai = "";
$hinhthucthanhtoan = "";
$diachigiao = "";
$tinhthanh = "";
$quanhuyen = "";
if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if (isset($_GET['id_donhang'])) {
    $order_id = $_GET['id_donhang'];
    $sqlgiohang = "SELECT o.*, od.price as price, od.quantity as quantity, od.total_price as totalprice, p.image_url as product_image, p.name as product_name
    FROM orders o
    INNER JOIN order_details od ON o.id = od.order_id
    INNER JOIN products p ON od.product_id = p.id
    WHERE o.id = '$order_id'
    ORDER BY p.id ASC";
    $querygiohang = mysqli_query($conn, $sqlgiohang);
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
        #formthanhtoan {
            display: flex;
            justify-content: space-evenly;
        }

        .left {
            display: flex;
        }

        .right {
            margin-bottom: 0.75rem;
        }
    </style>
    <title>Admin</title>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Chi tiết thông tin đơn hàng</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
            <div class="element_btn">
                <div>
                    <a href="#" class="addnew_btn">Thông tin chi tiết đơn hàng</a>
                </div>
            </div>

            <div class="table-responsive-lg">
                <table class="table table-bordered">
                    <form>
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <?php
                        if(mysqli_num_rows($querygiohang)!=0){
                        while ($rowgiohang = mysqli_fetch_assoc($querygiohang)) {
                            $imggiohang = "./img/" . $rowgiohang['product_image'];
                        ?>
                            <tbody>
                                <tr>
                                    <td align="center"><img src="<?php echo $imggiohang; ?>" style="width:50px;" border="0"></td>
                                    <td><?php echo strtoupper($rowgiohang['product_name']); ?></td>
                                    <td><?php echo number_format($rowgiohang['price'],0,".","."); ?> VND</td>
                                    <td><?php echo $rowgiohang['quantity']; ?></td>
                                    <td><?php echo number_format($rowgiohang['totalprice'],0,".","."); ?> VND</td>
                                </tr>
                            </tbody>
                        <?php
                            $totalAll =  $rowgiohang['total_price'];
                            $hovaten = $rowgiohang['customer_name'];
                            $email = $rowgiohang['customer_email'];
                            $sodienthoai = $rowgiohang['customer_phone_number'];
                            $hinhthucthanhtoan = $rowgiohang['pay_method'];
                            $diachigiao = $rowgiohang['customer_address'];
                            $tinhthanh = $rowgiohang['city'];
                            $quanhuyen = $rowgiohang['district'];
                        }
                        ?>
                        <p id="tieudethanhtoan" style="text-align: right;">Tổng tiền: <?php echo number_format($totalAll,0,".","."); ?> VNĐ</p>
                    </form>
                </table>
            </div>

            <div id="divformthanhtoan">
                <form action="#" method="post" id="formthanhtoan">
                    <div id="labelthongtin">
                        <P class="left">Họ và tên:</P>
                        <P class="left">Email:</P>
                        <P class="left">Số điện thoại:</P>
                        <P class="left">Hình thức thanh toán:</P>
                        <P class="left">Dia chi giao:</P>
                        <p class="left">Tỉnh thành</p>
                        <p class="left">Quận huyện</p>

                    </div>

                    <div id="inputthanhtoan">
                        <input class="right" type="text" id="fullName" value="<?php echo $hovaten; ?>"></br>
                        <input class="right" type="email" id="email" value="<?php echo $email; ?>"></br>
                        <input class="right" type="tel" id="phone" value="<?php echo $sodienthoai; ?>"></br>
                        <input class="right" type="text" id="fullName" value="<?php echo $hinhthucthanhtoan; ?>"></br>
                        <input class="right" type="text" id="fullName" value="<?php echo $diachigiao; ?>"></br>
                        <input class="right" type="text" id="fullName" value="<?php echo $tinhthanh; ?>"></br>
                        <input class="right" type="text" id="fullName" value="<?php echo $quanhuyen; ?>"></br>
                    </div>
                </form>
            </div>
            <?php
            }else{
                echo '<p id="tieudethanhtoan" style="text-align: center;">Đơn hàng đã bị hủy</p>';
            }
            ?>
            <div class="category_paging">
            <a href="./admin.php?adminlayout=quanlydonhang&page=<?php echo $page; ?>" class="btn btn-outline-success">Quay lại</a>
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
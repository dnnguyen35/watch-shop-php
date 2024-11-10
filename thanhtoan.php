<?php
// session_start();
include('./config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./cartcss.css">


</head>

<body>
    <div class="container" style="padding-bottom: 5rem!important;">
        <h1 style="text-align: center;">Phiếu thanh toán</h1>
        <?php
        if (isset($_SESSION['id_user']) && isset($_SESSION['giohang'][$_SESSION['id_user']])) {
            // if (isset($_POST['sl'])) {
            //     foreach ($_POST['sl'] as $id_sp => $sl) {
            //         if ($sl > 0) {
            //             $_SESSION['giohang'][$_SESSION['id_user']][$id_sp] = $sl;
            //         }
            //     }
            // }
            $arrId = array();
            foreach ($_SESSION['giohang'][$_SESSION['id_user']] as $id_sp => $soluong) {
                $arrId[] = $id_sp;
            }
            $strId = implode(',', $arrId);
            // echo $strId;
            // $strId = substr($strId,1);
            // echo $strId; 
            $sqlgiohang = "SELECT * FROM products WHERE id IN ($strId) ORDER BY ID DESC";
            // echo $sqlgiohang;
            $querygiohang = mysqli_query($conn, $sqlgiohang);
        ?>
            <form id="capnhatgiohang" method="POST">
                <table>
                    <tr>
                        <th class="cartth" width="100">Hình ảnh</th>
                        <th class="cartth">Sản phẩm</th>
                        <th class="cartth">Giá</th>
                        <th class="cartth">Số lượng</th>
                        <th class="cartth">Tổng</th>
                        
                    </tr>
                    <?php
                    $totalAll = 0;
                    while ($rowgiohang = mysqli_fetch_assoc($querygiohang)) {
                        $imggiohang = "./img/" . $rowgiohang['image_url'];
                        $soluonghang = $_SESSION['giohang'][$_SESSION['id_user']][$rowgiohang['id']];
                        $totalPrice = $rowgiohang['price'] * $soluonghang;
                    ?>
                        <tr>
                            <td class="product-image"><img src="<?php echo $imggiohang; ?>"  width="50" height="50"></td>
                            <td><?php echo strtoupper($rowgiohang['name']); ?></td>
                            <td><?php echo number_format($rowgiohang['price'],0,".","."); ?> VNĐ</td>
                            <td class="quantitycart"><input name="sl"  class="cartquantity"  type="number"  value="<?php echo $soluonghang; ?>" readonly></td>
                            <td><?php echo number_format($totalPrice,0,".","."); ?> VNĐ</td>
                        </tr>
                    <?php
                        $totalAll += $totalPrice;
                    }
                    ?>
                </table>
            </form>
            <p id="tieudethanhtoan" style="text-align: right;">Tổng tiền: <?php echo number_format($totalAll,0,".","."); ?> VNĐ</p>
        <?php
        } else {
            echo '<p id="tieudethanhtoan" style="text-align: center;">Không có sản phẩm nào trong giỏ hàng</p>';
        }
        ?>
        <!-- Thêm form ở đây -->
        <div id="divformthanhtoan">
            <form action="luuthanhtoan.php" method="post" id="formthanhtoan">
                <div id="labelthongtin">
                    <P class="left">Họ và tên:</P>
                    <P class="left">Email:</P>
                    <P class="left">Số điện thoại:</P>
                    <P class="left">Hình thức thanh toán:</P>
                    </br>
                    <P class="left">Địa chỉ giao:</P>
                    <p class="left">Tỉnh thành</p>
                    <p class="left">Quận huyện</p>

                </div>

                <div id="inputthanhtoan">
                    <input class="right" type="text" id="fullName" name="tenkhachhang" required></br>
                    <input class="right" type="email" id="email" name="diachiemail" required></br>
                    <input class="right" type="tel" id="phone" name="sodienthoai" required></br>
                    <input class="right" type="radio" id="payment-method-cash" name="pay_method" value="cash_on_delivery" checked>
                    <label for="payment-method-cash">Tiền mặt (Thanh toán khi nhận hàng)</label>
                    </br>
                    <input class="right" type="radio" id="payment-method-bank-transfer" name="pay_method" value="bank_transfer">
                    <label for="payment-method-bank-transfer">Chuyển khoản qua số: 01212121212 AGRIBANK Chi nhánh An Phú</label></br>
                    <input class="right" type="text" id="fullName" name="diachi" required></br>
                    <select name="tinhthanh"  id="city" required>
                        <option value="" selected disabled>Chọn tỉnh thành</option>           
                    </select>
                    </br></br>
                    <select name="quanhuyen"  id="district" required>
                        <option value="" selected disabled>Chọn quận huyện</option>
                    </select>
                                                
                    <button class="checkout-button right" type="submit" name="nutthanhtoan">Xác nhận thanh toán</button>
                </div>
            </form>
        </div>
        <!-- <div id="nuttrongcart">
            <button class="checkout-button">Tiep tuc mua</button>

            <button class="checkout-button">Xac nhan Thanh toán</button>

        </div> -->
    </div>
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


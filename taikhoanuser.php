<?php
// session_start();
include('./config.php');
if(isset($_SESSION['id_user'])){
    $iduser = $_SESSION['id_user'];
    $sqluser = "SELECT * FROM users WHERE id='$iduser'";
    $queryuser = mysqli_query($conn,$sqluser);
    $rowuser = mysqli_fetch_assoc($queryuser);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tài khoản người dùng</title>
    <link rel="stylesheet" href="./cartcss.css">


</head>

<body>
    <div class="container" style="padding-bottom: 5rem!important;">
        <h1 style="text-align: center;">Thông tin tài khoản</h1>
        
        <!-- Thêm form ở đây -->
        <div id="divformthanhtoan">
            <form action="capnhatuser.php?id_user=<?php echo $rowuser['id']; ?>" method="post" id="formthanhtoan">
                <div id="labelthongtin">
                    <P class="left">Tài khoản:</P>
                    <P class="left">Email:</P>
                    <P class="left">Mật khẩu:</P>
                    </br></br></br>
                    <a href="index.php?layout=showdonhang" class="checkout-button left" style="text-decoration: none;">Xem đơn hàng</a>
                </div>
                
                <div id="inputthanhtoan">
                    <input class="right" type="text"  name="tentaikhoan" value="<?php echo $rowuser['username']; ?>"  readonly></br>
                    <input class="right" type="email"  name="emailtaikhoan" value="<?php echo $rowuser['email']; ?>" required></br>
                    <input class="right" type="text"  name="matkhau" value="<?php echo $rowuser['password']; ?>" required></br>
                    <P class="right">Vui lòng thay đổi ở dòng email</br> hoặc mật khẩu hoặc cả hai sau</br>đó nhấn để thay đổi</P>                           
                    <button class="checkout-button right" type="submit" name="nutcapnhatuser">Thay đổi</button>
                </div>
            </form>
        </div>
        <div id="nuttrongcart">
            <button class="checkout-button"><a href="./index.php?layout=trangchu" style="color:white; text-decoration:none;">Trở lại trang chủ</a></button>
        </div>
        <!-- <div id="nuttrongcart">
            <button class="checkout-button">Tiep tuc mua</button>

            <button class="checkout-button">Xac nhan Thanh toán</button>

        </div> -->
    </div>
</body>
</html>
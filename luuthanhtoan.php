<?php
session_start();
include('./config.php');
if(isset($_SESSION['giohang'][$_SESSION['id_user']])&&isset($_POST['nutthanhtoan'])&&isset($_SESSION['id_user'])){
    // Lấy dữ liệu từ form
  $ten_khach_hang = $_POST['tenkhachhang'];
  $dia_chi_email = $_POST['diachiemail'];
  $so_dien_thoai = $_POST['sodienthoai'];
  $pay_method = $_POST['pay_method'];
  $dia_chi = $_POST['diachi'];
  $tinh_thanh = $_POST['tinhthanh'];
  $quan_huyen = $_POST['quanhuyen'];
  $id_user = $_SESSION['id_user'];
  $totalAll = $_SESSION['totalAll'];


  // Tạo câu lệnh SQL để thêm đơn hàng vào cơ sở dữ liệu
  $sql = "INSERT INTO orders (customer_name, customer_address, customer_email, customer_phone_number, total_price, user_id, city, district, pay_method) 
                    VALUES ('$ten_khach_hang', '$dia_chi', '$dia_chi_email', '$so_dien_thoai', '$totalAll','$id_user','$tinh_thanh','$quan_huyen','$pay_method')";

  // Thực thi câu lệnh SQL
  if (mysqli_query($conn, $sql)) {
    // Lấy id của đơn hàng vừa thêm vào
    $id_don_hang = mysqli_insert_id($conn);

    // Lặp qua giỏ hàng để thêm từng sản phẩm vào bảng chi tiết đơn hàng
    foreach ($_SESSION['giohang'][$_SESSION['id_user']] as $product_id => $quantity) {
      // Lấy thông tin sản phẩm từ cơ sở dữ liệu
      $sql = "SELECT * FROM products WHERE id = $product_id";
      $result = mysqli_query($conn, $sql);
      $product = mysqli_fetch_assoc($result);
      $price = $product['price'];

      // Tính tổng tiền cho sản phẩm đó
      $tong_tien = $product['price'] * $quantity;

      // Tạo câu lệnh SQL để thêm sản phẩm vào bảng chi tiết đơn hàng
      $sql = "INSERT INTO order_details (order_id, product_id, quantity, price, total_price) VALUES ($id_don_hang, $product_id, $quantity, $price , $tong_tien)";

      $sqlUpdateSoluong = mysqli_query($conn,"UPDATE products SET quantity=quantity-$quantity WHERE id=$product_id");

      // Thực thi câu lệnh SQL
      mysqli_query($conn, $sql);
    }

    // Xóa giỏ hàng
    unset($_SESSION['giohang'][$_SESSION['id_user']]);

    // Chuyển hướng về trang cảm ơn
    header('Location: index.php?layout=thankyou');
    exit();
  }
}else{
    header('Location: index.php?layout=giohang');
    exit();
}
?>
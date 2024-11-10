<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Admin</title>
</head>

<body>

<?php
    $conn = new mysqli("db", "root", "rootpassword", "bandongho");

    $tong_khach_hang="select * from users where is_admin=0";
    $tong_khach_hang_1 = mysqli_query($conn, $tong_khach_hang);
    $tong_khach_hang_2 = mysqli_num_rows($tong_khach_hang_1);

    $tong_admin="select * from users where is_admin=1";
    $tong_admin1 = mysqli_query($conn, $tong_admin);
    $tong_admin2 = mysqli_num_rows($tong_admin1);

	$tong_san_pham="select * from products";
    $tong_san_pham_1 = mysqli_query($conn, $tong_san_pham);
    $tong_san_pham_2 = mysqli_num_rows($tong_san_pham_1);

	$tong_hoa_don="select * from orders";
    $tong_hoa_don_1 = mysqli_query($conn, $tong_hoa_don);
    $tong_hoa_don_2 = mysqli_num_rows($tong_hoa_don_1);

    $tong_hoa_don_hoanthanh="select * from orders where status='Đã hoàn thành'";
    $tong_hoa_don_hoanthanh1 = mysqli_query($conn, $tong_hoa_don_hoanthanh);
    $tong_hoa_don_hoanthanh2 = mysqli_num_rows($tong_hoa_don_hoanthanh1);

    $tong_hoa_don_chuahoanthanh="select * from orders where status='Đang xử lý'";
    $tong_hoa_don_chuahoanthanh1 = mysqli_query($conn, $tong_hoa_don_chuahoanthanh);
    $tong_hoa_don_chuahoanthanh2 = mysqli_num_rows($tong_hoa_don_chuahoanthanh1);

    $tong_doanh_thu = "select * from orders where status='Đã hoàn thành'";
    $tong_doanh_thu1 = mysqli_query($conn, $tong_doanh_thu);
    $total = 0;
    while($row = mysqli_fetch_assoc($tong_doanh_thu1)){
        $total = $total + $row['total_price'];
    }
?>
<div class="content">
    <div class="row">
        <div class="title col-12 box_shadow">
            <b>Trang chủ</b>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="box_card box_shadow mb-3">
                        <div class="card-header">TỔNG KHÁCH HÀNG</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tong_khach_hang_2 ?> khách hàng</h5>
                            <p class="card-text">Tổng số khách hàng được quản lý.</p>
                        </div>
                    </div>
                </div>
				<div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">TỔNG SẢN PHẨM</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong_san_pham_2 ?> sản phẩm</h5>
							<p class="card-text">Tổng số sản phẩm được quản lý.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">TỔNG ĐƠN HÀNG</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong_hoa_don_2 ?> đơn hàng</h5>
							<p class="card-text">Tổng số hóa đơn đã đươc đặt.</p>
						</div>
					</div>
				</div>
				<!-- <div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">SẮP HẾT HÀNG</div>
						<div class="card-body">
							<h5 class="card-title">0 sản phẩm</h5>
							<p class="card-text">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
						</div>
					</div>
				</div> -->
                <div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">TỔNG DOANH THU</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo number_format($total,0,".","."); ?> VNĐ</h5>
							<p class="card-text">Số tiền từ các đơn hàng đã hoàn thành.</p>
						</div>
					</div>
				</div>
                <div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">ĐƠN HÀNG ĐÃ HOÀN THÀNH</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong_hoa_don_hoanthanh2 ?> đơn hàng</h5>
							<p class="card-text">Số đơn hàng đã giao và thanh toán hoàn tất.</p>
						</div>
					</div>
				</div>
                <div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">ĐƠN HÀNG ĐANG CHỜ XỬ LÝ</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong_hoa_don_chuahoanthanh2 ?> đơn hàng</h5>
							<p class="card-text">Số đơn hàng đang chờ xủ lý.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>

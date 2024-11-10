<?php
include('./config.php');

// if(isset($_SESSION['huy_xoa_sp'])&&$_SESSION['huy_xoa_sp'] == -1){
// 	unset($_SESSION['adminxoasp']);
// 	unset($_SESSION['huy_xoa_sp']);
// }

if(isset($_SESSION['adminxoasp'])&&$_SESSION['adminxoasp'] == -1&&isset($_GET['id_sp_xoa'])){
	$idspxoa = $_GET['id_sp_xoa'];

	echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Xác nhận xóa sản phẩm',
                text: 'Bạn có chắc chắn muốn xóa sản phẩm này không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!',
                cancelButtonText: 'Không, huy bo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng nhấn xác nhận, chuyển hướng
		    window.location.href = 'adminxoasanpham2.php?id_sp_se_duoc_xoa=' + $idspxoa;
		 } else {
		
		 }
            });
        });
    </script>";
	unset($_SESSION['adminxoasp']);
} else if (isset($_SESSION['adminxoasp'])&& $_SESSION['adminxoasp']==0){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Ooops, San pham da duoc an.",
        text: "Khong the xoa vi da duoc ban ra!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['adminxoasp']);
}


$page;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$rowperpage = 5;

$perRow = ($page * $rowperpage) - $rowperpage;

if (isset($_POST['nutlocsanphamadmin']) || isset($_GET['nutlocsanphamadmin'])) {
	if (isset($_POST['danhmuclocspadmin'])) {
		$danhmuccanlocsp = $_POST['danhmuclocspadmin'];
	} else {
		$danhmuccanlocsp = $_GET['danhmuclocspadmin'];
	}
	if ($danhmuccanlocsp == 'toanbosp') {
		$sqlphantrang = "SELECT products.id,products.name,products.image_url,products.price,products.quantity,products.isshow,categories.name as category_name FROM products INNER JOIN categories ON products.category_id=categories.id  ORDER BY products.id ASC LIMIT $perRow,$rowperpage";
		$queryphantrang = mysqli_query($conn, $sqlphantrang);
		$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products "));
		$totalPage = ceil($totalRow / $rowperpage);

		$listPage = "";
		for ($i = 1; $i <= $totalPage; $i++) {
			if ($page == $i) {
				$listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
			} else {
				$listPage .= '<a href="./admin.php?adminlayout=adminsanpham&page=' . $i . '" class="phan_trang">' . $i . '</a>';
			}
		}
	} else {
		$sqlphantrang = "SELECT products.id,products.name,products.image_url,products.price,products.quantity,products.isshow,categories.name as category_name FROM products INNER JOIN categories ON products.category_id=categories.id WHERE category_id='$danhmuccanlocsp'  ORDER BY products.id ASC LIMIT $perRow,$rowperpage";
		$queryphantrang = mysqli_query($conn, $sqlphantrang);
		$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products WHERE category_id='$danhmuccanlocsp'"));

		$totalPage = ceil($totalRow / $rowperpage);

		$listPage = "";
		for ($i = 1; $i <= $totalPage; $i++) {
			if ($page == $i) {
				$listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
			} else {
				$listPage .= '<a href="./admin.php?adminlayout=adminsanpham&nutlocsanphamadmin&danhmuclocspadmin=' . $danhmuccanlocsp . '&page=' . $i . '" class="phan_trang">' . $i . '</a>';
			}
		}
	}
} else {
	$sqlphantrang = "SELECT products.id,products.name,products.image_url,products.price,products.quantity,products.isshow,categories.name as category_name FROM products INNER JOIN categories ON products.category_id=categories.id  ORDER BY products.id ASC LIMIT $perRow,$rowperpage";
	//   INNER JOIN categories ON products.category_id=categories.id them vao
	//   khi mhuon lay ca ten danh muc
	$queryphantrang = mysqli_query($conn, $sqlphantrang);

	$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
	$totalPage = ceil($totalRow / $rowperpage);

	$listPage = "";
	for ($i = 1; $i <= $totalPage; $i++) {
		if ($page == $i) {
			$listPage .= '<a href="#" class="phan_trang active" style="background-color: #0077FF">' . $i . '</a>';
		} else {
			$listPage .= '<a href="./admin.php?adminlayout=adminsanpham&page=' . $i . '" class="phan_trang">' . $i . '</a>';
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
	<title>Document</title>
</head>

<body>

	<div class="content">
		<div class="row">
			<div class="title col-12 box_shadow">
				<b>Quản lý sản phẩm</b>
			</div>
		</div>
		<div class="row main_frame box_card box_shadow">
			<div class="element_btn">
				<span>
					<a href="./admin.php?adminlayout=themsp" class="addnew_btn"><i class="fas fa-plus"></i>Thêm sản phẩm</a></br>
				</span>
				<span class="loc">
					<form action="./admin.php?adminlayout=adminsanpham" method="POST">
						<!-- class="form-select" -->
						<select aria-label="Default select example" name="danhmuclocspadmin">
							<option value="toanbosp" selected>Toàn bộ sản phẩm</option>
							<?php
							$sql1 = "select * from categories where status='1'";
							$result1 = mysqli_query($conn, $sql1);
							while ($row1 = mysqli_fetch_assoc($result1)) {
								?>
								<option value="<?php echo $row1['id']; ?>"><?php echo strtoupper($row1['name']); ?></option>
								<?php
							}
							?>
						</select>
						<button type="submit" class="addnew_btn" name="nutlocsanphamadmin" style="border:0; padding: 1px 12px; ">Lọc</button>
					</form>
				</span>
			</div>
			<div class="table-responsive-lg">
				<table class="table table-bordered">
					<thead>
						<tr class="table-secondary">
							<th scope="col">Hình ảnh</th>
							<th scope="col">Tên sản phẩm</th>
							<th scope="col">Thương hiệu</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Giá</th>
							<th scope="col">Ẩn</th>
							<th scope="col">Sửa</th>
							<th scope="col">Xóa</th>
						</tr>
					</thead>

					<tbody>
						<?php
						while ($row = mysqli_fetch_assoc($queryphantrang)) {
							$linkimgadmin = "./img/" . $row['image_url'];
							if($row['isshow']==0){
								$isshow = 'Vẫn bán';
							}else if($row['isshow']==1){
								$isshow = 'Đã ẩn';
							}
							echo '
                            <tr>
						    <td align="center" ><img src="' . $linkimgadmin . '" style="width:80px;" border="0" ></td>
							<td>' . $row['name'] . '</td>
						    <td>' . strtoupper($row['category_name']) . '</td>
							<td>' . $row['quantity'] . '</td>
						    <td>' . $row['price'] . '</td>
							<td>' . $isshow . '</td>
						    <td><a href="./admin.php?adminlayout=suasp&page=' . $page . '&id_sp=' . $row['id'] . '" class="addnew_btn">Sửa</a></td>
                            <td><a href="./adminxoasanpham.php?id_sp=' . $row['id'] . '" class="addnew_btn">Xóa</a></td>
					        </tr>';
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="category_paging">
				<?php
				echo $listPage;
				?>
			</div>
		</div>
	</div>
	</div>
	<script>
		function confirmAlert() {
			if (confirm("Bạn có muốn xóa sản phẩm này không?")) return true
			else return false
		}
	</script>
</body>

</html>

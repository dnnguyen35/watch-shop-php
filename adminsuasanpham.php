<?php
include('./config.php');
$id_sp = $_GET['id_sp'];
$sqlsp = "select * from products where id='$id_sp'";
$resultsp = mysqli_query($conn, $sqlsp);
$rowsp = mysqli_fetch_assoc($resultsp) ;
$imgsp = "./img/".$rowsp['image_url'];

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if(isset($_POST['nutsuasp'])){
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $danh_muc = $_POST['danh_muc'];
    $noi_dung = $_POST['noi_dung'];
    
    // Kiểm tra xem người dùng đã chọn file ảnh mới hay chưa
    if(isset($_FILES['hinh_anh']['name']) && !empty($_FILES['hinh_anh']['name'])) {
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $tmp_name = $_FILES['hinh_anh']['tmp_name'];
        move_uploaded_file($tmp_name, "./img/".$hinh_anh);
    } else {
        $hinh_anh = $rowsp['image_url'];
    }
    
    // Cập nhật dữ liệu vào database
    $sqlsuasp = "update products set name='$ten', price='$gia', quantity='$soluong', category_id='$danh_muc', image_url='$hinh_anh', description='$noi_dung' where id='$id_sp'";
    $resultsuasp = mysqli_query($conn, $sqlsuasp);
    header('location: ./admin.php?adminlayout=adminsanpham&page='.$page.'');
    
    // if($resultsuasp){
    //     echo "<script>alert('Sửa sản phẩm thành công');</script>";
        
    // } else {
    //     echo "<script>alert('Sửa sản phẩm thất bại');</script>";
    // }
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
                <b>Sửa sản phẩm</b>
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
                                        <input name="ten" value="<?php echo ucfirst($rowsp['name']);?>" type="text" class="form-control" id="floatingInput" placeholder="Tên sản phẩm" required>
                                        <label for="floatingInput">Tên sản phẩm</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="gia" value="<?php echo $rowsp['price'];?>" type="text" class="form-control" id="floatingInput" placeholder="Giá tiền" required>
                                        <label for="floatingInput">Giá</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="soluong" value="<?php echo $rowsp['quantity'];?>" type="text" class="form-control" id="floatingInput" placeholder="Số lượng" required>
                                        <label for="floatingInput">Số lượng</label>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">


                                        <select name="danh_muc" class="form-select" id="floatingSelect" aria-label="123" required>
                                        <?php
                                            $sqldanhmuc = "select * from categories";
                                            $resultdanhmuc = mysqli_query($conn, $sqldanhmuc);

                                            while ($rowdanhmuc = mysqli_fetch_assoc($resultdanhmuc)) {
                                                ?>
                                            <option
                                                <?php
                                                if($rowsp['category_id']==$rowdanhmuc['id']){
                                                    echo 'selected';
                                                }
                                                ?>
                                            value="<?php echo $rowdanhmuc['id'];?>" ><?php echo strtoupper($rowdanhmuc['name']);?>
                                           </option>  
                                            <?php
                                            }
                                            ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" aria-label="123">
                                            <label for="floatingSelect">Danh mục</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <div class="as">
                                            <span>Hình ảnh</span><input type="file" name="hinh_anh" class="btn btn-outline-secondary"  ><input type="hidden" name="hinh_anh" class="btn btn-outline-secondary" value="<?php echo $row['image_url']; ?>" >
                                            <img  src="./img/<?php echo $rowsp['image_url']; ?>" style="width:80px; border:0";>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                
                                <textarea id="noi_dung" name="noi_dung" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px" required><?php echo ucfirst($rowsp['description']); ?></textarea>
                                <label for="floatingTextarea">Nội dung</label>
                            </div>
                        </div>
                        <button type="submit" name="nutsuasp" class="btn btn-outline-success" style="margin-left: 1.5625rem;">Sửa sản phẩm</button>
                    </form>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
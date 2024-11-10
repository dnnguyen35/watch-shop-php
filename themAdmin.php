<?php
include('./config.php');

if (isset($_POST['nutthemadmin'])) {
    $tenadmin = mysqli_real_escape_string($conn, $_POST['tenadmin']);
    $matkhauadmin = $_POST['tenadmin'];
    $emailadmin = $_POST['emailadmin'];
    $error = [];

    $sql = "select * from users where username = '$tenadmin'  ";
    $result = mysqli_query($conn, $sql);

    $sql1 = "select * from users  ";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0) {
        $error['trungtenadmin'] = 'Tên đã được sử dụng';
    }
    while ($row1 = mysqli_fetch_assoc($result1)) {
        if ($row1['email'] == $emailadmin) {
            $error['trungemailadmin'] = 'Email đã được sử dụng';
        }
    }
    if (empty($error)) {
        $insert = "insert into users(username,password,email,is_admin) values('$tenadmin','$matkhauadmin','$emailadmin','1')";
        mysqli_query($conn, $insert);
        header('location: ./admin.php?adminlayout=adminnguoidung');
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
                <b>Thêm Admin</b>
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
                                        <input name="tenadmin" value="<?php if(isset($tenadmin)) echo $tenadmin; ?>" type="text" class="form-control" id="floatingInput" placeholder="User name" required>
                                        <label for="floatingInput">Tên tài khoản</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="matkhauadmin" value="<?php if(isset($matkhauadmin)) echo $matkhauadmin; ?>" type="text" class="form-control" id="floatingInput" placeholder="Password" required>
                                        <label for="floatingInput">Mật khẩu</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="emailadmin" value="<?php if(isset($emailadmin)) echo $emailadmin; ?>" type="email" class="form-control" id="floatingInput" placeholder="Email" required>
                                        <label for="floatingInput">Email</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <p><?php if (isset($error['trungtenadmin'])) {
                                            echo $error['trungtenadmin'];
                                        } ?></p>
                                    </br></br></br></br></br></br>
                                    <p><?php if (isset($error['trungemailadmin'])) {
                                            echo $error['trungemailadmin'];
                                        } ?></p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="nutthemadmin" class="btn btn-outline-success">Thêm Admin</button>
                    </form>
                </table>
                <a  href="./admin.php?adminlayout=adminnguoidung" class="btn btn-outline-success">Trở lại</a>
            </div>
        </div>
    </div>

</body>

</html>
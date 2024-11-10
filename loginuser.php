<?php
session_start();
include('./config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btndangnhap'])) {


    $_SESSION['login'] = 0;
    $name = mysqli_real_escape_string($conn, $_POST['logname']);
    $pass = $_POST['logpass'];

    $error = [];

    if (empty($name)) {
        $error['rongten'] = 'Vui lòng nhập đủ tài khoản mật khẩu';
    }
    if (empty($pass)) {
        $error['rongpass'] = 'Vui lòng nhập đủ tài khoản mật khẩu';
    }


    $sql = "select * from users where username = '$name' and password = '$pass' ";
    $result = mysqli_query($conn, $sql);



    if (mysqli_num_rows($result) == 0) {
        $error['khongtontai'] = 'Sai tài khoản hoặc mật khẩu';
    } else if (empty($error)) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == 1) {
            $taikhoanbikhoa['bikhoa'] = "Tài khoản đã bị khóa";
            $_SESSION['login'] = 0;
        } else {
            $_SESSION['id_user'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['login'] = 1;
            $_SESSION['totalAll'] = 0;
            header('location: index.php');
            exit();
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="./loginsignupcss.css">
    <title>Đăng nhập / Đăng ký</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="loginuser.php" class="sign-in-form" id="dangnhapform" method="post">
                    <div class="dangnhap-tittle">
                        <h2 id="title" class="dangnhap-titlee title">Đăng nhập</h2>
                        <small></small>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên tài khoản" name="logname" value="<?php if (isset($name)) echo $name; ?>" />
                        <?php
                        //echo isset($eror['rongten']) ? '<small>' . $eror['rongten'] . '</small>' : '';
                        if (isset($error['rongten'])) {
                            echo '<small>' . $error['rongten'] . '</small>';
                        } else if (isset($error['khongtontai'])) {
                            echo '<small>' . $error['khongtontai'] . '</small>';
                        } else if (isset($taikhoanbikhoa['bikhoa'])) {
                            echo '<small>' . $taikhoanbikhoa['bikhoa'] . '</small>';
                        }
                        ?>
                    </div>
                    <!--<div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" id="email" />
                        <small></small>
                    </div>-->
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="logpass" value="<?php if (isset($pass)) echo $pass; ?>" />
                        <?php
                        //echo isset($eror['rongten']) ? '<small>' . $eror['rongten'] . '</small>' : '';
                        if (isset($error['rongpass'])) {
                            echo '<small>' . $error['rongpass'] . '</small>';
                        } else if (isset($error['khongtontai'])) {
                            echo '<small>' . $error['khongtontai'] . '</small>';
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn solid" name="btndangnhap">Đăng nhập</button>
                    <!-- <p><a href="./loginadmin.php">Bạn là quản trị viên ?</a></p> -->
                    <!-- <span id="quenmatkhau"><a href="#"> Quên mật khẩu?</a></span> -->
                    <!-- <p class="social-text optionlogin">Hoặc với các mạng xã hội khác</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a> -->
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bạn là thành viên mới?</h3>
                    <p>
                        Hãy nhấn vào nút bên dưới để đăng ký
                    </p>
                    <button class="btn transparent" id="sign-up-btn" onclick="window.location.href= 'signupuser.php'">
                        Đăng ký
                    </button>
                </div>
                <img src="" class="image" alt="" />
            </div>

        </div>
    </div>
    <!--Dây là footer-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


</body>

</html>
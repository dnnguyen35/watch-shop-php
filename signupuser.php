<?php
include('config.php');
//if (isset($_POST['btndangky']))
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btndangky'])) {


    $name = mysqli_real_escape_string($conn, $_POST['signname']);
    $pass = $_POST['signpass'];
    $rpass = $_POST['signrpass'];
    $email = $_POST['signemail'];
    $error = [];

    if (empty($name)) {

        $error['rongten'] = 'Vui lòng nhập đủ tài khoản và mật khẩu';
    }
    if (empty($pass)) {
        $error['rongpass'] = 'Vui lòng nhập đủ tài khoản và mật khẩu';
    }
    if(empty($email)){
        $error['rongemail'] = 'Vui lòng nhập email';
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['invalidemail'] = 'Vui lòng nhập đúng email' ;
        }
    }
    if (empty($rpass)) {
        $error['rongrpass'] = 'Vui lòng nhập đủ tài khoản và mật khẩu';
    }


    $sql = "select * from users where username = '$name'  ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $error['trungten'] = 'Tài khoản đã tồn tại';
    }
    if ($pass != $rpass) {
        $error['saipass'] = 'Mật khẩu không khớp';
    } 
    if(empty($error)) {
        $insert = "insert into users(username,password,email) values('$name','$pass','$email')";
        mysqli_query($conn, $insert);
        $sucess['thanhcong'] = 'Đăng ký tài khoản thành công!';
        header('location:loginuser.php');
        exit();
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
    <title>Đăng ký</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="signupuser.php" class="sign-in-form" id="dangnhapform" method="post">
                    <div class="dangnhap-tittle">
                        <h2 id="title" class="dangnhap-titlee title">Đăng ký</h2>
                        <?php
                        if (isset($sucess['thanhcong'])) {
                            echo '<small>' . $sucess['thanhcong'] . '</small>';
                        }
                        ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên tài khoản" name="signname" value="<?php if (isset($name)) echo $name; ?>" />
                        <?php
                        //echo isset($eror['rongten']) ? '<small>' . $eror['rongten'] . '</small>' : '';
                        if (isset($error['rongten'])) {
                            echo '<small>' . $error['rongten'] . '</small>';
                        } else if (isset($error['trungten'])) {
                            echo '<small>' . $error['trungten'] . '</small>';
                        }
                        ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="signpass" value="<?php if (isset($pass)) echo $pass; ?>" />
                        <?php
                        if (isset($error['rongpass'])) {
                            echo '<small>' . $error['rongpass'] . '</small>';
                        }
                        ?>
                    </div>                   
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" placeholder="Email" name="signemail" value="<?php if (isset($email)) echo $email; ?>" />
                        <?php
                        //echo isset($eror['rongten']) ? '<small>' . $eror['rongten'] . '</small>' : '';
                        if (isset($error['rongemail'])) {
                            echo '<small>' . $error['rongemail'] . '</small>';
                        } else if (isset($error['invalidemail'])) {
                            echo '<small>' . $error['invalidemail'] . '</small>';
                        }
                        ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Nhập lại mật khẩu" name="signrpass" value="<?php if (isset($rpass)) echo $rpass; ?>" />
                        <?php
                        if (isset($error['rongrpass'])) {
                            echo '<small>' . $error['rongrpass'] . '</small>';
                        } else if (isset($error['saipass'])) {
                            echo '<small>' . $error['saipass'] . '</small>';
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn solid" name="btndangky">Đăng ký</button>
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
                    <h3>Bạn đã có tài khoản?</h3>
                    <p>
                        Hãy nhấn vào nút bên dưới để đăng nhập
                    </p>
                    <button class="btn transparent" id="sign-up-btn" onclick="window.location.href= 'loginuser.php'">
                        Đăng nhập
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
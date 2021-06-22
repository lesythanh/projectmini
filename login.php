<?php 
session_start();
require "config.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if(isset($_POST['remeber'])){
        setcookie("username", $username);
        setcookie("password", $_POST['password']);
    }

    $sql = "SELECT * FROM login WHERE l_name ='$username' AND l_password ='$password'";
    $retval = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row( $retval);
    if(count($row)){
        $_SESSION["login"] = $row;
        header('location:index.php');
    }
}
$username = "";
$password = "";
$check = false;
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $check = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Đăng Nhập Tài Khoản</h1>
        <label> Tên Đăng Nhập </label>
        <input type="text" name="username" placeholder="Tên Đăng Nhập" value="<?php echo $username; ?>" >
        <label> Mật Khẩu </label>
        <input type="password" name="password" placeholde="Mật Khẩu" value="<?php echo $password; ?>">
        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="remeber" value="1" <?php echo ($check)?"checked":''?>><span class="custom-control-lable">Remember Me</span>
            </label>
        </div>
        <button type="submit" name="login"> đăng nhập </button>
    </form>
</body>
</html>
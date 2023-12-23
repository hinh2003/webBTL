<?php
include ("D:\PTUDW\BTA\adminphp\config\connet.php");
if (isset($_GET['ten'])  && $_GET['email']&&$_GET['password']) {
    $name = $_GET['ten'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $sql_check_account = "SELECT name FROM nguoidung WHERE name='$name'";
    $result_check_account = $conn->query($sql_check_account);
    if ($result_check_account->num_rows == 0) {
        $sql_check_email = "SELECT email FROM nguoidung WHERE email='$email'";
        $result_check_email = $conn->query($sql_check_email);

        if ($result_check_email->num_rows == 0) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql_dangki = "INSERT INTO nguoidung(name, password, email) VALUES ('$name', '$hashed_password', '$email')";
            $result = $conn->query($sql_dangki);
            if ($result) {
                echo "Đăng ký thành công";
            } else {
                echo "Đăng ký không thành công";
            }
        } else {
            echo "Địa chỉ email đã tồn tại";
        }
    } else {
        echo "Tài Khoản đã tồn tại";
    }
}


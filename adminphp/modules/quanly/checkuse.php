<?php
if(!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION['name']) ||  $_SESSION['ten_quyen'] != "Admin") {
    echo "Bạn không phải là admin";
    echo "<br><a href='/index.php?quanly=dangnhap'>Đăng nhập</a>";
    exit;
}

?>

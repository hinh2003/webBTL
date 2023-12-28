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

session_start(); 

if(isset($_SESSION['nguoidung_id']) && isset($_GET['id'])){
    $idphim = $_GET['id'];
    $nguoidung_id = $_SESSION['nguoidung_id'];
    $sql_phimyeuthich = "INSERT INTO phim_yeuthich (nguoidung_id, phim_id)
                        VALUES ('$nguoidung_id', '$idphim')";
    $result_phimyeuthich = $conn->query($sql_phimyeuthich);
    if($result_phimyeuthich){
        header('Location:../../index?quanly=trangchu&query=thongtin&id= '.$idphim);
    }
    else{
        echo "Loi"  ;
    }
}

if(isset($_SESSION['nguoidung_id']) && isset($_GET['idbo'])){
    
    $idphim = $_GET['idbo'];
    $nguoidung_id = $_SESSION['nguoidung_id'];
    $sql_phimyeuthich = "DELETE FROM `phim_yeuthich` WHERE phim_id = ' $idphim' AND nguoidung_id = '$nguoidung_id'";
    $result_phimyeuthich = $conn->query($sql_phimyeuthich);
    if($result_phimyeuthich){
        header('Location:../../index?quanly=trangchu&query=thongtin&id= '.$idphim);
    }
    else{
        echo "Loi"  ;
    }
}
elseif(isset($_GET['timkiem'])){
    $timkiem = $_GET['timkiem'];
    $sql= "SELECT * FROM `phim` WHERE ten_phim  LIKE '%$timkiem%'";
    $result_tim_kiem = $conn->query($sql);
    if($result_tim_kiem->num_rows >0){
    while($row = $result_tim_kiem->fetch_assoc()){
        echo '<div  class="timkiem">';
        echo '<a href="?quanly=trangchu&query=thongtin&id=' . $row["phim_id"] . '">';
        echo '<img style="width: 100px; height :150px;" src="/images/' . $row["anh"] . '" alt="Ảnh">';
        echo '<h4>' . $row["ten_phim"] . '</h4>';
        echo '</a>';
        echo '</div>';
    }}
    else{
        echo '<div style="color: white;text-align: center;">Không có !</div>';
    }
}


?>

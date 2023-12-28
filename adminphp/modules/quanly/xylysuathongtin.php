<?php
require("/PTUDW/BTA/adminphp/config/connet.php");
    if (isset($_GET['email'])) {
    $idsua = $_GET['idnguoidung'];
    $email = $_GET['email'];
    $ten_quyen = $_GET['ten_quyen'];
    $sql_check_email = "SELECT COUNT(*) as total FROM nguoidung WHERE email = '$email'AND nguoidung_id != $idsua";
    $result_check_email = $conn->query($sql_check_email);
    if ($result_check_email) {
        $row = $result_check_email->fetch_assoc();
        $email_count = $row['total'];

        if ($email_count > 0) {
            echo "Email đã tồn tại. Vui lòng chọn email khác.";
        } else {
            if (!empty($_POST['password'])) {
                $password = $_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql_update="UPDATE nguoidung 
                            SET email = '$email',
                            password = '$hashed_password', 
                            quyen_id = (SELECT quyen_id FROM quyen WHERE ten_quyen = '$ten_quyen') 
                            WHERE nguoidung_id = $idsua";
            } else {
                $sql_update = "UPDATE nguoidung 
                SET email = '$email',
                quyen_id = (SELECT quyen_id FROM quyen WHERE ten_quyen = '$ten_quyen') 
                WHERE nguoidung_id = $idsua";
            }

            if ($conn->query($sql_update) === TRUE) {
                echo "Cập Nhập thành công";
                        } else {
                echo "Lỗi: " . $conn->error;
            }
        }
    }
}
?>
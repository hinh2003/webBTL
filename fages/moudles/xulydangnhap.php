<?php
include ("D:\PTUDW\BTA\adminphp\config\connet.php");
 if(isset($_GET['tendangnhap']) && $_GET['paswworddangnhap']){
    $name = $_GET['tendangnhap'];
    $password = $_GET['paswworddangnhap'];
    $sql_name = "SELECT name ,password FROM nguoidung WHERE name = '$name'";
    $result_name = $conn->query($sql_name);
    if($result_name ->num_rows ==1){
        $row = $result_name->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $sql_get_role_name = "SELECT quyen.ten_quyen, nguoidung.nguoidung_id
            FROM nguoidung
            INNER JOIN quyen ON nguoidung.quyen_id = quyen.quyen_id
            WHERE name = '$name'";
            $result_role_id = $conn->query($sql_get_role_name);
            if($result_role_id->num_rows >0){
                $row_role_id = $result_role_id->fetch_assoc();
                $role_name = $row_role_id['ten_quyen'];
                $idnguoidung = $row_role_id['nguoidung_id'];
            session_start();
            $_SESSION['name'] = $name ;   
            $_SESSION['nguoidung_id'] = $idnguoidung ;   
            $_SESSION['ten_quyen'] = $role_name;
            if ($role_name == "Admin") {
            session_start();
                $_SESSION['is_admin'] = true;
            } 
            }     
        }
        else{
            echo "Sai Mật khẩu";
        }

    }
    else{
       echo "Sai tên đăng nhập";
    }
}
?>
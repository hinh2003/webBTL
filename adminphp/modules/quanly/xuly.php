<?php
require("/PTUDW/BTA/adminphp/config/connet.php");
if (!mysqli_set_charset($conn, 'utf8')) {
    echo 'Error setting character set: ' . mysqli_error($conm);
    exit;
}
function comboBox($conn, $sql, $columnName)
{
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $options = '<select id="' . $columnName . '" name="' . $columnName . '">';
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row[$columnName] . '">' . $row[$columnName] . '</option>';
        }
        $options .= '</select>';
        echo $options;
    } else {
        echo "Không có dữ liệu";
    }
}
?>
<?php
if (isset($_POST['tenphim'])) {
    $ten_phim = $_POST['tenphim'];
    $so_tap = $_POST['sotap'];
    $filename = $_FILES['img']['name'];
    $nuoc = $_POST['ten_nuoc'];
    $trangthai = $_POST['ten_trangthai'];
    $mieuta = $_POST['mieuta'];
    $theloaiphim = $_POST['txtBoxtheloai'];
    $sql = "SELECT COUNT(*) as total FROM phim WHERE ten_phim = '$ten_phim'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = $row['total']; 
    if(empty($ten_phim)){
        echo " Tên phim không được để trống";
    }
    elseif(empty($so_tap)){
        echo " Số tập không được để trống";
    }
    elseif(empty($mieuta)){
        echo " Miêu tả không được để trống";
    } elseif(empty($theloaiphim)){
        echo " Thể loại không được để trống";
    }
else{
    if ($total > 0) {
        echo "Tên phim đã tồn tại";
    } else {
        $sql_them_phim = "INSERT INTO phim (ten_phim, sotap, anh, mieuta, nuoc_id, trangthai_id)
            VALUES ('$ten_phim', $so_tap, '$filename', '$mieuta', 
            (SELECT nuoc_id FROM nuoc WHERE ten_nuoc = '$nuoc'), 
            (SELECT trangthai_id FROM trangthai WHERE ten_trangthai = '$trangthai'))";

        $result_them_phim = $conn->query($sql_them_phim);

        if ($result_them_phim) {
            
            $theloaiphim_ids = explode(',', $theloaiphim);
            foreach ($theloaiphim_ids as $theloai_ten) {
            $theloai_ten = trim($theloai_ten);    
            $sql_lay_id_phim = "SELECT phim_id FROM phim WHERE ten_phim = '$ten_phim' AND sotap = $so_tap";
            $result_lay_id_phim = $conn->query($sql_lay_id_phim);
            $row = $result_lay_id_phim->fetch_assoc();
            $phim_id_moi = $row['phim_id'];
                $sql_them_theloai = "INSERT INTO theloaiphim (phim_id, theloai_id) 
                    VALUES ($phim_id_moi, (SELECT theloai_id FROM theloai WHERE ten_theloai = '$theloai_ten'))";
                $result_theloai = $conn->query($sql_them_theloai);

                if (!$result_theloai) {
                    echo "Error: " . $sql_them_theloai . "<br>" . $conn->error;
                }
            }

            echo "Thêm Thành Công";
        } else {
            echo "Error: " . $sql_them_phim . "<br>" . $conn->error;
        }
    }
}
}
 elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_xoa = "DELETE FROM phim WHERE phim_id= '$id'";
    $result = $conn->query($sql_xoa);

    header("Location: ../../index.php?action=thongke&query=them");
} elseif (isset($_GET['idnguoidung'])) {
    $idnguoidung = $_GET['idnguoidung'];
    $sql_xoanguoidung = "DELETE FROM nguoidung WHERE nguoidung_id= '$idnguoidung'";
    $result = $conn->query($sql_xoanguoidung);
    if ($result) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['is_admin'] == true) {
            unset($_SESSION['name']);
            header("Location: ../../index.php?action=them&query=them");

        }
    }
    header("Location: ../../index.php?action=taikhoan&query=thongtin");
}
 elseif (isset($_GET['tentheloai'])) {
    $theloai = $_GET['tentheloai'];
    $mieuta = $_GET['mieutatheloai'];
    $sql_check_ten = "SELECT COUNT(*) as total FROM theloai WHERE ten_theloai = '$theloai'";
    $result_check_ten = $conn->query($sql_check_ten);
    if ($result_check_ten) {
        $row_ten = $result_check_ten->fetch_assoc();
        $ten_count = $row_ten['total'];

        if ($ten_count > 0) {
            echo "Tên Thể Loại đã tồn tại!.";
        } else {
            $sql_themtheloai = "INSERT INTO `theloai`(`ten_theloai`, `mieuta`) VALUES ('$theloai','$mieuta')";
            $result_themtheloaiphim = $conn->query($sql_themtheloai);
            if ($result_themtheloaiphim) {
                echo "Thêm thành công";
            } else {
                echo "Lỗi";
            }
        }
    }
}
?>
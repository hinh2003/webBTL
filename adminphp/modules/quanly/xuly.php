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
if (isset($_POST['themphim'])) {
    $ten_phim = $_POST['tenphim'];
    $so_tap = $_POST['sotap'];
    $filename = $_FILES['img']['name'];
    $nuoc = $_POST['ten_nuoc'];
    $trangthai = $_POST['ten_trangthai'];
    $mieuta = $_POST['mieuta'];
    $sql = "INSERT INTO phim (ten_phim, sotap, anh, mieuta, nuoc_id, trangthai_id)
            VALUES ('$ten_phim', $so_tap, '$filename', '$mieuta', 
            (SELECT nuoc_id FROM nuoc WHERE ten_nuoc = '$nuoc'), 
            (SELECT trangthai_id FROM trangthai WHERE ten_trangthai = '$trangthai'))";

    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../../index.php?action=them&query=them");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['suaphim'])) {
    $idsua = $_GET['idsua'];
    $ten_phim = $_POST['tenphim'];
    $so_tap = $_POST['sotap'];
    $mieuta = $_POST['mieuta'];
    $nuoc = $_POST['ten_nuoc'];
    $trangthai = $_POST['ten_trangthai'];
    if ($_FILES['img']['name'] !== '') {
        $sql_update = "UPDATE phim SET ten_phim = '$ten_phim', sotap= '$so_tap', anh='$filename', mieuta= '$mieuta',
                        nuoc_id = (SELECT nuoc_id FROM nuoc WHERE ten_nuoc = '$nuoc'), 
                        trangthai_id = (SELECT trangthai_id FROM trangthai WHERE ten_trangthai = '$trangthai')
                        WHERE phim_id = '$idsua'";
    } else {
        $sql_update = "UPDATE phim SET ten_phim = '$ten_phim', sotap= '$so_tap', mieuta= '$mieuta',
                        nuoc_id = (SELECT nuoc_id FROM nuoc WHERE ten_nuoc = '$nuoc'), 
                        trangthai_id = (SELECT trangthai_id FROM trangthai WHERE ten_trangthai = '$trangthai')
                        WHERE phim_id = '$idsua'";
    }
    $result = $conn->query($sql_update);
    header("Location: ../../index.php?action=them&query=them");

} elseif (isset($_GET['id'])) {
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
} elseif (isset($_GET['tentheloai'])) {
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
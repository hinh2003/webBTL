<?php
require("/PTUDW/BTA/adminphp/config/connet.php");
if (isset($_POST['tenphim'])) {
    $idsua = $_POST['idsua'];
    $ten_phim = $_POST['tenphim'];
    $so_tap = $_POST['sotap'];
    $mieuta = $_POST['mieuta'];
    $nuoc = $_POST['ten_nuoc'];
    $theloai = $_POST['txtBoxtheloai'];
    $filename=$_FILES['img']['name'];
    $trangthai = $_POST['ten_trangthai'];
    $selectedTheloai = explode(',', $theloai);
    if (empty($theloai) || empty($ten_phim)|| empty($so_tap)|| empty($mieuta)) {
        echo "không được để trống";
    }
    else{
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
    foreach($selectedTheloai as $theloai_ten){
        $sql_xoa_theloai = "DELETE FROM theloaiphim WHERE phim_id = '$idsua'";
         $result_xoa_theloai = $conn->query($sql_xoa_theloai);
    }
  
    foreach ($selectedTheloai as $theloai_ten) {
        $theloai_ten = trim($theloai_ten);
        $sql_them_theloai = "INSERT INTO theloaiphim (phim_id, theloai_id) 
                             VALUES ('$idsua', (SELECT theloai_id FROM theloai WHERE ten_theloai = '$theloai_ten'))";
        $result_them_theloai = $conn->query($sql_them_theloai);
    }
    $result = $conn->query($sql_update);
    echo "Sửa Thành Công";
}
}


?>
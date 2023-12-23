
<?php
    $phim = $_GET['id'];
    $sql_thongtinphim = "SELECT phim.ten_phim, phim.anh,phim.sotap,phim.Nam, 
                        phim.phim_id, phim.mieuta, nuoc.ten_nuoc, trangthai.ten_trangthai
                        FROM phim
                        INNER JOIN theloaiphim ON theloaiphim.phim_id = phim.phim_id
                        INNER JOIN theloai ON theloaiphim.theloai_id = theloai.theloai_id
                        INNER JOIN nuoc ON phim.nuoc_id = nuoc.nuoc_id
                        INNER JOIN trangthai ON phim.trangthai_id = trangthai.trangthai_id
                        WHERE phim.phim_id = '$phim' LIMIT 1;";
    
    $result_thongtinphim = $conn->query($sql_thongtinphim);
    
    if ($result_thongtinphim->num_rows > 0) {
        while ($row = $result_thongtinphim->fetch_assoc()) {
            $ten_phim = $row['ten_phim'];
            $anh = $row['anh'];
            echo '<div class="product-container">';
            echo '<div class="product-image">';
            echo '<img src="/images/' . $anh . '" alt="Ảnh sản phẩm">';
            echo '</div>';
            echo '<div class="product-info">';
            echo '<h3>' . $ten_phim . '</h3>';
            echo '<p>Trang Thái : <span >' . $row['ten_trangthai'] . '</span></p>';
            echo '<p>Số Tập :<span > ' . $row['sotap'] . '</span></p>';
            echo '<p>Năm: <span >' . $row['Nam'] . '</span></p>';
            echo '<p>Trạng thái: <span >' . $row['ten_trangthai'] . '</span></p>';
            echo '<p>Quốc gia: <span >' . $row['ten_nuoc'] . '</span></p>';
        $sql_theloai = "SELECT theloai.ten_theloai,theloai.theloai_id
                        FROM theloai
                        INNER JOIN theloaiphim ON theloaiphim.theloai_id = theloai.theloai_id
                        WHERE theloaiphim.phim_id = " . $row['phim_id'];
        $result_theloai = $conn->query($sql_theloai);
        if ($result_theloai->num_rows > 0) {
            echo '<p>Thể loại: ';
            while ($theloai_row = $result_theloai->fetch_assoc()) {
                echo '<a style="text-decoration: none;" href="?quanly=trangchu&query=sua&theloaiphim='.$theloai_row["theloai_id"].'"> <span >';
                echo $theloai_row['ten_theloai'] . ', ';
            }
            echo '</span></a></p>';
        }
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Không có thông tin phim.";
    }
?>

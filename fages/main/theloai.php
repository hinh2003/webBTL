<?php
    $theloaiphim = $_GET['theloaiphim'];
    $sql_theloai = "SELECT phim.ten_phim,phim.anh,phim.phim_id
                    FROM phim
                    INNER JOIN theloaiphim ON theloaiphim.phim_id = phim.phim_id
                    INNER JOIN theloai ON theloaiphim.theloai_id = theloai.theloai_id
                    WHERE theloai.theloai_id = '$theloaiphim';";
    $result_theloaiphim = $conn->query($sql_theloai);

?>

<div class="main-container-list">
    <div class="list">       
    <?php
        if ($result_theloaiphim->num_rows > 0) {
        while ($row = $result_theloaiphim->fetch_assoc()) {
            echo ' <div class="iteam">';
            echo '<a href="?quanly=trangchu&query=thongtin&id=' . $row["phim_id"] . '">';
            echo '<img src="/images/' . $row["anh"] . '" alt="Ảnh">';
            echo '<h4>' . $row["ten_phim"] . '</h4>';
            echo '</a>';
            echo '</div>';
        }  
        }
      ?>
  </div>
</div>
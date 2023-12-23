<?php
$sql_phim = "SELECT * FROM phim WHERE nuoc_id = 1";
$result = $conn->query($sql_phim);
?>
<div class="main-container-list">
    <div class="list">       
    <?php
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
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
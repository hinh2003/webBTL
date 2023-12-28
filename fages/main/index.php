<div class="main-container-title">   
        <div class="title">
            <h2 class="title-text">Anime mới cập nhập</h2>
        </div>
        <div class="tab">
        <a class="btn btn-secondary" href="#" type="button">Tất cả</a>
        <a class="btn btn-secondary" href="#" type="button">Mùa Này</a>
        <a class="btn btn-secondary" href="#" type="button">Mùa trước</a>
        <a class="btn btn-secondary" href="#" type="button">Bộ Hay</a>
        </div>
      </div>
<?php
$sql_phim = "SELECT * FROM phim WHERE nuoc_id = 1  LIMIT 10";
$result = $conn->query($sql_phim);
?>
<div class="main-container-list">
    <div class="list">       
    <?php
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo ' <div class="iteam">';
            echo '<a href="?quanly=trangchu&query=thongtin&id=' . $row["phim_id"] . '">';
            echo '<img  src="/images/' . $row["anh"] . '" alt="Ảnh">';
            echo '<h4>' . $row["ten_phim"] . '</h4>';
            echo '</a>';
            echo '</div>';
        }  
        }
      ?>
  </div>

</div>
<div class="xem-them"><a  href="index.php?quanly=animenhat&query=trangchu" title="PHim nguoi dong">Xem thêm...</a></div>
<div class="title-mid">
<div class="title">
        <h2 class="title-text">Phim Hoạt hình Trung Quốc</h2>
    </div> 
    </div> 
<?php
$sql_phim = "SELECT * FROM phim WHERE nuoc_id = 2  LIMIT 10";
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
<div class="xem-them"><a  href="index.php?quanly=phimtrung&query=trangchu" title="">Xem thêm...</a></div>
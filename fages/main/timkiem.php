<div class="main-container-list">
  <div class="list">
    <?php
    include("D:\PTUDW\BTA\adminphp\config\connet.php");
    if (isset($_POST['subtimkiem'])) {
      $timkiem = $_POST['searchInput'];
      $sql = "SELECT * FROM phim WHERE ten_phim LIKE '%$timkiem%'";
      $result_tim_kiem = $conn->query($sql);

      if ($result_tim_kiem->num_rows > 0) {
        if ($result_tim_kiem->num_rows == 1) {
          while ($row = $result_tim_kiem->fetch_assoc()) {
            echo '<div class="iteams ">';
            echo '<a href="?quanly=trangchu&query=thongtin&id=' . $row["phim_id"] . '">';
            echo '<img src="/images/' . $row["anh"] . '" alt="Ảnh">';
            echo '<h4>' . $row["ten_phim"] . '</h4>';
            echo '</a>';
            echo '</div>';
          }
        } else {
          while ($row = $result_tim_kiem->fetch_assoc()) {
            echo '<div class="iteam ">';
            echo '<a href="?quanly=trangchu&query=thongtin&id=' . $row["phim_id"] . '">';
            echo '<img src="/images/' . $row["anh"] . '" alt="Ảnh">';
            echo '<h4>' . $row["ten_phim"] . '</h4>';
            echo '</a>';
            echo '</div>';
          }
        }
      } else {
        echo 'Không tìm thấy kết quả.';
      }
    }
    ?>
  </div>
</div>

<?php
    include("config/connet.php");
$sql = "SELECT  ten_phim ,sotap ,anh,phim_id FROM phim";
$result= $conn->query($sql);
?>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
        <h2 style="color: white;" class="heading-section">Phim</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12 hegh">
        <div class="table-wrap">
            <table class="table">
                <thead class="thead-primary">
                <tr>     
                    <th>Tên Phim</th>
                    <th>Số Tập</th>
                    <th>Hình Ảnh</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["ten_phim"] . '</td>';
                        echo '<td>' . $row["sotap"] . '</td>';
                        echo '<td><img src="/images/' . $row["anh"] . '" alt="Ảnh" style="width: 150px; height: 150px;"></td>';
                        echo '<td><a href="modules/quanly/xuly.php?id=' . $row["phim_id"] . '">Xóa</a> | <a href="?action=thongke&query=sua&idsua=' . $row["phim_id"] . '">Sửa</a></td>';
                        echo '</tr>';
                    }  
                    }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</section>


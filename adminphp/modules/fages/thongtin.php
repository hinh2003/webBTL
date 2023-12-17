<?php
$sql = "SELECT  name,email,password,nguoidung_id ,ngaytao, quyen.ten_quyen FROM nguoidung
        INNER  JOIN quyen ON quyen.quyen_id = nguoidung.quyen_id ";
$result = $conn->query($sql);
?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 style="color: white;" class="heading-section">Thông tin người dùng</h2><br>
                <br>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <p id="thongbao" style="color: red;"></p>
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>Tên đăng Nhập</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Quyền Hạn</th>
                                <th>Ngày Tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row["name"] . '</td>';
                                    echo '<td>' . $row["email"] . '</td>';
                                    echo '<td>••••••••</td>';
                                    echo '<td>' . $row["ten_quyen"] . '</td>';
                                    echo '<td>' . $row["ngaytao"] . '</td>';
                                    echo '<td>
                                        <a class="delete-link" href="modules/quanly/xuly.php?idnguoidung=' . $row["nguoidung_id"] . '">Xóa</a>
                                        |
                                        <a href="?action=taikhoan&query=sua&idsuathongtin=' . $row["nguoidung_id"] . '">Sửa</a>
                                      </td>';
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
<script>
</script>
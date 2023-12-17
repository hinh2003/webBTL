<?php
include_once("xuly.php");
include("checkuse.php");
$idsua = $_GET['idsuathongtin'];
$sql = "SELECT nd.name, nd.email, nd.password, nd.nguoidung_id
        FROM nguoidung nd
        LEFT   JOIN quyen q ON nd.quyen_id = q.quyen_id
        WHERE nd.nguoidung_id = '$idsua ' LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<section class="ftco-section">
    <div class="container">
        <form id="formsuathongtin" action="modules/quanly/suathongtin&idsuathongtin=<?php echo $idsua ?>.php"
            method="GET" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 style="color: white;" class="heading-section">Sửa Phim</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tên đăng Nhập</td>
                                    <th><input readonly id="tendangnhap" type="text" name="tendangnhap"
                                            value="<?php echo $row["name"] ?>"></th>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <th><input id="email" type="text" name="email" value="<?php echo $row["email"] ?>">
                                    </th>
                                    <input id="idnguoidung" value="<?php echo $row["nguoidung_id"] ?>" type="hidden">
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <th><input id="passwordField" type="password" name="password"><br>
                                        <input type="checkbox" id="showPassword"> <label for="showPassword">Hiển thị mật
                                            khẩu</label>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Quyền hạn</td>
                                    <th>
                                        <select id="ten_quyen" name="ten_quyen">
                                            <?php
                                            $sql_quyen = "SELECT ten_quyen FROM `quyen`";
                                            $result_quyen = $conn->query($sql_quyen);

                                            // Check if the query returned any rows
                                            if ($result_quyen && $result_quyen->num_rows > 0) {
                                                while ($row_quyen = $result_quyen->fetch_assoc()) {
                                                    $quyen = $row_quyen["ten_quyen"];
                                                    echo "<option value='$quyen'>$quyen</option>";
                                                }
                                            } 
                                            ?>
                                        </select>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <p id="resultsua" style="color:red;"></p>
                        <input id="suanguoidung" type="submit" name="suanguoidung">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    document.querySelector("#formsuathongtin").addEventListener("submit", function (event) {
        event.preventDefault();
        const email = document.querySelector("#email").value;
        const idnguoidung = document.querySelector("#idnguoidung").value;
        const password = document.querySelector("#passwordField").value;
        const ten_quyen = document.querySelector("#ten_quyen").value;
        fetch(`modules/quanly/xylysuathongtin.php?email=${email}&idnguoidung=${idnguoidung}&password=${password}&ten_quyen=${ten_quyen}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#resultsua").innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

</script>
<?php
include_once("xuly.php");
include("checkuse.php");

$idsua = $_GET['idsua'];
$sql = "SELECT p.ten_phim, p.sotap, p.anh, p.mieuta, n.ten_nuoc, t.ten_trangthai 
            FROM phim p
            LEFT JOIN nuoc n ON p.nuoc_id = n.nuoc_id
            LEFT JOIN trangthai t ON p.trangthai_id = t.trangthai_id
            WHERE p.phim_id = '$idsua' LIMIT 1";
$result = $conn->query($sql);
?>
<section class="ftco-section">
    <div class="container">
        <form id="formsuaphim" method="POST" enctype="multipart/form-data">
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
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>Tên Phim</td>
                                        <th><input type="text" name="tenphim" value="<?php echo $row["ten_phim"] ?>"></th>
                                    </tr>
                                    <tr>
                                        <td>Số Tập</td>
                                        <th><input type="number" name="sotap" value="<?php echo $row["sotap"] ?>"></th>
                                        <th><input type="hidden" name="idsua" value="<?php echo $idsua ?>"></th>
                                    </tr>
                                    <tr>
                                        <td>Ảnh</td>
                                        <th>
                                            <?php echo '<img src="/images/' . $row["anh"] . '" alt="Ảnh" style="width: 150px; height: 150px;">'; ?><input
                                                type="file" id="img" name="img" value="<?php echo $row['anh']; ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Nước</td>
                                        <th>
                                            <?php
                                            echo comboBox($conn, "SELECT ten_nuoc FROM nuoc", "ten_nuoc");
                                            //echo comboBox($conn, "SELECT ten_nuoc FROM nuoc INNER JOIN phim ON nuoc.nuoc_id = phim.nuoc_id WHERE phim.phim_id = '$_GET[idsua]'", "ten_nuoc");
                                            ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái</td>
                                        <th>
                                            <?php
                                            echo comboBox($conn, "SELECT  ten_trangthai FROM trangthai", "ten_trangthai");
                                            //echo comboBox($conn, "SELECT ten_trangthai FROM trangthai INNER JOIN phim ON trangthai.trangthai_id = phim.trangthai_id WHERE phim.phim_id = '$_GET[idsua]'", "ten_trangthai");
                                            ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Miêu tả</td>
                                        <th><input type="text" name="mieuta" value="<?php echo $row["mieuta"] ?>"></th>
                                    </tr>
                                    <tr>
                                        <td>Thể Loại</td>
                                        <th>
                                            <?php
                                            echo comboBox($conn, "SELECT  ten_theloai FROM theloai", "ten_theloai");
                                            ?>
                                            <?php
                                }
                                ?>
                                        <?php
                                        $sql_theloaiphim1 = "SELECT theloai.ten_theloai 
                                                                FROM theloai 
                                                                INNER JOIN theloaiphim ON theloai.theloai_id = theloaiphim.theloai_id
                                                                INNER JOIN phim ON theloaiphim.phim_id = phim.phim_id
                                                                WHERE phim.phim_id = '$idsua'";
                                        $result_theloaiphim1 = $conn->query($sql_theloaiphim1);

                                        $combinedValues = '';

                                        while ($row_theloaiphim = $result_theloaiphim1->fetch_assoc()) {
                                            $ten_theloai = $row_theloaiphim["ten_theloai"];
                                            $combinedValues .= $ten_theloai . ', ';
                                        }
                                        $combinedValues = rtrim($combinedValues, ', ');
                                        ?>
                                        <input style="width: 300px;" value="<?php echo $combinedValues; ?>" type="text"
                                            name="txtBoxtheloai" id="txtBox">


                                    </th>
                                </tr>

                            </tbody>

                        </table>
                        <p id="resultsua" style="color:red;"></p>
                        <input type="submit" name="suaphim">
                    </div>
                </div>
            </div>
    </div>
    </form>
</section>
<script>

    document.querySelector('#ten_theloai').addEventListener('change', function () {
        var selectedOption = this.value;
        var textBox = document.querySelector('#txtBox');
        if (textBox.value.indexOf(selectedOption) === -1) {
            if (textBox.value !== '') {
                textBox.value += ', ';
            }
            textBox.value += selectedOption;
        }
    });
    document.addEventListener('DOMContentLoaded', function () {
        fetchapi();
    });
    function fetchapi() {
        const form = document.querySelector('#formsuaphim');

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(form);
            fetch('modules/quanly/xulysua.php?idsua=<?php echo $idsua ?>', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    }
                })
                .then(data => {
                    document.querySelector('#resultsua').textContent = data;
                })
                .catch(error => {
                    console.error( error);
                });
        });
    }

</script>
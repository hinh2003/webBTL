<?php
include_once("xuly.php");
include("checkuse.php");
?>
<section class="ftco-section">
    <div class="container">
        <form id="themphim" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 style="color: white;" class="heading-section">Phim</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tên Phim</td>
                                    <th><input type="text" name="tenphim" id="tenphim"></th>
                                </tr>
                                <tr>
                                    <td>Số Tập</td>
                                    <th><input type="number" name="sotap" id="sotap"></th>
                                </tr>
                                <tr>
                                    <td>Ảnh</td>
                                    <th><input type="file" id="img" name="img"></th>
                                </tr>
                                <tr>
                                    <td>Nước</td>
                                    <th>
                                        <?php
                                        echo comboBox($conn, "SELECT ten_nuoc FROM nuoc", "ten_nuoc");
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <th>
                                        <?php
                                        echo comboBox($conn, "SELECT  ten_trangthai FROM trangthai", "ten_trangthai");
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Miêu tả</td>
                                    <th><input type="text" id="mieuta" name="mieuta"></th>
                                </tr>
                                <tr>
                                    <td>Thể Loại</td>
                                    <th>
                                        <?php
                                        echo comboBox($conn, "SELECT  ten_theloai FROM theloai", "ten_theloai");
                                        $combinedValues='';
                                        ?>
                                        <input style="width: 300px;" value="<?php echo $combinedValues; ?>" type="text"
                                            name="txtBoxtheloai" id="txtBox">
                                    </th>

                                </tr>

                            </tbody>
                        </table>
                        <p style="color: red;" id="result1"></p>
                        <input type="submit" id="themphim" name="themphim">
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
        const form = document.querySelector('#themphim');

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(form);
            fetch('modules/quanly/xuly.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    }
                })
                .then(data => {
                    document.querySelector('#result1').textContent = data;
                    document.querySelector('#tenphim').value ='';
                    document.querySelector('#sotap').value ='';
                    document.querySelector('#mieuta').value ='';
                    document.querySelector('#img').value ='';
                    document.querySelector('#txtBox').value ='';
                })
                .catch(error => {
                    console.error( error);
                });
        });
    }
</script>
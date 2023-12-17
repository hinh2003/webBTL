<?php
include_once("xuly.php");
include("checkuse.php");
?>
<section class="ftco-section">
<div class="container">
    <form action="modules/quanly/xuly.php" method="POST" enctype="multipart/form-data">
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
                        <th><input type="file" id="img" name="img"  ></th>
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
                    </tbody>
                </table>
                <p style="color: red;" id="result1"></p>
                <input  type="submit" id="themphim" name="themphim" >
            </div>
        </div>
    </div>
</div>

</form>
</section>


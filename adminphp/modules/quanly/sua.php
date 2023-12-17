<?php
include_once("xuly.php");
include("checkuse.php");

$idsua = $_GET['idsua'];
$sql = "SELECT p.ten_phim, p.sotap, p.anh, p.mieuta, n.ten_nuoc, t.ten_trangthai 
        FROM phim p
        LEFT JOIN nuoc n ON p.nuoc_id = n.nuoc_id
        LEFT JOIN trangthai t ON p.trangthai_id = t.trangthai_id
        WHERE p.phim_id = '$idsua' LIMIT 1" ;
$result = $conn->query($sql);
?>
<section class="ftco-section">
<div class="container">
<form action="modules/quanly/xuly.php?idsua=<?php echo $idsua ?>" method="POST" enctype="multipart/form-data">
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
                        while($row = $result->fetch_assoc()){          
                        ?>
                    <tr>
                        <td>Tên Phim</td>
                        <th><input type="text" name="tenphim" value="<?php echo $row["ten_phim"] ?>"></th>
                    </tr>
                    <tr>
                        <td>Số Tập</td>
                        <th><input type="number" name="sotap" value="<?php echo $row["sotap"] ?>"></th>
                    </tr>
                    <tr>
                        <td>Ảnh</td>
                        <th><?php echo '<img src="/images/' . $row["anh"] . '" alt="Ảnh" style="width: 150px; height: 150px;">'; ?><input type="file" id="img" name="img" value="<?php echo $row['anh']; ?>"></th>
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
                    </tbody>
                    <?php
                    
                        }
                        ?>
                </table>
                <input  type="submit" name="suaphim">       
            </div>
        </div>
    </div>
</div>
</form>
</section>


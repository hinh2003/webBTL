<?php
include_once("xuly.php");
include("checkuse.php");
?>
<section class="ftco-section">
<div class="container">
    <form id="themtheloai" method="GET" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 style="color: white;" class="heading-section">Thêm Thể Loại</h2><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Tên Thể Loại </td>
                        <th><input type="text" name="tentheloai" id="tentheloai"></th><br>
                    </tr>
                    <tr>
                        <td>Miêu tả</td>
                        <th><input type="text" id="mieutatheloai" name="mieutatheloai"></th>
                    </tr>
                    </tbody>
                </table>
                <p style="color: red;" id="resultthemtheloai"></p>
                <input  type="submit" id="themtheloai" name="themtheloai" >
            </div>
        </div>
    </div>
</div>
</form>
</section>
<script>    
document.querySelector("#themtheloai").addEventListener("submit",function(){
    
    let check =validatesuathemtheloai();
    if(!validatesuathemtheloai()){
        event.preventDefault();
    }
    else{
        event.preventDefault();
        farcha();
    }

});
function farcha(){
    const ten = document.querySelector("#tentheloai").value;
    const mieuta = document.querySelector("#mieutatheloai").value;
    fetch(`modules/quanly/xuly.php?tentheloai=${ten}&mieutatheloai=${mieuta}`)
    .then(response => response.text())
            .then(data => {
                document.querySelector("#resultthemtheloai").innerHTML = data;
                document.querySelector("#tentheloai").value = "";
                document.querySelector("#mieutatheloai").value = "";
            })
            .catch(error => {
                console.error('Error:', error);
            });
}
function validatesuathemtheloai() {
    let isChecksua = true;
    if (document.querySelector('#tentheloai').value === "") {
        document.querySelector('#resultthemtheloai').innerHTML = "Nhập Tên thể loại";
        document.querySelector('#tentheloai').focus();
        return false;
    }
    else if (document.querySelector('#mieutatheloai').value === "") {
        document.querySelector('#resultthemtheloai').innerHTML = "Nhập mô tả";
        document.querySelector('#mieutatheloai').focus();
        return false;
    }
     
    return isChecksua;
}



</script>


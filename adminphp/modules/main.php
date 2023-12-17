
<?php
include("quanly/checkuse.php");
if(isset($_GET['action'])&& $_GET['query']){
    $tam = $_GET['action'];
    $query = $_GET['query'];
}
else{
    $tam = '';
    $query = '';
}
if($tam == 'thongke'&& $query=='them'){
    include("fages/table.php");
}
elseif($tam =='thongke'&&$query=='sua'){
    include("quanly/sua.php");
    
}

elseif($tam =='them'&& $query=='them'){
    include("quanly/them.php");
}
elseif($tam =='taikhoan'&& $query=='thongtin'){
    include("fages/thongtin.php");

}elseif($tam =='taikhoan'&& $query=='sua'){
    include("quanly/suathongtin.php");

}
elseif($tam =='them'&& $query=='themtheloai'){
    include("quanly/themtheloai.php");

}
else {
    include("fages/index.php");
}
?>  

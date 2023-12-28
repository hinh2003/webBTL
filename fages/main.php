<div class="menu-conten" >

    <?php
    if(isset($_GET['quanly'])){
        
        $tam = $_GET['quanly'];
        $query = $_GET['query'];
    }
    else{
        $tam = '';
    }

    if($tam == 'animenhat'&& $query=='trangchu'){
        include("main/anime.php");
    }
    elseif($tam =='phimtrung'&& $query=='trangchu'){
        include("main/phimtrung.php");
    }
    elseif($tam =='dangnhap'&& $query=='trangchu'){
        include("main/dangnhap.php");
    }
    elseif($tam =='dangki'&& $query=='trangchu'){
        include("main/dangky.php");
    }
    elseif($tam =='trangchu'&& $query=='sua'){
        include("main/theloai.php");
    }
    elseif($tam =='trangchu'&& $query=='thongtin'){
        include("main/phiminfo.php");
    } 

    elseif($tam =='trangchu'&& $query=='trangchu'){
        include("main/index.php");
    }
    elseif($tam =='trangchu'&& $query=='timkiem'){
        include("main/timkiem.php");     
    }
    else {
        include("main/index.php");
    }
    ?>  
    </div>
  </div> 
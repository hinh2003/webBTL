<div class="menu-conten" >

    <?php
    if(isset($_GET['quanly'])){
        
        $tam = $_GET['quanly'];
    }
    else{
        $tam = '';
    }
    if($tam == 'animenhat'){
        include("main/anime.php");
    }
    elseif($tam =='phimtrung'){
        include("main/phimtrung.php");
    }
    elseif($tam =='dangnhap'){
        include("main/dangnhap.php");
    }
    elseif($tam =='dangki'){
        include("main/dangky.php");
    }
    else {
        include("main/index.php");
    }
    ?>  
    </div>
  </div> 
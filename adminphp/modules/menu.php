<div class="heder">
    <nav class="navbar navbar-expand bg-dark menu-conten-boder" >
        <a class="navbar-brand" href="#"></a></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?action=thongke&query=them">Thống kê </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?action=them&query=them">Thêm phim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=them&query=themtheloai">Thêm thể loại</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=taikhoan&query=thongtin">Tài Khoản</a>
            </li>
       
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <?php
         if(!isset($_SESSION)){
          session_start();
          }
          if (isset($_SESSION['name'])) {
            echo '<a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/fages/moudles/xulydangxuat.php">Đăng Xuất</a>';
            echo '<a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="../index.php">' . $_SESSION['name'] . '</a>';
        }
        
          ?>
          </form>
        </div>
    </nav>
  </div>
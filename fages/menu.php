<?php
include("D:\PTUDW\BTA\adminphp\config\connet.php");
$sql_theloai = "SELECT ten_theloai,theloai_id FROM `theloai`";
$result_theloai = $conn->query($sql_theloai);
?>
<div class="heder">
  <nav class="navbar navbar-expand bg-dark menu-conten-boder">
    <a class="navbar-brand" href="#"></a></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php?quanly=trangchu&query=trangchu">
      <img src="images/Logo-main.png" alt="logo" width="130" height="30">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav maginn">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?quanly=trangchu&query=trangchu">Trang chủ </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
            Thể loại
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
            if ($result_theloai->num_rows > 0) {
              while ($row_theloai = $result_theloai->fetch_assoc()) {
                echo '<li><a class="dropdown-item text" href="?quanly=trangchu&query=sua&theloaiphim='.$row_theloai["theloai_id"].'">';
                echo  $row_theloai["ten_theloai"];
                echo '</a></li>';
              }
            }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?quanly=tangthai&query=trangchu">Trạng Thái</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?quanly=nam&query=trangchu">Năm</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 maginnf">
        <div>
          <input class="form-control mr-sm-2 search-edit " type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
        </div>
      </form>
      <div class="login">
        <?php
        if (!isset($_SESSION)) {
          session_start();
        }
        if (isset($_SESSION['name'])) {
          echo '<br><a class="btn btn-outline-success my-2 my-sm-0 size" href="./fages/moudles/xulydangxuat.php">Đăng xuất</a>';
          $link = "#";
          if ($_SESSION['ten_quyen'] == "Admin") {
            $link = "/adminphp/index.php";
          }
          echo '<a target="_blank" class="btn btn-outline-success my-2 my-sm-0 size" href=' . $link . '>' . $_SESSION["name"] . '</a>';
        } else {
          echo '<a class="btn btn-outline-success my-2 my-sm-0 size" type="submit" href="index.php?quanly=dangnhap&query=trangchu">Đăng Nhập</a>';
          echo '<a class="btn btn-outline-success my-2 my-sm-0 size" type="submit" href="index.php?quanly=dangki&query=trangchu">Đăng Ký</a>';
        }
        ?>

      </div>

    </div>
  </nav>
</div>
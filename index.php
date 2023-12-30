<?php
include("adminphp/config/connet.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['name'])){
$sql_get_role_name = "SELECT quyen.ten_quyen
    FROM nguoidung
    INNER JOIN quyen ON nguoidung.quyen_id = quyen.quyen_id
    WHERE name = '" . $_SESSION['name'] . "'";
$result_role_id = $conn->query($sql_get_role_name);
if ($result_role_id->num_rows > 0) {
    $row_role_id = $result_role_id->fetch_assoc();
    $role_name = $row_role_id['ten_quyen'];

    $_SESSION['ten_quyen'] = $role_name;
    if ($role_name == "Admin") {
        $_SESSION['is_admin'] = true;
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>ANIME HENTAI</title>
    <link rel="icon" href="images/Logo-main.ico">
    <script src="js/js.js"></script>
    <script src="js/firebase.js"></script>
</head>

<body>
    <?php
    include("adminphp/config/connet.php");
    include("./fages/menu.php");
    include("./fages/main.php");
    include("./fages/footer.php");
    ?>

</body>

</html>
<?php
include("config/connet.php");
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
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
    <link rel="icon" href="images/Logo-main.ico" >
    <script src="js/js.js"></script>
</head>
<body>
    <?php
    include("modules/quanly/checkuse.php");
    include("config/connet.php");
    include("modules/header.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
    ?>
</body>
</html>

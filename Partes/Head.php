<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./CSS/Variables/Variables.css">
<link rel="stylesheet" href="./CSS/Notifications.css">
<link rel="stylesheet" href="./CSS/Main.css">
<?php
    if (isset($_SESSION['User']) && isset($_GET['vista'])) {
        echo '<link rel="stylesheet" href="./CSS/Menu.css">';
        if($_GET['vista'] == 'Cuenta'){
            echo '<link rel="stylesheet" href="./CSS/Cuenta.css">';
        }
    }else{
        echo '<link rel="stylesheet" href="./CSS/Login.css">';
    }
?>
<title>Read Proyect</title>
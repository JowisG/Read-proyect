<?php
    require 'Logic/Session_start.php';
    include 'Logic/Conexion.php';
    include 'Logic/Login_func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'Partes/Head.php';
    ?>
</head>
<body>
    <?php
        if(!isset($_GET['vista']) || $_GET['vista'] == ""){
            $_GET['vista'] = "Login";
        }
        
        if (is_file('./Vistas/'.$_GET['vista'].'.php') && $_GET['vista'] != "Login" && $_GET['vista'] != "Error") {
           
            if ((!isset($_SESSION['ID']) || $_SESSION['ID'] == "") || 
                (!isset($_SESSION['User']) || $_SESSION['User'] == "")) {
                include './Vistas/Logout.php';
                exit();
            }

            include './Vistas/'.$_GET['vista'].'.php';

        } else if ($_GET['vista'] == "Login") {
            include './Vistas/Login.php';
        } else {
            echo "<link rel='stylesheet' href='./CSS/Error.css'>";
            include './Vistas/Error.php';
        }
    ?>
</body>
</html>
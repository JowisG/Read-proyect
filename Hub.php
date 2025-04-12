<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        if(!isset($_GET['vista']) || $_GET['vista'] == "" )
            $_GET['vista'] = "home";
        require_once 'Partes/head.php';
    ?>
</head>
<body>
    <?php

/* Iniciamos cargado de vistas */
        if(is_file('Vistas/'.$_GET['vista'].'.php') && $_GET['vista'] != "home"){
            include_once 'Partes/menu.php';
            include 'Vistas/'.$_GET['vista'].'.php';
            include_once 'Partes/footer.php';
        }else if ($_GET['vista'] == "home"){
            include_once 'Partes/menu.php';
            include 'Vistas/home.php';
            include_once 'Partes/footer.php';
        }else{
            require_once 'Vistas/error.php';
        }
    ?>
</body>
</html>
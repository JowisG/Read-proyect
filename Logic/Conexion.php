<?php
    function conexion(){
        // PDO('que host y que base de datos', 'nombre de usuario', 'contraseña del usuario')
        $conexion = new PDO('mysql:host=localhost;dbname=readproyect', 'root', '');
        return $conexion;
    };
?>
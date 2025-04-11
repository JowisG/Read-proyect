<?php
    $_GET['vista'] = "asd";
    if(!is_file('Vistas/'.$_GET['vista'].'.php')){
        echo '  <p>
                    Error 404
                    <br>
                    Página no encontrada
                </p>
                <a href="Hub.php">Home</a>';
    }
?>
<?php
    session_destroy();

    if(headers_sent()){
        echo "
        <script>
            window.location.href='Principal.php?vista=Login';
        </script>
        ";
    }else{
        header("Location: Principal.php?vista=Login");
    }
?>
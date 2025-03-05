<?php
    function error($message){
        echo '
        <noti class="noti error">
            <strong>Error!</strong>
            <p>'.$message.'</p>
        </noti>
        ';
    }

    function error_title($title, $message){
        echo '
        <noti class="noti error">
            <strong>'.$title.'!</strong>
            <p>'.$message.'</p>
        </noti>
        ';
    }

    function warning($message){
        echo '
        <noti class="noti warning">
            <strong>Warning!</strong>
            <p>'.$message.'</p>
        </noti>
        ';
    }

    function alert($message){
        echo '
        <noti class="noti warning">
            <strong>Alert!</strong>
            <p>'.$message.'</p>
        </noti>
        ';
    }
    function alert_title($title, $message){
        echo '
        <noti class="noti alert">
            <strong>¡'.$title.'!</strong>
            <p>'.$message.'</p>
        </noti>
        ';
    }

    function correct($title, $message){
        echo '
        <noti class="noti correct">
            <strong>'.$title.'!</strong>
            <p>'.$message.'</p>
        </noti>
        ';
    }
?>
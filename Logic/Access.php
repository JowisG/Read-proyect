<?php
    $user = trim_danger($_POST['user']);
    $password = trim_danger($_POST['password']);

    if($user == "" || $password == ""){
        echo '
        <div class="noti error">
            <strong>¡Error!</strong>
            <br>
            <p>Did not fill the necesary field</p>
        </div>
        ';
        exit();
    }

    if(pattern("[a-zA-Z0-9#$.]{1,10}", $user)){
        echo '
        <div class="noti warning">
            <strong>¡Warning!</strong>
            <br>
            <p>The field <strong>USER</strong> does not have the required format</p>
        </div>
        ';
        exit();
    }
    if(pattern("[a-zA-Z0-9$@.-]{7,50}", $password)){
        echo '
        <div class="noti warning">
            <strong>¡Warning!</strong>
            <br>
            <p>The field <strong>PASSWORD</strong> does not have the required format</p>
        </div>
        ';
        exit();
    }

    $check_access = conexion();
    $check_access = $check_access->query("SELECT ID, Name, Surname,User, Password
                                         FROM access Where User = '$user'");

    if($check_access->rowCount() == 1){
        $check_access = $check_access->fetch();
        if($check_access['User'] == $user && $check_access['Password'] == $password){
            
            $_SESSION['ID'] = $check_access['ID'];
            $_SESSION['Name'] = $check_access['Name'];
            $_SESSION['Surname'] = $check_access['Surname'];
            $_SESSION['User'] = $check_access['User'];

            if(headers_sent()){
                echo "
                <script>
                    window.location.href='Principal.php?vista=Home';
                </script>
                ";
            }else{
                header("Location: Principal.php?vista=Home");
            }

        }else{
            echo '
            <div class="noti error">
                <strong>Try again</strong>
                <br>
                <p><strong>USER</strong> or <strong>PASSWORD</strong> incorrect</p>
            </div>
            ';
        }
    }else{
        echo '
        <div class="noti error">
            <strong>Try again</strong>
            <br>
            <p><strong>USER</strong> or <strong>PASSWORD</strong> incorrect</p>
        </div>
        ';
    }
    $check_access = null;
?>
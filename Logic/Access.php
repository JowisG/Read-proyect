<?php
    include "./Logic/Messages.php";
    $user = trim_danger($_POST['user']);
    $password = trim_danger($_POST['password']);

    if($user == "" || $password == ""){
        error("Did not fill the necesary field");
        exit();
    }

    if(pattern("[a-zA-Z0-9#$.]{1,10}", $user)){
        warning("The field <strong>USER</strong> does not have the required format");
        exit();
    }
    if(pattern("[a-zA-Z0-9$@.-_]{7,50}", $password)){
        warning("The field <strong>PASSWORD</strong> does not have the required format");
        exit();
    }

    $check_access = conexion();
    $check_access = $check_access->query("SELECT ID, Admin, Name, Surname, User, Password
                                         FROM access Where User = '$user'");

    if($check_access->rowCount() == 1){
        $check_access = $check_access->fetch();
        if($check_access['User'] == $user && $check_access['Password'] == $password){
            
            $_SESSION['ID'] = $check_access['ID'];
            $_SESSION['Admin'] = $check_access['Admin'];
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

        }else if($check_access['User'] == $user){
            error_title("Try again", "<strong>PASSWORD</strong> incorrect");
        }else if($check_access['Password'] == $password){
            error_title("Try again", "<strong>USER</strong> incorrect");
        }
    }else{
        error_title("Try again", "<strong>USER</strong> or <strong>PASSWORD</strong> incorrect");
    }
    $check_access = null;
?>
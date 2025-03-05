<?php
    require_once "Session_start.php"; 
    require_once "./Logic/Login_func.php";
    require_once "./Logic/Messages.php";

    $id = $_SESSION['ID'];

    $check_user = conexion();
    $check_user = $check_user->query("SELECT Admin, Name, Surname, User, Password FROM access WHERE ID = '$id'");
    if($check_user->rowCount() == 1){
        $datos = $check_user->fetch();
    }else{
        error("You have been deleted from the database please contact the administrator");
        exit();
    }
    $check_user = null;

    $current_user = trim_danger($_POST['User_check']);
    $current_pass = trim_danger($_POST['Password_check']);

    if($current_user == "" || $current_pass == ""){
        error("Use your current user and password to make any chages to the user information");
        exit();
    }

    if(pattern("[a-zA-Z0-9#$.]{1,10}", $current_user)){ 
        warning("Please use the required formart for the <strong>CURRENT USER</strong>");
        exit();
    }

    if(pattern("[a-zA-Z0-9$@.-_]{7,50}", $current_pass)){
        warning("Please use the required formart for the <strong>CURRENT PASSWORD</strong>");
        exit();
    }

    $check_chage = conexion();
    $check_chage = $check_chage->query("SELECT User, Password FROM access
                                        WHERE user = '$current_user' AND ID = '$id'");
    if($check_chage->rowCount() == 1){
        $check_chage = $check_chage->fetch();
        if($current_user != $check_chage['User'] ||
           $current_pass != $check_chage['Password']){
            error_title("INCORRECT", "<strong>USER or PASSWORD</strong> incorrect");
            exit();
        }
    }else{
        error_title("INCORRECT", "<strong>USER or PASSWORD</strong> incorrect");
        exit();
    }

    $name = trim_danger($_POST['Name']);
    $surname = trim_danger($_POST['Surname']);
    $user = trim_danger($_POST['User']);
    $pass1 = trim_danger($_POST['Password']);
    $pass2 = trim_danger($_POST['Password2']);
    $admin = isset($_POST['check'])? 1 : 0;

    if($name == "" || $user == ""){
        error("Did not fill the necessary field(s)");
        exit();
    }

    if(pattern("[a-zA-Záéíóúñ]{1,100}", $name)){
        warning("The field <strong>NAME</strong> does not have the reqired format");
        exit();
    }
    if(pattern("[a-zA-Záéíóúñ]{0,100}", $surname)){
        warning("The field <strong>SURNAME</strong> does not have the reqired format");
        exit();
    }

    if(pattern("[a-zA-Z0-9#$._]{1,10}", $user)){
        warning("The field <strong>USER</strong> does not have the reqired format");
        exit();
    }

    if($user != $datos['User']){
        $check_user = conexion();
        $check_user = $check_user->query(
            "SELECT User FROM access WHERE User = '$user'"
        );
        if($check_user->rowCount() > 0){
            warning("The <strong>USER</strong> is in the database");
            exit();
        }
        $check_user = null;
    }
    
    if($pass1 != "" || $pass2 != ""){
        if(pattern("[a-zA-Z0-9$@.-_]{7,50}", $pass1)){
            warning("The field <strong>PASSWORD</strong> does not have the reqired format");
            exit();
        }
        if(pattern("[a-zA-Z0-9$@.-_]{7,50}", $pass2)){
            warning("The field <strong>REPEAT PASSWORD</strong> does not have the required format");
            exit();
        }

        if($pass1 != $pass2){
            warning("<strong>PASSWORD mismatch</strong> detected");
            exit();
        }

        $pass = $pass1;

    }else{
        $pass = $datos['Password'];
    }

    $update_user = conexion();
    $update_user = $update_user->prepare("
        UPDATE access SET Admin=:admin, Name=:name, Surname=:surname, User=:user, Password=:password
        WHERE ID=:id
    ");

    $execute = [
        ":admin" => $admin,
        ":name" => $name,
        ":surname" => $surname,
        ":user" => $user,
        ":password" => $pass,
        ":id" => $id
    ];



    if($update_user->execute($execute)){
        alert_title("UPDATE COMPLETED", "The user has been updated");
    }else{
        error_title("COULD NOT UPDATE", "Contact the administrator to solve the problem");
    }

    $update_user = null;
?>
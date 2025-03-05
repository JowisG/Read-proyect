<?php
    require_once "./Partes/Menu.php";
    require_once "./Logic/Conexion.php";

    $id = (isset($_GET['id'])) ? $_GET['id'] : 0;
    $id = trim_danger($id);
?>
<div class="cuenta">
    <h1>Cuenta</h1>
    <form class="form" action="" method="post">
        <?php
            $active = conexion();
            $active = $active->query("SELECT Admin, Name, Surname, User FROM access WHERE ID = '$id'");
    
            if($active->rowCount() > 0){
                $datos = $active->fetch();
        ?>
        <div class="info">
            <div class="field">
                <label for="Name">Name*:</label>
                <input type="text" name="Name" id="Name" value="<?php echo $datos['Name']; ?>"
                pattern="[a-zA-Záéíóúñ]{1,100}" maxlength="100" minlength="1" title="Letras de 1-100 carácteres" required>
            </div>
            <div class="field">
                <label for="Surname">Surname:</label>
                <input type="text" name="Surname" id="Surname" value="<?php echo $datos['Surname']; ?>"
                pattern="[a-zA-Záéíúóñ]{0,100}" maxlength="100" title="Letras de 0-100 carácteres">
            </div>
            <div class="field">
                <label for="User">User*:</label>
                <input type="text" name="User" id="User" value="<?php echo $datos['User']; ?>" pattern="[a-zA-Z0-9#$.]{1,10}"
                maxlength="10" minlength="1" required title="Letras, Números y Simbolos. Longitud: 1-10">
            </div>
        </div>
        <div class="password">
            <div class="field">
                <label for="Password">Password:</label>
                <input type="password" name="Password" id="Password" pattern="[a-zA-Z0-9$@.-_]{7,50}"
                maxlength="50" minlength="7" title="Letras, Números y Simbolos. Longitud: 7-50">
            </div>
            <div class="field">
                <label for="Password2">Repeat Password:</label>
                <input type="password" name="Password2" id="Password2" pattern="[a-zA-Z0-9$@.-_]{7,50}"
                maxlength="50" minlength="7" title="Letras, Números y Simbolos. Longitud: 7-50">
            </div>
            <div class="message">
                <label for="check" title="Only for admins to chage">
                    <input type="checkbox" name="check" id="check" <?php
                        if ($datos['Admin'] == true){
                            echo "checked";
                        }else{
                            echo "disabled";
                        }
                    ?>>
                    <p>You are an <?php
                        if ($datos['Admin'] == true){
                            echo "admin";
                        }else{
                            echo "user";
                        }
                    ?></p>
                </label>
            </div>
        </div>
        <div class="secure">
            <div class="field">
                <label for="User_check">Current User*:</label>
                <input type="text" name="User_check" id="User_check" pattern="[a-zA-Z0-9#$.]{1,10}"
                maxlength="10" minlength="1" required title="Letras, Números y Simbolos. Longitud: 1-10">
            </div>
            <div class="field">
                <label for="Password_check">Current Password*:</label>
                <input type="password" name="Password_check" id="Password_check" pattern="[a-zA-Z0-9$@.-_]{7,50}"
                maxlength="50" minlength="7" required title="Letras, Números y Simbolos. Longitud: 7-50">
            </div>
        </div>
        <button type="submit">Save</button>
        <?php
            }else{
                include "./Logic/Messages.php";
                error("Unable to ge user refresh or go back to home page");
            }
        ?>
    </form>
    <?php
        if(isset($_POST['Name']) && isset($_POST['User']) &&
           isset($_POST['Password']) && isset($_POST['Password2'])){
            require_once "./Logic/User_update.php";
        }
    ?>
</div>
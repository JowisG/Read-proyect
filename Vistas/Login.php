<div class="Login">
    <form class="form" action="" method="post" autocomplete="off">
        <h3>Proyect Read</h3>
        <div>
            <label class="esp" for="user">User:</label>
            <input type="text" name="user" id="user" pattern="[a-zA-Z0-9#$.]{1,10}"
            maxlength="10" minlength="1" required title="Letras, Números y Simbolos. Longitud: 1-10">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" pattern="[a-zA-Z0-9$@.-_]{7,50}"
            maxlength="50" minlength="7" required title="Letras, Números y Simbolos. Longitud: 7-50">
        </div>
        <p class="summit">
            <button type="submit">Access</button>
        </p>

        <?php
            if(isset($_POST['user']) && isset($_POST['password'])){
                require_once "./Logic/Login_func.php";
                require_once "./Logic/Access.php";
            }
        ?>

    </form>
</div>
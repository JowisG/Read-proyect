<div class="menu">
    <ul class="menu-list">
        <li>
            <a href="Principal.php?vista=Home">Home</a>
        </li>
        <li>
            <a href="">Manwha</a>
            <ul class="submenu">
                <li><a href="">Recommendations</a></li>
                <li><a href="">Best of the day</a></li>
            </ul>
        </li>
        <li>
            <a href="">Manga</a>
            <ul class="submenu">
                <li><a href="">Recommendations</a></li>
                <li><a href="">Best of the day</a></li>
            </ul>
        </li>
        <li>
            <a href="">App</a>
            <ul class="submenu">
                <li><a href="">Made with</a></li>
                <li><a href="">About</a></li>
            </ul>
        </li>
    </ul>
    <div class="btn-group">
        <a class="btn log" href="Principal.php?vista=Cuenta&id=<?php echo $_SESSION['ID']; ?>">Cuenta</a>
        <a class="btn out" href="Principal.php?vista=Logout">Salir</a>
    </div>
</div>
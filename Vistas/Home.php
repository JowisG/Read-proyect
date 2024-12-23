<?php
    require_once "./Partes/Menu.php";
?>
<div>
    <h1>Welcome, <?php echo $_SESSION['Name']." ".$_SESSION['Surname']; ?>, to Read Proyect</h1>
    <p>Your user is: <?php echo $_SESSION['User']; ?></p>
    <p>A place were I comment the manwhas and mangas that I have read and a app that I want to make</p>
    <h2>What I read</h2>
    <h3>Manwhas</h3>
    <h3>Mangas</h3>
    <h2>App</h2>
</div>
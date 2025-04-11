<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ramabhadra&display=swap" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!---------------------- CSS files ---------------------->

<!-- Simpre cargadas -->
<link rel="stylesheet" href="../CSS/Hub_general.css" class="css">
<link rel="stylesheet" href="../CSS/Colors/var_general.css" class="css">
<link rel="stylesheet" href="../CSS/Menu.css" class="css">
<link rel="stylesheet" href="../CSS/Footer.css" class="css">
<link rel="stylesheet" href="../CSS/Aside.css" class="css">
<!-- Por Vista -->
<?php 
    $css_file = "Error";
    if(isset($_GET['vista']) && $_GET['vista'] != "" && is_file('./CSS/Vistas/'.$_GET['vista'].'.css')){
        $css_file = $_GET['vista'];
    }
?>
<link rel="stylesheet" href="../CSS/Vistas/<?php echo $css_file; ?>.css">

<title>Read Proyect</title>
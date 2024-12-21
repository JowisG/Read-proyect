<?php
    function trim_danger($string){
        $string = stripslashes($string);
        // Resto de cosas
        $string=str_ireplace("<script>", "", $string);
		$string=str_ireplace("</script>", "", $string);
		$string=str_ireplace("<script src", "", $string);
		$string=str_ireplace("<script type=", "", $string);
		$string=str_ireplace("SELECT * FROM", "", $string);
		$string=str_ireplace("DELETE FROM", "", $string);
		$string=str_ireplace("INSERT INTO", "", $string);
		$string=str_ireplace("DROP TABLE", "", $string);
		$string=str_ireplace("DROP DATABASE", "", $string);
		$string=str_ireplace("TRUNCATE TABLE", "", $string);
		$string=str_ireplace("SHOW TABLES;", "", $string);
		$string=str_ireplace("SHOW DATABASES;", "", $string);
		$string=str_ireplace("<?php", "", $string);
		$string=str_ireplace("?>", "", $string);
		$string=str_ireplace("--", "", $string);
		$string=str_ireplace("^", "", $string);
		$string=str_ireplace("<", "", $string);
		$string=str_ireplace("[", "", $string);
		$string=str_ireplace("]", "", $string);
		$string=str_ireplace("==", "", $string);
		$string=str_ireplace(";", "", $string);
		$string=str_ireplace("::", "", $string);
        return $string;
    };

    function pattern($filtro, $cadena){
        if(preg_match("/^".$filtro."$/", $cadena)){
            return false;
        }else{
            return true;
        }
    }
?>
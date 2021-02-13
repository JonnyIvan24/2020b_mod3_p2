<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "almacenes";

$conexion = mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($conexion,'utf8');
/*if($conexion){
    echo "Sí me pude conectar";
}else{
    echo "No me pude conectar: ".mysqli_error($conexion);
}*/

?>
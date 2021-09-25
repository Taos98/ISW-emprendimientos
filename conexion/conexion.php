<?php 
$conexion = mysqli_connect("mysql.face.ubiobio.cl", "g1ieci2021", "g5ieci2021", "g1bd2021");

if ($conexion->connect_error){
    die("CONEXION FALLIDA: " . $conn->connect_error);   
}
mysqli_set_charset($conexion, "utf8");
?>

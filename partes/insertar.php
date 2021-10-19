<?php
include '../conexion/conexion.php';

if(isset($_POST['insert_publicacion']))
{
    $titulo = $_POST["titulo"];  
    $info_post =$_POST["info_post"];  
    $precio_post =$_POST["precio_post"];  
    $contacto = $_POST["contacto"];

    $query = " INSERT INTO publicacion(titulo, info_post, precio_post, contacto, disponibilidad)  
    VALUES('$titulo', '$info_post', $precio_post, '$contacto', 'true')";

    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Fallo en la consulta");

    }else{
        echo "registro correcto";
    }
}

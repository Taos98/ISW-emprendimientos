<?php
$conexion = mysqli_connect("localhost", "root", "", "bd_emprendimiento_e1");
if(!empty($_POST))
{
    echo"Pasa acá1";
    $output = '';
    $titulo = mysqli_real_escape_string($conexion, $_POST["titulo"]);  
    $info_post = mysqli_real_escape_string($conexion, $_POST["info_post"]);  
    $precio_post = mysqli_real_escape_string($conexion, $_POST["precio_post"]);  
    //$disponibilidad = mysqli_real_escape_string($conexion, $_POST["disponibilidad"]);  
    $contacto = mysqli_real_escape_string($conexion, $_POST["contacto"]);

    //Modificar ↓↓↓
    //$id_imagen = mysqli_prepare($conexion, $_POST["id_imagen"]);
    $query = " INSERT INTO publicacion (titulo, info_post, precio_post, contacto, id_imagen)  
     VALUES('$titulo', '$info_post', $precio_post, '$contacto', LOAD_FILE('$id_imagen'))";
     echo"Pasa acá2";
    if(mysqli_query($conexion, $query))
    {
     $output.= '<label class="text-success">Registro Insertado Correctamente</label>';
     echo"Pasa acá3";
    }
    echo $output;
}
?>
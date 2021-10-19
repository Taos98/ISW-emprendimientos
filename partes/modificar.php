<?php
include('../conexion/conexion.php');

# definimos la carpeta destino
$carpetaDestino = "../assets/imagenes/";

# si hay algun archivo que subir
if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"]) {
    # si es un formato de imagen
    if ($_FILES["archivo"]["type"] == "image/jpeg" || $_FILES["archivo"]["type"] == "image/pjpeg" || $_FILES["archivo"]["type"] == "image/png") {
        # si exsite la carpeta o se ha creado
        if (file_exists($carpetaDestino)) {
            $origen = $_FILES["archivo"]["tmp_name"];
            $destino = $carpetaDestino . $_FILES["archivo"]["name"];
            # movemos el archivo
            if (move_uploaded_file($origen, $destino)) {
                echo "<br>" . $_FILES["archivo"]["name"] . " movido correctamente";
            } else {
                echo "<br>No se ha podido mover el archivo: " . $_FILES["archivo"]["name"];
            }
        } else {
            echo "<br>No se ha encontrado la carpeta de destino:  " . $carpetaDestino;
        }
    } else {
        echo "<br>" . $_FILES["archivo"]["name"] . " - NO es imagen jpg, png";
    }
} else {
    echo "<br>No se ha subido ninguna imagen";
}

if(!empty($_POST))
{
    $output = '';
    $id_post = mysqli_real_escape_string($conexion, $_POST["id_post"]); 
    $titulo = mysqli_real_escape_string($conexion, $_POST["titulo"]);  
    $info_post = mysqli_real_escape_string($conexion, $_POST["info_post"]);  
    $precio_post = mysqli_real_escape_string($conexion, $_POST["precio_post"]);  
    //$disponibilidad = mysqli_real_escape_string($conexion, $_POST["disponibilidad"]);  
    $contacto = mysqli_real_escape_string($conexion, $_POST["contacto"]);
    //$id_imagen = mysqli_real_escape_string($conexion, $_POST["id_imagen"]);
    $query = " UPDATE publicacion SET titulo = '$_POST[titulo]', info_post = '$_POST[info_post]', precio_post = '$_POST[precio_post]', contacto = '$_POST[contacto]', id_imagen = '$destino' WHERE id_post = '$_POST[id_post]'";
    if(mysqli_query($conexion, $query))
    {
     $output.= '<label class="text-success">Registro Insertado Correctamente</label>';
     header('Location: ../inicio/index.php');
    }
    echo $output;
}
?>
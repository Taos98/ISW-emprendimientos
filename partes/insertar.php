<?php
include('../conexion/conexion.php');
session_start();
# definimos la carpeta destino
$carpetaDestino = "../assets/imagenes/";
date_default_timezone_set('America/Santiago');

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

if (!empty($_POST)) {
    $output = '';
    $id_usuario = $_SESSION['id_usuario'];
    $titulo = mysqli_real_escape_string($conexion, $_POST["titulo"]);
    $info_post = mysqli_real_escape_string($conexion, $_POST["info_post"]);
    $fecha_hora = date('Y-m-d h:i:s a', time());
    $estado_post =  mysqli_real_escape_string($conexion, $_POST["estado"]);
    $precio_post = mysqli_real_escape_string($conexion, $_POST["precio_post"]);
    $disponibilidad = mysqli_real_escape_string($conexion, $_POST["disponibilidad"]);

    $queryPublicacion = " INSERT INTO publicacion (id_user, titulo_post, Info_post, Fecha_post, Precio_post, Estado_post, Disponibilidad_post)  
     VALUES('$id_usuario','$titulo','$info_post','$fecha_hora','$precio_post','$estado_post', '$disponibilidad')";

    $consulta_id_post = "SELECT * FROM publicacion ORDER by ID DESC LIMIT 1"; // con esta query se saca la ultima publicacion para obtener id_post
    $resultado_id_post = mysqli_query($conexion, $consulta_id_post);
    $id_pub_res =  mysqli_fetch_array($resultado_id_post);

    $queryImagen = "INSERT INTO imagenes (Id_user, Id_post, Ruta_imagen) VALUES('$id_usuario', '$id_pub_res', '$destino')";
    if (mysqli_query($conexion, $queryPublicacion) && mysqli_query($conexion, $queryImagen)) {
        $output .= '<label class="text-success">Registro Insertado Correctamente</label>';
        header('Location: ../inicio/index.php');
    }
    echo $output;
}

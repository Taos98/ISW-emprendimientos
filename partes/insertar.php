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
    header('Location: ../inicio/index.php');
}

if (!empty($_POST)) {
    $output = '';
    $id_usuario = $_SESSION['id_usuario'];
    $titulo = mysqli_real_escape_string($conexion, $_POST["titulo"]);
    $info_post = mysqli_real_escape_string($conexion, $_POST["info_post"]);
    $fecha_hora = date('d-m-y', time());
    $estado_post =  mysqli_real_escape_string($conexion, $_POST["estado"]);
    $precio_post = mysqli_real_escape_string($conexion, $_POST["precio_post"]);
    $disponibilidad = mysqli_real_escape_string($conexion, $_POST["disponibilidad"]);

    // if para entregar la disponibilidad del post
    if ($disponibilidad == 1) { 
        $disponibilidad = 'Disponible';
    }else {
        $disponibilidad = 'No disponible';
    }

    // if para entregar el estado del post
    if ($estado_post == 1) { 
        $estado_post = 'Nuevo';
    }else if ($estado_post == 2) {
        $estado_post = 'Usado';
    } else {
        $estado_post = 'Viejo';
    }

    // if's para las categorias

    if(isset($_REQUEST['Alimentos']) ){
        if (empty($Categoria)){
            $Categoria = 'Alimentos';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Alimentos';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Alimentos';
        }  
    }
    if(isset($_REQUEST['Servicios']) ){
        if (empty($Categoria)){
            $Categoria = 'Servicios';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Servicios';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Servicios';
        }
    } 
    if(isset($_REQUEST['Limpieza']) ){
        if (empty($Categoria)){
            $Categoria = 'Limpieza';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Limpieza';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Limpieza';
        }
    }
    if(isset($_REQUEST['Mecanica']) ){
        if (empty($Categoria)){
            $Categoria = 'Mecanica';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Mecanica';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Mecanica';
        }
    }
    if(isset($_REQUEST['Educacion'])){
        if (empty($Categoria)){
            $Categoria = 'Educacion';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Educacion';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Educacion';
        }
    }
    if(isset($_REQUEST['Transporte'])){
        if (empty($Categoria)){
            $Categoria = 'Transporte';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Transporte';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Transporte';
        }
    }
    if(isset($_REQUEST['Transporte Escolar'])){
        if (empty($Categoria)){
            $Categoria = 'Transporte Escolar';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Transporte Escolar';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Transporte Escolar';
        }
    }
    if(isset($_REQUEST['Utiles'])){
        if (empty($Categoria)){
            $Categoria = 'Utiles';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Utiles';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Utiles';
        }
    }
    if(isset($_REQUEST['Utiles de Cocina'])){
        if (empty($Categoria)){
            $Categoria = 'Utiles de Cocina';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Utiles de Cocina';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Utiles de Cocina';
        }
    }
    if(isset($_REQUEST['Utiles del Hogar'])){
        if (empty($Categoria)){
            $Categoria = 'Utiles del Hogar';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Utiles del Hogar';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Utiles del Hogar';
        }
    }
    if(isset($_REQUEST['Utiles Escolares'])){
        if (empty($Categoria)){
            $Categoria = 'Utiles Escolares';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Utiles Escolares';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Utiles Escolares';
        }
    }
    if(isset($_REQUEST['Utiles de Libreria'])){
        if (empty($Categoria)){
            $Categoria = 'Utiles de Libreria';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Utiles de Libreria';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Utiles de Libreria';
        }
    }
    if(isset($_REQUEST['Casero'])){
        if (empty($Categoria)){
            $Categoria = 'Casero';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Casero';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Casero';
        }
    }
    if(isset($_REQUEST['Manualidades'])){
        if (empty($Categoria)){
            $Categoria = 'Manualidades';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Manualidades';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Manualidades';
        }
    }
    if(isset($_REQUEST['Libros'])){
        if (empty($Categoria)){
            $Categoria = 'Libros';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Libros';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Libros';
        }
    }
    if(isset($_REQUEST['Vestimenta'])){
        if (empty($Categoria)){
            $Categoria = 'Vestimenta';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Vestimenta';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Vestimenta';
        }
    }
    if(isset($_REQUEST['Menaje'])){
        if (empty($Categoria)){
            $Categoria = 'Menaje';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Menaje';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Menaje';
        }
    }
    if(isset($_REQUEST['Joyeria'])){
        if (empty($Categoria)){
            $Categoria = 'Joyeria';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Joyeria';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Joyeria';
        }
    }
    if(isset($_REQUEST['Usado'])){
        if (empty($Categoria)){
            $Categoria = 'Usado';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Usado';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Usado';
        }
    }
    if(isset($_REQUEST['Pintura'])){
        if (empty($Categoria)){
            $Categoria = 'Pintura';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Pintura';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Pintura';
        }
    }
    if(isset($_REQUEST['Artesania'])){
        if (empty($Categoria)){
            $Categoria = 'Artesania';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Artesania';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Artesania';
        }
    }
    if(isset($_REQUEST['Hecho a Mano'])){
        if (empty($Categoria)){
            $Categoria = 'Hecho a Mano';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Hecho a Mano';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Hecho a Mano';
        }
    }
    if(isset($_REQUEST['Otros'])){
        if (empty($Categoria)){
            $Categoria = 'Otros';
        }else if(empty($Categoria2)){
            $Categoria2 = 'Otros';
        }else if(empty($Categoria3)){
            $Categoria3 = 'Otros';
        }
    }

    $queryPublicacion = " INSERT INTO publicacion (id_user, titulo_post, Info_post, Fecha_post, Precio_post, Estado_post, Disponibilidad_post, categoria, categoria2, categoria3)  
     VALUES('$id_usuario','$titulo','$info_post','$fecha_hora','$precio_post','$estado_post','$disponibilidad','$Categoria1','$Categoria2','$Categoria3')";

    $consulta_id_post = "SELECT * FROM publicacion ORDER by Id_post DESC LIMIT 1"; // con esta query se saca la ultima publicacion para obtener id_post
    $resultado_id_post = mysqli_query($conexion, $consulta_id_post);
    $id_pub_res =  mysqli_fetch_array($resultado_id_post);

    $id_post_selec = $id_pub_res['Id_post'];
    $id_post_selec = $id_post_selec + 1;
    $queryImagen = "INSERT INTO imagenes (Id_user, Id_post, Ruta_imagen) VALUES('$id_usuario', '$id_post_selec', '$destino')";
    
    if (mysqli_query($conexion, $queryPublicacion) && mysqli_query($conexion, $queryImagen)) {
        $output .= '<label class="text-success">Registro Insertado Correctamente</label>';
        header('Location: ../inicio/index.php');
    }
    echo $output;
}

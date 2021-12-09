<?php
include("../conexion/conexion.php");
session_start();
date_default_timezone_set('America/Santiago');

$id_usuario = $_SESSION['id_usuario'];
$id_post = $_SESSION["id_post_com"];
$fecha_hora = date('Y-m-d h:i:s a', time());
$cantLikes = 0;

if (!empty($_POST)) {
    $output = '';
    $comentario = $_POST["UserComment"];
    $query = " INSERT INTO comentarios (Id_post, Id_user, Fecha_comentario, Info_comentario, Cantidad_likes)  
     VALUES('$id_post','$id_usuario','$fecha_hora',$comentario, $cantLikes)";
    if (mysqli_query($conexion, $query)) {
        $_SESSION["Flag_succes_coment"] = true;
        $_SESSION["Id_post_aft"] = $id_post;
        header('Location: ../publicacion.php');
    }else {
        
        header('Location: ../partes/publicacion.php');
    }
    echo $output;
}
?>
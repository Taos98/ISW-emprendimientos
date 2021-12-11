<?php
include("../conexion/conexion.php");
session_start();
date_default_timezone_set('America/Santiago');

$id_usuario = $_SESSION['id_usuario'];
$id_post = $_POST['IdPost'];
$fecha_hora = date('Y-m-d h:i:s a', time());
$cantLikes = 0;
$comentario = $_POST['UserComment'];

echo "esto es una prueba: ".$id_post." ".$id_usuario." ".$fecha_hora." ".$comentario;

$output = '';
$query = " INSERT INTO comentarios (Id_post, Id_user, Fecha_comentario, Info_comentario, Cantidad_likes) VALUES('$id_post','$id_usuario','$fecha_hora',$comentario, $cantLikes)";
if (mysqli_query($conexion, $query)) {
    $_SESSION['Flag_succes_coment'] = 1; //1 para si / 0 para no
    $_SESSION['Id_post_aft'] = $id_post;
    header('Location: ../partes/publicacion.php');
} else {
    $_SESSION['Flag_succes_coment'] = 0;
    $_SESSION['id_post_fail_com'] = $id_post;
    header('Location: ../partes/publicacion.php');
}
echo $output;

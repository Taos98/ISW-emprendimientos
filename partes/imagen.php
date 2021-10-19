<?php
# definimos la carpeta destino
$carpetaDestino = "../assets/imagenes";

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
?>
<!--
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="archivo[]" multiple="multiple">
        <input type="submit" value="Enviar">
    </form>
-->
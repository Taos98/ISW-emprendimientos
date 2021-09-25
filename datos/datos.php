
<?php

function cargarFrutas(){
        require('C:\xampp\htdocs\isw\conexion\conexion.php');
        
        $consulta="SELECT id, nombre, precio, estado, estacion FROM frutas";
        $resultado= mysqli_query($mysqli,$consulta);
        // echo $resultado;
        mysqli_close($mysqli);  
        return $resultado;
}   
?>
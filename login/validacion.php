<?php
    include("../conexion/conexion.php");
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $_SESSION['email'] = $email;
    session_start();

    //query a la BD
    $consulta="SELECT*FROM usuario WHERE email_user='$email' AND Password_user='$pass'";
    $resultado=mysqli_query($conexion,$consulta);
    $_SESSION['email'] = $resultado['email_user'];
    if ($resultado->num_rows>0) {
        $data = mysqli_fetch_array($resultado);
        $_SESSION['nombre'] = $data['Nombre_user'];
        
        header("location:../inicio/index.php");
    }else{
        ?>
        <?php
        include('login.html')?>
        <h1 class="bad">DATOS ERRONEOS</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
<!-- Navbar -->
<?php session_start(); ?>
<?php $email = $_SESSION['email']; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline position-relative d-inline-block my-2">
                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
            </form>
            <?php $query = " SELECT * FROM usuario WHERE email_user = '$email'"?>
            <?php $resultadoQuery = mysqli_query($conexion, $query)?>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right">
                        <?php if($mostrarFoto = mysqli_fetch_array($resultadoQuery)) { ?>
                        <img src="<?php echo $mostrarFoto['imagen_user'];?>" class="img-fluid rounded-circle avatar mr-2" alt="imagen" />
                        <?php echo $_SESSION['nombre']; ?>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../perfil/perfil.php"><i class="fas fa-user"></i> Mi perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login/login.html"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Fin Navbar -->
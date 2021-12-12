<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->

<!-- conexion -->
<?php include('../conexion/conexion.php') ?>
<!-- fin conexion -->

<body>
    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        <?php include('../partes/sidebar.php') ?>
        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            <?php include('../partes/nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <?php
            if ($_SESSION['Flag_succes_coment'] == 1) { //1 para si / 0 para no
                $id_post =  $_SESSION['Id_post_aft'];
            } else {
                $id_post = $_POST['id_post_selec'];
                $_SESSION['Id_post_aft'] = $_SESSION['id_post_com'];
            }
            $consulta = "SELECT*FROM vista_publicacion where id_post_vp = $id_post ";
            $resultado = mysqli_query($conexion, $consulta);
            $mostrar = mysqli_fetch_array($resultado);
            ?>
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-8" style="position: relative;"><?php echo $mostrar['titulo_vp'] ?></h1>
                                <p class="lead" style="color: Green;"><?php echo "Precio: $" . $mostrar['precio_vp'] ?></p>
                                <p class="lead text-primary"> <?php echo  "Fecha: " . $mostrar['fecha_vp'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Carrusel imagenes -->
                <?php
                $consultaImg = "SELECT*FROM vista_publicacion where id_post_vp = $id_post";
                $resultadoImg = mysqli_query($conexion, $consultaImg);
                ?>
                <section class="bg-mix py-3">
                    <div class="container">
                        <div id="carouselIMGs" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php //while ($mostrar = mysqli_fetch_array($resultado)) { 
                                ?>
                                <div class="carousel-item active">
                                    <img src="<?php print $mostrar['ruta_imagen_vp'] ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php print $mostrar['ruta_imagen_vp'] ?>" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselIMGs" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIMGs" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- Seccion Descripcion producto-->
                <section>
                    <div class="container-fluid">
                        <p class="lead"><?php echo "Estado del producto: " . $mostrar['estado_vp'] ?></p>
                        <div>
                            <p class="lead text-info">Descripción publicacion: </p>
                            <p class="text-muted"><?php echo $mostrar['info_vp'] ?></p>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div>
                            <p class="lead text-info">Contacto: </p>
                            <p class="text-warning"><?php echo $mostrar['contacto_vp'] ?></p>
                        </div>
                    </div>
                </section>
                <!-- Seccion Comentarios-->
                <section>
                    <div class="card-body">
                        <h5 class="lead">Comentarios</h5>
                        <br>
                        <div class="container-fluid">
                            <form action="../partes/comentar.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group input-group-lg mb-6">
                                    <input type="text" class="form-control" id="UserComment" name="UserComment" placeholder="Comentar..." aria-label="comentario" aria-describedby="button-addon2">
                                    <input type="hidden" id="IdPost" name="IdPost" value="<?php echo $id_post ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-info" type="submit" id="button-addon2">Comentar</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div class="container-fluid">
                                <?php
                                $consultaComentario = "SELECT * FROM vista_comentario WHERE id_post_vc = $id_post ";
                                $resultadoComentario = mysqli_query($conexion, $consultaComentario);
                                $flag_mostrarComentario = false;
                                while ($mostrarComentario = mysqli_fetch_array($resultadoComentario)) {
                                    $flag_mostrarComentario = true ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="DataBox" value="<?php echo $mostrarComentario['nombre_user_vc'] . " " . $mostrarComentario['apellido_user_vc'] ?>" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="CommentBox" value="<?php echo $mostrarComentario['info_com_vc'] ?>" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="DateBox" value="<?php echo $mostrarComentario['fecha_com_vc'] ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                <?php
                                }
                                if ($flag_mostrarComentario == false) { ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="DataBox" value="------" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="CommentBox" value="No existen comentarios" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="DateBox" value="------" disabled>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>

                </section>

                <footer>

                </footer>
            </div>
        </div>
    </div>


    <!--Inicio sector scripts -->
    <link rel="stylesheet" href="../assets/css/coment-style.css">

</body>
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
            $consulta = "SELECT*FROM publicacion"; //query de prueba
            $resultado = mysqli_query($conexion, $consulta);
            $mostrar = mysqli_fetch_array($resultado);
            $id_post = $mostrar['Id_post'];
            //// ubicar bien esta wea
            ?>
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-8" style="position: relative;"><?php echo $mostrar['titulo_post'] ?></h1>
                                <p class="lead" style="color: Green;"><?php echo "Precio: " . $mostrar['Precio_post'] ?></p>
                                <p class="lead text-primary"> <?php echo  "Fecha: " . $mostrar['Fecha_post'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Carrusel imagenes -->
                <!-- HACER CONSULTAS PERTINENTES PARA LAS FOTOS -->

                <?php
                $queryImagen = "SELECT*FROM imagenes WHERE Id_post = 1"; //query de prueba
                $resultadoImagen = mysqli_query($conexion, $queryImagen);
                $mostrarImagen = mysqli_fetch_array($resultado);

                ?>
                <section class="bg-mix py-3">
                    <div class="container">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php print $mostrarImagen['Ruta_imagen']; ?>" class="d-block w-100" alt="123456">
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- Seccion Descripcion producto-->
                <section>
                    <div class="container-fluid">
                        <p class="lead"><?php echo "Estado del producto: " . $mostrar['Estado_post'] ?></p>
                        <div>
                            <p class="lead text-info">Descripción publicacion: </p>
                            <p class="text-muted"><?php echo $mostrar['Info_post'] ?></p>
                        </div>
                    </div>
                </section>
                <!-- Seccion Comentarios-->
                <section>
                    <div class="card-body">
                        <h5 class="lead">Comentarios</h5>
                        <br>
                        <div class="container-fluid">
                            <div class="input-group input-group-lg mb-6">
                                <input type="text" class="form-control" id="UserComment" placeholder="Comentar..." aria-label="comentario" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="button" id="button-addon2">Comentar</button>
                                </div>
                            </div>
                            <br>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="DataBox" value="Usuario que publico:" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="CommentBox" value="Contenido del comentario" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="DateBox" value="Fecha del comentario" disabled>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="DataBox" value="Usuario que publico:" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="CommentBox" value="Contenido del comentario" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="DateBox" value="Fecha del comentario" disabled>
                                    </div>
                                </div>
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
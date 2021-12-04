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
            $id_post = $_POST["id_post_selec"];
            echo "id: " . $id_post;
            $consulta = "SELECT*FROM vista_publicacion where id_post_vp = $id_post "; //query de prueba
            $resultado = mysqli_query($conexion, $consulta);
            $mostrar = mysqli_fetch_array($resultado);
            //// ubicar bien esta wea
            ?>
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-8" style="position: relative;"><?php echo $mostrar['titulo_vp'] ?></h1>
                                <p class="lead" style="color: Green;"><?php echo "Precio: " . $mostrar['precio_vp'] ?></p>
                                <p class="lead text-primary"> <?php echo  "Fecha: " . $mostrar['fecha_vp'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Carrusel imagenes -->
                <section class="bg-mix py-3">
                    <div class="container">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php while ($mostrar) { //aqui arreglar el while mostrar solito da bug ?>
                                    <div class="carousel-item active">
                                        <img src="<?php print $mostrar['ruta_imagen_vp'] ?>" class="d-block w-100" alt="...">
                                    </div>
                                <?php
                                }
                                ?> <!-- 
                                <div class="carousel-item">
                                    <img src="" class="d-block w-100" alt="img2">
                                </div>
                                <div class="carousel-item">
                                    <img src="" class="d-block w-100" alt="img1">
                                </div> -->
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
                        <p class="lead"><?php echo "Estado del producto: " . $mostrar['estado_vp'] ?></p>
                        <div>
                            <p class="lead text-info">Descripción publicacion: </p>
                            <p class="text-muted"><?php echo $mostrar['info_vp'] ?></p>
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
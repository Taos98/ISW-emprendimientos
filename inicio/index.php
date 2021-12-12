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
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
                                <p class="lead text-muted">Revisa las últimas publicaciones</p>
                            </div>
                            <div class="col-lg-6 col-md-5 d-flex">
                                <button class="btn btn-info w-50 align-self-center form-control" data-toggle="modal" data-target="#agregarPublicacion"> <i class="fas fa-plus-square"></i> Agregar publicacion</button>
                            </div>
                            <div class="col-lg-3 col-md-4 d-flex">
                                <button class="btn btn-primary w-100 align-self-center editar-publicacion" data-toggle="modal" data-target="#modificarPublicacion"><i class="fas fa-edit"></i> Editar publicacion</button>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    $consulta = "SELECT DISTINCT * FROM vista_inicio "; // corregir para que se muestre solo una publicacion con la immagen correspondiente ya que por img se copia publicacion
                                    $resultado = mysqli_query($conexion, $consulta);
                                    while ($mostrar = mysqli_fetch_array($resultado)) { ?>
                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                            <div class="card" style="width: 18rem;">
                                                <img src="<?php print $mostrar['ruta_imagen_vipost']; ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="text-primary"><?php echo $mostrar['titulo_vipost'] ?></h5>
                                                    <h5 class="text-muted"><?php echo $mostrar['info_vipost'] ?></h5>
                                                    <form action="../partes/publicacion.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" id="id_post_selec" name="id_post_selec" value="<?php echo $mostrar['id_vipost'] ?>">
                                                        <button type="submit" class="btn btn-warning">Ver mas</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Crear nueva publicación Modal -->
    <div class="modal fade" id="agregarPublicacion" tabindex="-1">
        <div class="modal-dialog modal-lg" style="max-width: 25%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body overflow-y">
                    <form method="POST" enctype="multipart/form-data" action="../partes/insertar.php">
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="titulo" class="form-control" name="titulo" placeholder="Título" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="for-group col-10">
                                <label for="img">Selecciona una Imagen:</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)" name="archivo">
                                <img id="id_imagen" style="width:100%; margin-top:10px;" />
                                <script>
                                    var loadFile = function(event) {
                                        var reader = new FileReader();
                                        reader.onload = function() {
                                            var output = document.getElementById('id_imagen');
                                            output.src = reader.result;
                                        };
                                        reader.readAsDataURL(event.target.files[0]);
                                    };
                                </script>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="dropdown" id="categoria">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="categoria" data-toggle="dropdown">
                                    Seleccione Categorias
                                </button>
                                <div class="dropdown-menu" id="categoria">
                                    <span class="dropdown-item" type="button">
                                        <input type="checkbox"> Alimentos
                                    </span>
                                    <span class="dropdown-item" type="button">
                                        <input type="checkbox"> Servicios
                                    </span>
                                    <span class="dropdown-item" type="button">
                                        <input type="checkbox"> Otros...
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="info_post" class="form-control" name="info_post" placeholder="Descripción" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <label for="disponibilidad">Disponibilidad:</label>
                                <select class="form-select" name="disponibilidad" id="disponibilidad">
                                    <option value="1" selected>Disponible</option>
                                    <option value="2">No disponible</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <label for="estado">Estado: </label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="1" selected>Nuevo</option>
                                    <option value="2">Usado</option>
                                    <option value="2">Viejo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <input type="number" id="precio_post" class="form-control" name="precio_post" placeholder="Precio" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="contacto" class="form-control" name="contacto" placeholder="Contacto" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="offset-10">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modificar publicación Modal -->
    <div class="modal fade" id="modificarPublicacion" tabindex="-1">
        <div class="modal-dialog modal-lg" style="max-width: 25%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="../partes/modificar.php">
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="titulo" class="form-control" name="titulo" placeholder="Título" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <select id="id_post" name="id_post" class="form-select" require>
                                    <option selected>Selecciona un ID</option>
                                    <?php
                                    $consulta2 = "SELECT * FROM publicacion";
                                    $resultado = mysqli_query($conexion, $consulta2);

                                    while ($mostrar = mysqli_fetch_array($resultado)) { ?>
                                        <option><?php echo $mostrar['id_post'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="for-group col-10">
                                <label for="img">Selecciona una Imagen:</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)" name="archivo">
                                <img id="id_imagen" style="width:100%; margin-top:10px;" />
                                <script>
                                    var loadFile = function(event) {
                                        var reader = new FileReader();
                                        reader.onload = function() {
                                            var output = document.getElementById('id_imagen');
                                            output.src = reader.result;
                                        };
                                        reader.readAsDataURL(event.target.files[0]);
                                    };
                                </script>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="info_post" class="form-control" name="info_post" placeholder="Descripción" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <input type="number" id="precio_post" class="form-control" name="precio_post" placeholder="Precio" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="contacto" class="form-control" name="contacto" placeholder="Contacto" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="offset-10">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Inicio sector scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/modal-style.css">
</body>

</html>
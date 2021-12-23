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
            <div class="col-lg-9 col-md-8" style="margin-top: 1rem;">
                <h1 class="font-weight-bold mb-0">Buscar: </h1>
            </div>
            <div id="content" class="bg-grey w-100">
                <section class="bg-mix py-3">
                    <div class="container">
                        <?php if (isset($_POST['submit-buscador'])) { ?>
                            <?php $search = mysqli_real_escape_string($conexion, $_POST['buscador']); ?>
                            <?php $query = "SELECT * FROM publicacion WHERE titulo LIKE '%$search%' OR info_post LIKE '%$search%'"; ?>
                            <?php $resultado = mysqli_query($conexion, $query); ?>
                            <?php $queryResult = mysqli_num_rows($resultado); ?>
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <?php if ($queryResult > 0) { ?>
                                        <?php echo "Se encontraron " . $queryResult . " resultados con la búsqueda: " . $search; ?>
                                        <div class="row">
                                            <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="<?php print $row['id_imagen']; ?>" class="card-img-top">
                                                        <div class="card-body">
                                                            <h5 class="text-muted"><?php echo $row['info_post'] ?></h5>
                                                            <h5 class="text-muted">Id: <?php echo $row['id_post'] ?></h5>
                                                            <h5 class="text-primary"><i class="fas fa-dollar-sign"></i><?php echo $row['precio_post'] ?></h5>
                                                            <h6 class="text-warning"><i class="fas fa-phone-square-alt"></i></span><?php echo $row['contacto'] ?></h6>
                                                            <a href="../partes/publicacion.php" class="btn btn-warning">Ver mas</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                    <?php } else { ?>
                                    <?php echo "No hay resultados que coincidan con su búsqueda"; ?>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
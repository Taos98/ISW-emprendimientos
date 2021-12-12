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
                <h1>Buscar: </h1>

                <div class="container">
                    <?php
                    if (isset($_POST['submit-buscador'])) {
                        $search = mysqli_real_escape_string($conexion, $_POST['buscador']);
                        $query = "SELECT * FROM publicacion WHERE titulo LIKE '%$search%' OR info_post LIKE '%$search%'";
                        $resultado = mysqli_query($conexion, $query);
                        $queryResult = mysqli_num_rows($resultado);

                        echo "Se encontraron ".$queryResult." resultados con la búsqueda: ".$search;

                        if ($queryResult > 0) {
                            while ($row = mysqli_fetch_assoc($resultado)) {
                    ?>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?php print $row['id_imagen']; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="text-muted"><?php echo $row['info_post'] ?></h5>
                                            <h5 class="text-muted">Id: <?php echo $row['id_post'] ?></h5>
                                            <h5 class="text-primary"><i class="fas fa-dollar-sign"></i><?php echo $row['precio_post'] ?></h5>
                                            <h6 class="text-warning"><i class="fas fa-phone-square-alt"></i></span><?php echo $row['contacto'] ?></h6>
                                            <a href="../partes/publicacion.php" class="btn btn-warning">Ver mas</a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "No hay resultados que coincidan con su búsqueda";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</body>
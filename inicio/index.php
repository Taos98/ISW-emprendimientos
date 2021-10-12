
    <!-- head -->
        <?php include('../partes/head.php')?>
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
                                <h1 class="font-weight-bold mb-0">Bienvenido Usuario Generico</h1>
                                <p class="lead text-muted">Revisa las últimas publicaciones</p>
                            </div>
                            <div class="col-lg-3 col-md-4 d-flex">
                                <button class="btn btn-info w-100 align-self-center">Agregar publicacion</button>
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
                                    //query pa ver si hay publicaciones:
                                    //$consulta="SELECT*FROM publicacion WHERE disponibilidad ='true'";

                                    $consulta="SELECT*FROM usuario";//query de prueba

                                    $resultado=mysqli_query($conexion,$consulta);

                                    while ($mostrar=mysqli_fetch_array($resultado)) {?>
                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted"><?php echo $mostrar['nombre_user'] ?></h6>
                                            <!-- foto -->
                                            <h3 class="font-weight-bold">Publicacion 1</h3>
                                            <h6 class="text-warning"><span class="iconify" data-icon="clarity:calendar-solid"></span> Fecha 1</h6>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>

</html>
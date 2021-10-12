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
                                <button class="btn btn-info w-100 align-self-center form-control" data-toggle="modal" data-target="#agregarPublicacion">Agregar publicacion</button>
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
                </section>
            </div>
        </div>
    </div>

     <!-- Crear nueva publicación Modal -->
    <div class="modal fade" id="agregarPublicacion" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="titulo" class="form-control" name="titulo" size="50" placeholder="Título" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="for-group col-3">
                                <label for="img">Selecciona una Imagen:</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)">
                                <img id="output" style="width:100%; margin-top:10px;" src="" />
                                <script>
                                    var loadFile = function(event) {
                                        var reader = new FileReader();
                                        reader.onload = function() {
                                            var output = document.getElementById('output');
                                            output.src = reader.result;
                                        };
                                        reader.readAsDataURL(event.target.files[0]);
                                    };
                                </script>
                        <br><br>
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="info_post" class="form-control" name="info_post" size="50" placeholder="Descripción" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="precio" class="form-control" name="precio" size="50" placeholder="Precio" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <input type="text" id="contacto" class="form-control" name="contacto" size="50" placeholder="Contacto" required>
                            </div>
                        </div>

                        <div class="offset-10">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js%22%3E</script>
</body>

</html>
<!-- head -->
<?php include('../partes/head.php'); ?>
<?php include('../conexion/conexion.php'); ?>
<!-- fin head -->

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
      <?php $email = $_SESSION['email']; ?>
        <section class="bg-light py-3">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 col-md-8">
              </div>

            </div>
          </div>
        </section>

        <section class="bg-mix py-3">
          <div class="container">
            <?php
            $perfil = "SELECT * FROM usuario WHERE email_user = '$email'";
            $resultadoPerfil = mysqli_query($conexion, $perfil)
            ?>
            <?php if($mostrarPerfil = mysqli_fetch_array($resultadoPerfil)){ ?>
              
            <img src="<?php echo $mostrarPerfil['imagen_user'];?>" style="width:30%; height:30%">
            <br>
            <?php echo $mostrarPerfil['nombre_user'] ." ". $mostrarPerfil['apellido'];?>
            <br>
            <?php echo $mostrarPerfil['email_user'];?>
            <br>
            <?php echo $mostrarPerfil['descripcion_perfil'];?>
            <?php } ?>
          </div>
        </section>

        <section>
          <div class="container">

          </div>
        </section>

      </div>

    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>

</html>
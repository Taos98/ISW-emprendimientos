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
          <div class="container-fluid">

            <?php $perfil = "SELECT * FROM usuario WHERE email_user = '$email'"; ?>
            <?php $resultadoPerfil = mysqli_query($conexion, $perfil) ?>
            <?php if ($mostrarPerfil = mysqli_fetch_array($resultadoPerfil)) { ?>
              <h1 class="text-info" style="margin-left: 2rem;"> <?php echo $mostrarPerfil['Nombre_user'] . " " . $mostrarPerfil['Apellido_user']; ?> </h1>
              <br>
              <div class="row">
                <div class="col-lg-3" style="margin-left: 2rem;">
                  <img src="<?php echo $mostrarPerfil['ruta_imagen_usuario']; ?>" style="width:60%; height:80%">
                </div>
                <div class="col-lg-8">
                  <label for="correoPerfil" style="font-size: 1.5rem">Correo: <?php echo $mostrarPerfil['email_user']; ?></label>
                  <br>
                  <label for="descripcionPerfil" style="font-size: 1.5rem">Descripción: <?php echo $mostrarPerfil['Descripcion_user']; ?></label>
                  <br>
                  <label for="contactoPerfil" style="font-size: 1.5rem">Contacto: <?php echo $mostrarPerfil['Contacto_user']; ?></label>
                  <br>
                <?php } ?>
                </div>
              </div>
          </div>
        </section>

        <br><br>
        <section>
          <div class="container">
            <h3>_____________________</h3>
            <h3>Acá va la valoración!</h3>
            <h3>_____________________</h3>
          </div>
        </section>
        <br><br>
        <section>
          <div class="container">
            <h3>__________________________</h3>
            <h3>Acá van las publicaciones!</h3>
            <h3>__________________________</h3>
          </div>
        </section>

      </div>

    </div>
  </div>

</body>

</html>
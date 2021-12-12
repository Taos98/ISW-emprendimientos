<!-- Navbar -->
<?php session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline position-relative d-inline-block my-2">
                    <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right">
                        <img src="https://previews.123rf.com/images/jemastock/jemastock1609/jemastock160905175/63043795-persona-ejecutiva-en-traje-con-la-ilustraci%C3%B3n-de-vector-de-imagen-de-iconos-de-negocios-relacionados-co.jpg" 
                        class="img-fluid rounded-circle avatar mr-2"
                        alt="imagen"/>
                        <?php echo $_SESSION['nombre']; ?>
                        </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../perfil/perfil.php"><i class="fas fa-user"></i> Mi perfil</a>
                                
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../login/login.html"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                            </div>
                    </li>
                </ul>
                </div>
        </div>
    </nav>
<!-- Fin Navbar -->
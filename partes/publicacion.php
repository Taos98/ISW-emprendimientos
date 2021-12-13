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
            if ($_SESSION['Flag_succes_coment'] == 1) { //1 para si / 0 para no
                $id_post =  $_SESSION['Id_post_aft'];
                $_SESSION['Flag_succes_coment'] = 0;
            } else {
                $id_post = $_POST['id_post_selec'];
                $_SESSION['Id_post_aft'] = $id_post;
            }
            $consulta = "SELECT*FROM vista_publicacion where id_post_vp = $id_post ";
            $resultado = mysqli_query($conexion, $consulta);
            $mostrar = mysqli_fetch_array($resultado);
            ?>
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-8" style="position: relative;"><?php echo $mostrar['titulo_vp'] ?></h1>
                                <p class="lead" style="color: Green;"><?php echo "Precio: $" . $mostrar['precio_vp'] ?></p>
                                <p class="lead text-primary"> <?php echo  "Fecha: " . $mostrar['fecha_vp'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Carrusel imagenes -->
                <?php
                $consultaImg = "SELECT*FROM vista_publicacion where id_post_vp = $id_post";
                $resultadoImg = mysqli_query($conexion, $consultaImg);
                ?>
                <section class="bg-mix py-3">
                    <div class="container">
                        <div id="carouselIMGs" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php //while ($mostrar = mysqli_fetch_array($resultado)) { 
                                ?>
                                <div class="carousel-item active">
                                    <img src="<?php print $mostrar['ruta_imagen_vp'] ?>" width="680" height="680" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php print $mostrar['ruta_imagen_vp'] ?>" width="680" height="680" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselIMGs" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIMGs" role="button" data-slide="next">
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
                    <div class="container-fluid">
                        <div>
                            <p class="lead text-info">Contacto: </p>
                            <p class="text-warning"><?php echo $mostrar['contacto_vp'] ?></p>
                        </div>
                    </div>
                </section>
                <!--SECCION VALORACION PRODUCTO OSKHAR-->
                <section>
                    <div class="card">
                        <div class="card-header"><?php echo $mostrar['titulo_vp'] ?></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <h1 class="text-warning mt-4 mb-4">
                                        <b><span id="average_rating">0.0</span> / 5</b>
                                    </h1>
                                    <div class="mb-3">
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                    </div>
                                    <h3><span id="total_review">0</span> Valoraciones</h3>
                                </div>
                                <div class="col-sm-4">
                                    <p>
                                    <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                    </div>
                                    </p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <h3 class="mt-4 mb-3">Deja tu Valoracion aqui</h3>
                                    <button type="button" name="add_review" id="add_review" class="btn btn-primary">Valora ya!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--FIN SECCION VALORACION PRODUCTO  OSKHAR-->
                <!-- Seccion Comentarios-->
                <section>
                    <div class="card-body">
                        <h5 class="lead">Comentarios</h5>
                        <br>
                        <div class="container-fluid">
                            <form action="../partes/comentar.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group input-group-lg mb-6">
                                    <input type="text" class="form-control" id="UserComment" name="UserComment" placeholder="Comentar..." aria-label="comentario" aria-describedby="button-addon2" required>
                                    <input type="hidden" id="IdPost" name="IdPost" value="<?php echo $id_post ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-info" type="submit" id="button-addon2">Comentar</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div class="container-fluid">
                                <?php
                                $consultaComentario = "SELECT * FROM vista_comentario WHERE id_post_vc = $id_post ";
                                $resultadoComentario = mysqli_query($conexion, $consultaComentario);
                                $flag_mostrarComentario = false;
                                while ($mostrarComentario = mysqli_fetch_array($resultadoComentario)) {
                                    $flag_mostrarComentario = true ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="DataBox" value="<?php echo $mostrarComentario['nombre_user_vc'] . " " . $mostrarComentario['apellido_user_vc'] ?>" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="CommentBox" value="<?php echo $mostrarComentario['info_com_vc'] ?>" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="DateBox" value="<?php echo $mostrarComentario['fecha_com_vc'] ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                <?php
                                }
                                if ($flag_mostrarComentario == false) { ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="DataBox" value="------" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="CommentBox" value="No existen comentarios" disabled>
                                        </div>
                                        <div class="col">
                                            <input type="text" id="DateBox" value="------" disabled>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <style>
                    .progress-label-left {
                        float: left;
                        margin-right: 0.5em;
                        line-height: 1em;
                    }

                    .progress-label-right {
                        float: right;
                        margin-left: 0.3em;
                        line-height: 1em;
                    }

                    .star-light {
                        color: #e9ecef;
                    }
                </style>

                <!-- MODAL DE VALORACION OSKHAR -->
                <div id="review_modal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="documento">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Evalua el producto <?php echo $mostrar['titulo_vp'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-center mt-2 mb-4">
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                </h4>
                                <div class="form-group">
                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Ingresa tu usuario" />
                                    <input type="hidden" name="id_post_rev" id="id_post_rev" class="form-control" value="<?php echo $id_post ?>" />
                                </div>
                                <div class="form-group">
                                    <textarea name="user_review" id="user_review" class="form-control" placeholder="¿Como te pareció el producto?"></textarea>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="button" class="btn btn-primary" id="save_review">ENVIAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL DE VALORACION OSKHAR -->
                <footer>

                </footer>
            </div>
        </div>
    </div>


    <!--Inicio sector scripts -->
    <link rel="stylesheet" href="../assets/css/coment-style.css">

    <script>
        $(document).ready(function(){

var rating_data = 0;

$('#add_review').click(function(){

    $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){

    var rating = $(this).data('rating');

    reset_background();

    for(var count = 1; count <= rating; count++)
    {

        $('#submit_star_'+count).addClass('text-warning');

    }

});

function reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#submit_star_'+count).addClass('star-light');

        $('#submit_star_'+count).removeClass('text-warning');

    }
}

$(document).on('mouseleave', '.submit_star', function(){

    reset_background();

    for(var count = 1; count <= rating_data; count++)
    {

        $('#submit_star_'+count).removeClass('star-light');

        $('#submit_star_'+count).addClass('text-warning');
    }

});

$(document).on('click', '.submit_star', function(){

    rating_data = $(this).data('rating');

});

$('#save_review').click(function(){

    var user_name = $('#user_name').val();

    var user_review = $('#user_review').val();

    var id_post_rev = $('#id_post_rev').val();

    if(user_name == '' || user_review == '')
    {
        alert("Por favor rellene ambos campos");
        return false;
    }
    else
    {
        $.ajax({
            url:"postvaloracionBD.php",
            method:"POST",
            data:{rating_data:rating_data, user_name:user_name, id_post_rev:id_post_rev ,user_review:user_review},
            success:function(data)
            {
                $('#review_modal').modal('hide');

                load_rating_data();

                alert(data);
            }
        })
    }

});

load_rating_data();

function load_rating_data()
{
    $.ajax({
        url:"postvaloracionBD.php",
        method:"POST",
        data:{action:'load_data'},
        dataType:"JSON",
        success:function(data)
        {
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function(){
                count_star++;
                if(Math.ceil(data.average_rating) >= count_star)
                {
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            if(data.review_data.length > 0)
            {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
                    html += '<div class="row mb-3">';

                    html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                    html += '<div class="col-sm-11">';

                    html += '<div class="card">';

                    html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                    html += '<div class="card-body">';

                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';

                        if(data.review_data[count].rating >= star)
                        {
                            class_name = 'text-warning';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }

                    html += '<br />';

                    html += data.review_data[count].user_review;

                    html += '</div>';

                    html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                    html += '</div>';

                    html += '</div>';

                    html += '</div>';
                }

                $('#review_content').html(html);
            }
        }
    })
}

});
    </script>

</body>
$(function(){
    $('.editar-publicacion').click(function(){
        var id = {
            id_post: $(this).data('id_post')
        };
        EnviarDatosAModal(id);
    });
});

function EnviarDatosAModal(id){
    $('#titulo').val(id.id_post);
}
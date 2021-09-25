$("#btn-asignar").on("click",function(){
    $("#modalAsigEqui").modal();
})

$('#modalAsigEqui').datepicker({
    format: "dd/mm/yyyy"
});
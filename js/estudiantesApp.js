
	//codigo para eliminar
$(document).ready(function(){
	//$(".btn_eliminar").click(function(){
		$(document).on('click', '.btn_eliminar', function(){
        var id = $(this).parent().parent().attr("id");
        $.get("estudianteModel.php", {"id_estudiante":id,"accion":"Eliminar"},function(respuesta){
        	

         });
        $(this).parent().parent().remove()
        
       });
  });
//modificar
$("#dialog").dialog({autoOpen: false});
//$(".btn_modificar").click(function(){
	$(document).on('click', '.btn_modificar', function(){
	var id = $(this).parent().parent().attr("id");
	var estudiante = $(this).parent().prev().prev().prev().prev().html();
	var control = $(this).parent().prev().prev().prev().html();
	var carrera = $(this).parent().prev().prev().html();
	var genero = $(this).parent().prev().html();

	$("#dialog").dialog({
		width: "auto",
		autoOpen: true,
		resizable: false,
		show: "scale",
		hide: "shake",
		modal: "true"
	});

	$.get("estudianteModel.php",{"id_estudiante":id},
		function(respuesta){
			//alert();
            $("#id_estudiante").val(id);
            $("#Mestudiante").val(estudiante);
            $("#Mcontrol").val(control);
            $("#Mcarrera").val(carrera);
            $("#Mgenero").val(genero);

		});
});

//codigo que se ejecuta cuando damos click en el boton de modificar autor en la ventana emergente,aqui se realiza la modificacion en la base de datos
$(".modificar_estudiante").click(function(){
	var id = $("#id_estudiante").val();
    var estudiante = $("#Mestudiante").val();
    var control = $("#Mcontrol").val();
    var carrera = $("#Mcarrera").val();
    var genero = $("#Mgenero").val();
    $.get("estudianteModel.php", {"accion":"Actualizar","id_estudiante":id, "estudiante":estudiante, "control":control, "carrera":carrera, "genero":genero},
    	function(respuesta){

    	});
         alert("Registro Actualizado");
         location.reload();
});

$(document).on('keyup','#buscar', function(){
	var cont = 0;
	var estudiante= $("#buscar").val();
	$("#lista_autores").html("");
	$.get("estudianteModel.php", {"id_estudiante":0, "estudiante":estudiante, "accion":"BuscarAutocomplete"},
		function(registros){
			registros.forEach(function(registro, index){
				$("#lista_autores").prepend("<tr class='renglones_pares' id='"+ registro.id+"'>"+
					"<td class='col200'>" + registro.estudiante+"</td>"+
					"<td class='col200'>" + registro.numero_control+"</td>"+ 
					"<td class='col350'>" + registro.carrera+"</td>"+
					"<td class='col100'>" + registro.genero+"</td>"+
					 "<td> <span class='btn_modificar icon-newspaper iconos_acciones' id='modificar'></span> </td>" +
		        	"<td> <span class='btn_eliminar icon-bin iconos_acciones' id='eliminar'></span> </td>" +
		        	 "</tr>");
				cont++;
				$("#contador_registros").html(cont+" Registros");
					});
			},"json");
});
		
		


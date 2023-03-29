
	//codigo para eliminar
$(document).ready(function(){
	//$(".btn_eliminar").click(function(){
		$(document).on('click', '.btn_eliminar', function(){
        var id = $(this).parent().parent().attr("id");
        $.get("maestroModel.php", {"id_maestro":id,"accion":"Eliminar"},function(respuesta){
        	

         });
        $(this).parent().parent().remove()
        
       });
  });
//modificar
$("#dialog").dialog({autoOpen: false});
//$(".btn_modificar").click(function(){
	$(document).on('click', '.btn_modificar', function(){
	var id = $(this).parent().parent().attr("id");
	var nombre = $(this).parent().prev().prev().prev().html();
	var targeta = $(this).parent().prev().prev().html();
	var genero = $(this).parent().prev().html();

	$("#dialog").dialog({
		width: "auto",
		autoOpen: true,
		resizable: false,
		show: "scale",
		hide: "shake",
		modal: "true"
	});

	$.get("maestroModel.php",{"id_maestro":id},
		function(respuesta){
			//alert();
            $("#id_maestro").val(id);
            $("#Mnombre").val(nombre);
            $("#Mtargeta").val(targeta);
           
            $("#Mgenero").val(genero);

		});
});

//codigo que se ejecuta cuando damos click en el boton de modificar autor en la ventana emergente,aqui se realiza la modificacion en la base de datos
$(".modificar_maestro").click(function(){
	var id = $("#id_maestro").val();
    var nombre = $("#Mnombre").val();
    var targeta = $("#Mtargeta").val();
 
    var genero = $("#Mgenero").val();
    $.get("maestroModel.php", {"accion":"Actualizar","id_maestro":id, "nombre":nombre, "targeta":targeta, "genero":genero},
    	function(respuesta){

    	});
         alert("Registro Actualizado");
         location.reload();
});

$(document).on('keyup','#buscar', function(){
	var cont = 0;
	var nombre= $("#buscar").val();
	$("#lista_autores").html("");
	$.get("maestroModel.php", {"id_maestro":0, "nombre":nombre, "accion":"BuscarAutocomplete"},
		function(registros){
			registros.forEach(function(registro, index){


				$("#lista_autores").prepend("<tr class='renglones_pares' id='"+ registro.id+"'>"+
					"<td class='col350'>" + registro.nombre+"</td>"+
					"<td class='col200'>" + registro.numero_tarjeta+"</td>"+ 
					"<td class='col100'>" + registro.genero+"</td>"+
					 "<td> <span class='btn_modificar icon-newspaper iconos_acciones' id='modificar'></span> </td>" +
		        	"<td> <span class='btn_eliminar icon-bin iconos_acciones' id='eliminar'></span> </td>" +
		        	 "</tr>");
				






				cont++;

				$("#contador_registros").html(cont+" Registros");
					});
			},"json");
});
		
		


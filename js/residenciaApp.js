
	//codigo para eliminar
$(document).ready(function(){
	//$(".btn_eliminar").click(function(){
		$(document).on('click', '.btn_eliminar', function(){
        var id = $(this).parent().parent().attr("id");
        $.get("residenciaModel.php", {"id_residencia":id,"accion":"Eliminar"},function(respuesta){
        	

         });
        $(this).parent().parent().remove()
        
       });
  });

$(document).on('keyup','#buscar', function(){
	var cont = 0;
	var nombre= $("#buscar").val();
	$("#lista_residencia").html("");
	$.get("residenciaModel.php", {"id_residencia":0, "nombre":nombre, "accion":"BuscarAutocomplete"},
		function(registros){
			registros.forEach(function(registro, index){
				$("#lista_residencia").prepend("<tr class='renglones_pares' id='"+ registro.id+"'>"+
					"<td class='col200'>" + registro.estudiante+"</td>"+
					"<td class='col200'>" + registro.nombre+"</td>"+ 
					"<td class='col200'>" + registro.periodo+"</td>"+ 
					"<td class='col350'>" + registro.nombre_proyecto+"</td>"+
					"<td class='col350'>" + registro.empresa+"</td>"+
					"<td class='col350'>" + registro.objetivo+"</td>"+ 
					"<td class='col200'>" + registro.sector+"</td>"+ 
					"<td class='col200'>" + registro.region+"</td>"+ 
					"<td class='col350'>" + registro.areas_aplicacion+"</td>"+ 
					"<td class='col200'>" + registro.alumnos_asignados+"</td>"+ 
					"<td class='col350'>" + registro.lenguajes_programacion+"</td>"+ 
					"<td class='col350'>" + registro.bases_datos+"</td>"+ 
					"<td class='col350'>" + registro.ides+"</td>"+ 
					"<td class='col350'>" + registro.frameworks+"</td>"+ 
					"<td class='col200'>" + registro.estado+"</td>"+ 
					 "<td> <span class='btn_modificar icon-newspaper iconos_acciones' id='modificar'></span> </td>" +
		        	"<td> <span class='btn_eliminar icon-bin iconos_acciones' id='eliminar'></span> </td>" +
		        	 "</tr>");


				cont++;
				$("#contador_registros").html(cont+" Registros");
					});
			},"json");
}); 


$(document).on('click', '.btn_actualizar', function(){

	$.get("recidenciaModel.php",{"alu":id},
		function(respuesta){
			//alert();
            $("#alu").val(id);
           
            $("#estado").val(estado);

		});
});

//codigo que se ejecuta cuando damos click en el boton de modificar autor en la ventana emergente,aqui se realiza la modificacion en la base de datos
$(".btn_actualizar").click(function(){
	var id = $("#alu").val();
   
    var estado = $("#estado").val();
    $.get("residenciaModel.php", {"accion":"Actualizar","alu":id, "estado":estado},
    	function(respuesta){

    	});
         alert("Registro Actualizado");
         location.reload();
});
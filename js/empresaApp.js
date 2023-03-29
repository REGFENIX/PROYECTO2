
	//codigo para eliminar
$(document).ready(function(){
	//$(".btn_eliminar").click(function(){
		$(document).on('click', '.btn_eliminar', function(){
        var id = $(this).parent().parent().attr("id");
        $.get("empresaModel.php", {"id_empresa":id,"accion":"Eliminar"},function(respuesta){
        	

         });
        $(this).parent().parent().remove()
        
       });
  });
//modificar
$("#dialog").dialog({autoOpen: false});
//$(".btn_modificar").click(function(){
	$(document).on('click', '.btn_modificar', function(){
	var id = $(this).parent().parent().attr("id");
	var empresa = $(this).parent().prev().html();


	$("#dialog").dialog({
		width: "auto",
		autoOpen: true,
		resizable: false,
		show: "scale",
		hide: "shake",
		modal: "true"
	});

	$.get("empresaModel.php",{"id_empresa":id},
		function(respuesta){
			//alert();
            $("#id_empresa").val(id);
            $("#Mempresa").val(empresa);
        

		});
});

//codigo que se ejecuta cuando damos click en el boton de modificar autor en la ventana emergente,aqui se realiza la modificacion en la base de datos
$(".modificar_empresa").click(function(){
	var id = $("#id_empresa").val();
    var empresa = $("#Mempresa").val();
 
    $.get("empresaModel.php", {"accion":"Actualizar","id_empresa":id, "empresa":empresa},
    	function(respuesta){

    	});
         alert("Registro Actualizado");
         location.reload();
});

$(document).on('keyup','#buscar', function(){
	var cont = 0;
	var empresa= $("#buscar").val();
	$("#lista_autores").html("");
	$.get("empresaModel.php", {"id_empresa":0, "empresa":empresa, "accion":"BuscarAutocomplete"},
		function(registros){
			registros.forEach(function(registro, index){
				$("#lista_autores").prepend("<tr class='renglones_pares' id='"+ registro.id+"'>"+
					"<td class='col350'>" + registro.empresa+"</td>"+
					 "<td> <span class='btn_modificar icon-newspaper iconos_acciones' id='modificar'></span> </td>" +
		        	"<td> <span class='btn_eliminar icon-bin iconos_acciones' id='eliminar'></span> </td>" +
		        	 "</tr>");
				cont++;
				$("#contador_registros").html(cont+" Registros");
					});
			},"json");
});
		
		


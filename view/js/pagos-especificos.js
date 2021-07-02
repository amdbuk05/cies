$(buscar_datos());

function buscar_datos(consulta)
{
	$.ajax({
		url: './results/buscarpagos.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta },
	})
	.done(function(respuesta){
		$("#pagos").html(respuesta);
	} )
	.fail(function(){
		console.log("error");
	})
}

$(document).on('keyup', '#caja_busqueda', function()
{
	var valor = $(this).val();
	if (valor != '') {
		buscar_datos(valor);

	}
	else
	{
		buscar_datos();
	}
});

$("#op_bus").change(function(){
var valor = $(this).val();
	if (valor != '') {
		buscar_datos(valor);

	}
	else
	{
		buscar_datos();
	}
});

$("#profes").change(function(){
var valor = $(this).val();
	if (valor != '') {
		buscar_datos(valor);

	}
	else
	{
		buscar_datos();
	}
});
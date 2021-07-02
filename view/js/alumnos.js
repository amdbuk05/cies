$(buscar_datos());

function buscar_datos(consulta)
{
	$.ajax({
		url: './results/buscar.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta:consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	} )
	.fail(function(){
		console.log("error");
	})
}

$(document).on('keyup', '#buscar', function()
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
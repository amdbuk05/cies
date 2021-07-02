$(buscar_datos(), filtro_posgrado());

function buscar_datos(consulta)
{
	$.ajax({
		url: './results/listar_egresados.php',
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

function filtro_posgrado(consulta)
{
	$.ajax({
		url: './results/listar_maestrias.php',
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


//--------------------//
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

$(document).on('change', '#op_bus', function(){
var valor = $(this).val();
	if (valor != '') {
		filtro_posgrado(valor);

	}
	else
	{
		filtro_posgrado();
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
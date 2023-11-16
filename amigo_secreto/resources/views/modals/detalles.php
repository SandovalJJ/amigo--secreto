<script>
	function myFunction() {
		if (confirm("Desea Terminar con la inscripción?")) {
			alert("Gracias por participar");
			location.href = 'https://coopserp.com';
		} else {
			alert("Usted cancelo la acción para guardar");
		}
	}

	//hacer aparecer boton aceptar
	function showContent() {
		element = document.getElementById("content");
		check = document.getElementById("check");
		if (check.checked) {
			element.style.display = 'inline';
		} else {
			element.style.display = 'none';
		}
	}
	
	$( document ).ready(function() {
    $('#myModal2').modal('toggle')
});

	
</script>

<style>
    @media (max-width: 600px) {
      #modal-inicio {
        width: 95% !important;
      }
    }
</style>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" id="modal-inicio" role="document" style="width: 60%;">
		<div class="modal-content">

			<div class="modal-body">
				<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
					<div id="resultados_ajax2"></div>
						<h3 style="color:black" align="center"><strong>AMIGO SECRETO DICIEMBRE 2021</strong></h3>
						<br>
						<h4 style="color:black; font-size: 21px;" ; align="justify">
							    <strong>• INSCRIPCIONES:</strong> sin costo, desde el miércoles 22 de diciembre hasta el viernes 24 de diciembre del 2021 a las 23:59 horas.
							<br>
							<br>
							    <strong>• SELECCIONAR EL AMIGO SECRETO:</strong> El asociado inscrito debe ingresar partir del sábado 25 de diciembre a las 00:00 horas hasta el domingo 26 de diciembre 2021 a las 23:59 horas y seleccionar el amigo secreto girando la ruleta.
							<br>
							<br>
						    	<strong>• NOTA:</strong> Si durante dicho lapso, el asociado inscrito en el Juego de AMIGO SECRETO, no ingresa a seleccionar el amigo secreto, el software diseñado para esta actividad le asignará automáticamente el amigo secreto el día 27 de diciembre del 2021.
							<br>
							<br>
					    		<strong>• ENDULZAR:</strong> El asociado inscrito podrá endulzar a su amigo secreto en la Agencia a la cual pertenece, desde el lunes 27 de diciembre hasta el 29 de diciembre 2021.
					    	<br>
							<br>
					    		<strong>• ENTREGA REGALO DE AMIGO SECRETO:</strong>Asociados Inscritos Agencia La Unión, Roldanillo y Zarzal: Realizarán la entrega el jueves 30 de diciembre 2021. Asociados Inscritos Agencia Yumbo: Realizarán la entrega el viernes 31 de Diciembre 2021 en las instalaciones de la Agencia Yumbo desde las 08:00 hasta las 13:00 horas.
					    	<br>
							<br>
					    		<strong>• INFORMACIÓN IMPORTANTE:</strong>
					    	<br>
							<br>
					    		• En el momento de la inscripción para el juego de AMIGO SECRETO, el asociado inscrito podrá registrar la lista de regalos y dulces favoritos.
					    	<br>
							<br>
							    •  El monto mínimo del regalo es de <strong>$10.000 pesos</strong>

							<br>
							<br>
					    	    • El Juego de AMIGO SECRETO se realizará con los asociados de la Agencia a la cual pertenece el asociado inscrito.
						</h4>
				    <div class="modal-header">
						    <button type="button" class="btn btn-success" data-dismiss="modal">ACEPTAR</button>
					    </div>
			    </form>

			</div>
		</div>
	</div>
</div>

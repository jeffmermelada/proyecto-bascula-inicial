function validacionDatos(){


	var expr_correo

	var nombre, apellido, cedula, telefono, correo, direccion;
	nombre = document.getElementById("nombres").value;
	apellido = document.getElementById("apellido").value;
	cedula = document.getElementById("cedula").value;
	telefono = document.getElementById("celular").value;
	correo = document.getElementById("correo").value;
	direccion = document.getElementById("direccion").value;

	$(element).prop("disabled", false); 
	var text = $(element).val(); 
	$(element).prop("disabled", true)
	precio = document.getElementById("precio_total").value;


	alert(precio);

	
}
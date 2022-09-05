<?php
include'conexion_database.php';



	if($con){
        
		if(isset($_REQUEST['id'])) {
            $valor = $_REQUEST['id'];
            echo "Medida en gramos";
            echo "Valor : ". $valor;


            $update = "UPDATE datosarduino SET valor = '$valor' WHERE id = 1";
            //$insert = "INSERT INTO datosarduino (id, medida, valor) VALUES (null,'gramos', '$valor')";
            $resultado = mysqli_query($con, $update);
            
            if($resultado){

                echo "Actualizando valor bascula";

            } else {

                echo "Error";
            }
        
            } else {

                echo "No se esta recibiendo valores";
            }
       

	} else {

        echo "No se ha podido establecer conexion";

    }

 ?>   
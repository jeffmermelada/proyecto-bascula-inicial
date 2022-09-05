<?php	
    include 'conexion_database.php';

    $query = "SELECT * FROM datosarduino";
    $result = mysqli_query($con, $query);
	if($result){
	    while($row = mysqli_fetch_array($result)){
			$valor = $row["valor"];
			echo $valor;      
		}
    }                           
?>
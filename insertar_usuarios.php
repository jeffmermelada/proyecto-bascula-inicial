<?php

include 'actualizar_valor.php';
include 'conexion_database.php';

echo "<br>";


$nombre = $_POST["nombres"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$correo = $_POST["correo"];
$celular = $_POST["celular"];
$direccion = $_POST["direccion"];
//$precio = $_POST["precio_total"]; 
//$precio = "<script>document.writeln(final);</script>";


if(isset($_POST["material"])){

    $material = $_POST["material"];
}


//CALCULO DEL PRECIO

$peso = $valor;

$v = (float)$peso/1000;
$final = number_format(($v * (float)$material), 2);
$precio = $final;
echo "precio final: " . $final;

$insert = "INSERT INTO usuario (id, cedula, nombre, apellido, correo, material, peso, precio) VALUES (null, '$cedula','$nombre','$apellido','$correo','$material','$peso','$precio')";

$result = mysqli_query($con, $insert);

ob_end_clean();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10;url=index.php">
    <title>Registro exitoso</title>
</head>
<body>
    <h1>Se ha registrado exitosamente</h1>
    <b>Se redireccionará al inicio...</b>
    <i>Si no se direcciona automaticamente, haga click <a href="index.php">aquí</a></i>

</body>
</html>
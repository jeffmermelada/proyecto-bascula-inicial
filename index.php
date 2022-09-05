<?php

    include 'conexion_database.php';   
	
	if(mysqli_connect_errno()){
		echo "No se ha podido establecer conexión con la base de datos: " . mysqli_connect_error();
	}

    echo '<script src ="./js/calculo_precio_material.js" type="text/javascript"></script>';
    echo '<script src ="./js/actualizar.js" type="text/javascript"></script>';
    echo '<script src ="./js/main.js" type="text/javascript"></script>';

	
    $query = "SELECT * FROM precio_materiales";
    $result = mysqli_query($con, $query);

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <script src=".\ico\js\all.js" crossorigin="anonymous"></script>

    <!-- ARCHIVOS DE ESTILO -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/table.css">


    <title>Bascula Arduino</title>
</head>
<body>
    <header>
        <div id="nav">
            <ul>
                <li><a href="#home" class="scroller" id="menu">Inicio</a></li>
                <li><a href="#registro" class="scroller" id="menu" >Registro</a></li>
                <li><a href="#about" class="scroller" id="menu" >Contacto</a></li>
                <a href = "#home"><img src="./img/soft.png" alt="des_software" class="logo"></a>
            </ul>
        </div>
    </header>
    </div>
    

    <!-- FORMULARIO REGISTRO DE DATOS -->
    <form action="insertar_usuarios.php" method="POST" onsubmit="validacionDatos()">
        <div class="content">
            <!-- Pagina 1 -->
            <div class="page-home" id="home">
                <h1> Bascula con Arduino </h1>
                <p>Seleccione el material que se está pesando:</p>
                <table>
                    <caption>Bascula</caption>
                    <tr>
                        <td class='valor-material'>
                            <section id="materiales">
                                <select class='material-select' id='material' name='material'>
                                <?php 
                                if($result){
                                        while($row = mysqli_fetch_array($result)){
                                        $precio = $row["precio"];
                                        $materiales = $row["material"];
                                        $id = $row["id"];
                                        echo "<option value=" . $precio . ">" . $materiales . "</option>";
                                        }
                                    }?>
                                </select>
                            </section>
                        </td>
                        <td class='valor'>
                            <section id="valorA"></section>
                            gramos
                    </tr>
                </table>
                <h2> Calcular el precio por su peso </h2>
                <p> Para calcular el precio del material reciclado que se ha colocado en la bascula, seleccione la
                    medida de peso y el material que se esta pesando </p>

                <input type="button" value="Calcular precio" class="boton" onclick="calcular()">
                <br>

                <div class="calculo_peso" id="calculo_peso">
                    <h3>Precio</h3> 
                    <input type="text" id="precio_total" readonly="readonly" class="box precio" name="precio_total" value=0>
                </div>
            </div> 
            <div class = "page-home">
                <h1> Bascula con Arduino </h1>
                <table class="precios_referenciales">
                    <caption> Precios referenciales respecto a material reciclado </caption>
                        <tr class="abajo">
                            <th class="separador abajo">Material</th>
                            <th>Precio</th>
                        </tr> 
                        <?php 

                        $query = "SELECT * FROM precio_materiales";
                        $result = mysqli_query($con, $query); 
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td class='separador'>" . $row[1] . '</td>';
                                    echo '<td>' . $row[2] . '</td>';
                                echo "</tr>";
                                }     
                            }?> 
                            <tr>
                                <td class="aviso" colspan="2">Pueden variar de acuerdo a las condiciones del mercado y la calidad de material entregado al gestor</td>
                            </tr>
                </table>

                <div class="boton-administrar" id="calculo_peso">
                    <a class="boton rojo" name="admin"  id="admin" href="ajustar_precios.php">Administrar</a>
                </div>  

            </div>
            </div>
        </div>
            <!-- Pagina 3 -->
            <div class="page-registro" id="registro">
                <div class=formulario>
                    <fieldset>
                        <legend><h1>Registrar datos</h1></legend>

                        <div class="form-column">

                            <div class = "verificador v-nombre">
                                <label for="nombres">Nombre: </label><br>
                                <input type="text" class="box" id="nombres" name="nombres" placeholder="Ingrese su nombre..." required> 
                                <i class="icono fa-solid fa-circle-check"></i>
                            </div>

                            <div class = "verificador v-apellido">
                                <label for="apellido">Apellido: </label><br>
                                <input type="text" class="box" id="apellido" name="apellido" placeholder="Ingrese su apellido...">
                                <i class="icono fa-solid fa-circle-check"></i>
                            </div>

                        </div>

                        <div class="form-column">

                            <div class = "verificador v-cedula">
                                <label for="cedula">Cédula: </label><br>
                                <input type="text" class="box" id="cedula" name="cedula" placeholder="Ingrese su C.I...">
                                <i class="icono fa-solid fa-circle-check"></i>
                            </div>

                            <div class = "verificador v-correo">
                                <label for="correo">Correo: </label><br>
                                <input type="email" class="box" id="correo" name="correo" placeholder="Ingrese un correo...">
                                <i class="icono fa-solid fa-circle-check"></i>
                            </div>

                        </div>

                        <div class="form-column">

                            <div class = "verificador v-telefono">
                                <label for="celular">Teléfono: </label><br>
                                <input type="text" class="box" id="celular" name="celular" placeholder="Ingrese un número telefónico...">
                                <i class="icono fa-solid fa-circle-check"></i>
                            </div> 

                            <div> 
                                
                            </div>      
                        </div>   

                        <div class = "verificador v-direccion">
                                <label for="direccion">Dirección:</label><br>
                                <textarea class="box" id="direccion" name="direccion" placeholder="Ingrese su dirección (opcional)"></textarea> 
                        </div> 


                    </fieldset>

                    <input type="submit" class = "boton" name="enviar" value="Registrar Datos">
                </div>
            </div>
        </div>
    </form>
    <footer id="about">
        <div class="contenedor">
        <div class="caja">
            <h2> Acerca de: </h2>
            <p>
                Este proyecto ha sido realizado para incentivar el reciclaje
            </p>
        </div>
        <div class="caja">
            <h2> Sistema desarrollado por </h2>
            <p>
                <li><a href="#">Jefferson Rios</a></li>   
                <li><a href="#">Jeremy Castro</a></li>
            </p>
        </div>
        <div class="caja">
            <h3>ISMAC</h3>
            <p>Enlaces Instituto Tecnologico ISMAC.</p>
                <li><a href="https://ismac.edu.ec/">Web Ismac</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
        </div>
    </div>
    <div class="caja-redes">
        <div class="derechos">
        <h4>Redes</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="redes">
            <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></a></i></li>
                <li><a class="linkedin" href="#"><i class="fa-brands fa-twitter"></a></i></li>
                <li><a class="linkedin" href="#"><i class="fa-brands fa-twitter"></a></i></li> 
                <li><a class="linkedin" href="#"><i class="fa-brands fa-twitter"></a></i></li>            
            </ul>
        </div>
    </div>
    </footer>
</body>
</html>
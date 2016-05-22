<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Control de Asistencia Alumno - FISI</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="datosAlumno.css">
    <link rel="stylesheet" type="text/css" href="general.css">
</head>
<body>
	<header class="central-Cabecera">
        <div class="cabecera-Imagen">
            <img src="imagenes/unmsm.png">
        </div>
        <h1>Sistema de Control de Asistencia</h1>
        <h2>Facultad de Ingeniería de Sistemas e Informática - UNMSM</h2>
    </header>
    <nav class="central-Navegador">
        <ul class="navegador-Lista">
            <li class="lista-Desplegable">
                <a href="principal.php">Inicio</a>
            </li>
            <li>
                <a href="registrar.php">Registrar</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
        </ul>
    </nav>
    <section class="central-Seccion">
		<h2>DATOS DEL ALUMNO</h2>
		<table>
		  <tr>
		    <th>Código</th>
		    <th>Nombre</th> 
		    <th>Apellido</th>
		    <th>Sexo</th>
		  </tr>

		<?php
		session_start();
		include("conexion.php");
		define("esp","<br/>");
		if(isset($_SESSION['codigo']) && !empty($_SESSION['codigo'])){
			$codigoAlumno=$_SESSION['codigo'];
		}else{
			$codigoAlumno = $_POST['codigo'];
			$_SESSION['codigo']=$codigoAlumno;
		}

		if(isset($codigoAlumno) && !empty($codigoAlumno)){
			$con=mysql_connect($host,$user,$pw) or die("Problemas al conectar");
			mysql_select_db($db,$con) or die("Problemas con base de datos");
			$consulta=mysql_query("SELECT * FROM persona WHERE IDPERSONA = '$codigoAlumno'");
			while($fila=mysql_fetch_array($consulta)){
				echo "<tr>
				    <td>".esp.$fila['IDPERSONA']."</td>
				    <td>".esp.$fila['NOMBRE']."</td> 
				    <td>".esp.$fila['APELLIDO']."</td>
		    		<td>".esp.$fila['SEXO']."</td>
		  		</tr>";
			}
		}else{
			echo "No se seleccionó información";
		}		
		echo "</table>";
		echo "<h4>SELECCIONAR RANGO DE FECHAS:</h4>";
		echo "<form action='busquedaCurso.php' method='post' name='form02' id='form001'>
			<p>Fecha inicio:<input type='date' name='fechaInicio' id='f01'/></p>
			<p>Fecha límite:<input type='date' name='fechaLimite' id='f02'/></p><br/>
			<input type='submit' value='Enviar'/>
		</form>";
		
		?>

	</section>
	<footer class="central-Pie">
        <div id="seccionPie" class="pie-CuadroInformativo"> 
            <h3>Cuadro Informativo</h3>  
            <h5>Redes Sociales: <a href="https://www.facebook.com">Facebook</a></h5>
            <h5>Correo: controlasistencia@gmail.com</h5>
            <h5>Teléfonos: 999999999 / 999999998</h5>
        </div>
        <div class="pie-Copyright">
            &copy;2015 <strong>DOOR PEOPLE GROUP S.A.</strong>
        </div>
    </footer>
</body>
</html>
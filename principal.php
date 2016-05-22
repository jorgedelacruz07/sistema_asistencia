<!DOCTYPE html>
<html lang="es">
<head>
    <title>Sistema de Control de Asistencia Alumno - FISI</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="home.css">
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
		<h2>BUSCAR ALUMNO</h2>
		<form action="principal.php" method="post" name="form" id="formulario">
			<p>
				Por nombre:<input id="form1" type="text" name="nombreAlumno"/>
			</p>
			<p>
				Por código:<input id="form2" type="text" name="codigoAlumno"/>
			</p>
			<br/>
			<input id="but" type="submit" name="enviar" value="Buscar"/>
		</form>
		<p>
		<br/><br/>
		<h4>LISTA DE ESTUDIANTES:</h4>
		
		<?php
		define("esp", "<br/>");
		include("conexion.php");
		$nombreA=$_POST['nombreAlumno'];
		$codigoA=$_POST['codigoAlumno'];
		if(isset($nombreA) && !empty($nombreA)){
			$con=mysql_connect($host,$user,$pw) or die("Problemas al conectar");
			mysql_select_db($db,$con) or die("Problemas al conectar con db");
			if(strlen($nombreA)>8){
				$tok = strtok($nombreA, " ");
				$i = 0;
				while($tok!== false){
					$array[$i]=$tok;
					$i++;
					$tok = strtok(" ");
				}
				$nombre1=$array[0];
				$nombre2=$array[1];
				$lista = mysql_query("SELECT * FROM persona WHERE ( (NOMBRE LIKE '%$nombre1%') AND (APELLIDO LIKE '%$nombre2%')
					OR (APELLIDO LIKE '%$nombre1%') AND (APELLIDO LIKE '%$nombre2%')
					OR (NOMBRE LIKE '%$nombre1%') AND (NOMBRE LIKE '%$nombre2%')
					OR (APELLIDO LIKE '%$nombre1%') AND (NOMBRE LIKE '%$nombre2%') )")
				or die("No se pudo realizar consulta".mysql_error());
			}else{
				$lista=mysql_query("SELECT * FROM persona WHERE (NOMBRE LIKE '%$nombreA%') OR (APELLIDO LIKE '%$nombreA%')")
				or die("No se pudo realizar consulta".mysql_error());
			}
			$fila=mysql_fetch_array($lista);
			if(isset($fila) && !empty($fila)){
				echo "<form action='datosAlumno.php' method='post' name='form01'>";
				echo "<p id='f01'>";
				$cod=$fila['IDPERSONA'];
				$nomCompleto=$fila['NOMBRE']." ".$fila['APELLIDO'];
				echo "<input type='radio' name='codigo' value='$cod' checked>".$nomCompleto."<br/><br/>";
				while($fila=mysql_fetch_array($lista)){
					$cod=$fila['IDPERSONA'];
					$nomCompleto=$fila['NOMBRE']." ".$fila['APELLIDO'];
					echo "<input type='radio' name='codigo' value='$cod' checked>".$nomCompleto."<br/><br/>";
				}
				echo "</p><input type='submit' value='Entrar'/></form>";
			}else{
				echo "<form action='principal.php' method='post' name='form01'>";
				echo "<p id='f01'>";
				echo "No se encontró nombre. Vuelva a intentarlo.".esp;
				echo "</p><input type='submit' value='Actualizar'/></form>";
			}
		}else if(isset($codigoA) && !empty($codigoA)){
			$con=mysql_connect($host,$user,$pw) or die("Problemas al conectar");
			mysql_select_db($db,$con) or die("Problemas al conectar con db");
			$lista=mysql_query("SELECT * FROM persona WHERE IDPERSONA LIKE '%$codigoA%'")
			or die("No se pudo realizar consulta".mysql_error());
			$fila=mysql_fetch_array($lista);
			if(isset($fila) && !empty($fila)){
				echo "<form action='datosAlumno.php' method='post' name='form01'>";
				echo "<p id='f01'>";
				$cod=$fila['IDPERSONA'];
				$nomCompleto=$fila['NOMBRE']." ".$fila['APELLIDO'];
				echo "<input type='radio' name='codigo' value='$cod' checked>".$nomCompleto."<br/><br/>";
				while($fila=mysql_fetch_array($lista)){
					$cod=$fila['IDPERSONA'];
					$nomCompleto=$fila['NOMBRE']." ".$fila['APELLIDO'];
					echo "<input type='radio' name='codigo' value='$cod' checked>".$nomCompleto."<br/><br/>";
				}
				echo "</p><input type='submit' value='Entrar'/></form>";
			}else{
				echo "<form action='principal.php' method='post' name='form01'>";
				echo "<p id='f01'>";
				echo "No se encontró código. Vuelva a intentarlo.".esp;
				echo "</p><input type='submit' value='Actualizar'/></form>";
			}
		}else{
			echo "<label>No se ha seleccionado búsqueda</label>";
		}

		?>

		</p>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Control de Asistencia Alumno - FISI</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="busquedaCurso.css">
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
    	<h2>SELECCIONAR CURSO:</h2>

		<?php
		session_start();
		define("esp","<br/>");
		$fInicio=$_POST['fechaInicio'];
		$fLimite=$_POST['fechaLimite'];
		$codigoAlumno=$_SESSION['codigo'];
		$_SESSION['fechaInicio']=$fInicio;
		$_SESSION['fechaLimite']=$fLimite;
		include("conexion.php");
		$con=mysql_connect($host,$user,$pw) or die("Problemas al cargar servidor");
		mysql_select_db($db,$con) or die("Problemas al cargar base de datos");
		$consultaNueva=mysql_query("SELECT * FROM persona WHERE IDPERSONA='$codigoAlumno'");
		while ($filaNueva=mysql_fetch_array($consultaNueva)) {
			echo "Nombre: ".$filaNueva['NOMBRE']." ".$filaNueva['APELLIDO'].esp.esp;
			echo "Codigo: ".$codigoAlumno.esp.esp;
		}
		
		// VER TODAS LAS ASISTENCIAS DE UN ALUMNO
		// SELECT curso.NOMBRE_CURSO, clase.FECHA, asistencia.HORA_MARCADO, asistencia.ESTADO_ASISTENCIA FROM asistencia
		// INNER JOIN clase ON asistencia.IDCLASE = clase.IDCLASE
		// INNER JOIN grupo_curso ON clase.IDGRUPO = grupo_curso.IDGRUPO
		// INNER JOIN curso ON grupo_curso.IDCURSO = curso.IDCURSO
		// WHERE asistencia.IDALUMNO = '13200049';
		echo "Fecha inicio: ".$fInicio.esp.esp."Fecha limite: ".$fLimite.esp.esp;
		$lista=mysql_query("SELECT curso.IDCURSO, curso.NOMBRE_CURSO FROM curso 
			INNER JOIN grupo_curso ON curso.IDCURSO = grupo_curso.IDCURSO
			INNER JOIN clase ON grupo_curso.IDGRUPO = clase.IDGRUPO
			INNER JOIN asistencia ON clase.IDCLASE = asistencia.IDCLASE
			WHERE (asistencia.IDALUMNO='$codigoAlumno') AND
			(clase.FECHA BETWEEN '$fInicio' AND '$fLimite')
			GROUP BY curso.IDCURSO")
		or die("No se pudo realizar consulta".mysql_error());
		echo "<h4>CURSO(S):</h4>";
		$filaNueva=mysql_fetch_array($lista);
		if(isset($filaNueva) && !empty($filaNueva)){
			echo "<form action='detalleAsistencia.php' method='post' name='form01'>";
			$codCurso=$filaNueva['IDCURSO'];
			$nomCurso=$filaNueva['NOMBRE_CURSO'];
			echo "<input type='radio' name='curso' value='$codCurso' checked>".$nomCurso."<br>";
			while($filaNueva=mysql_fetch_array($lista)){
				$codCurso=$filaNueva['IDCURSO'];
				$nomCurso=$filaNueva['NOMBRE_CURSO'];
				echo "<input type='radio' name='curso' value='$codCurso' checked>".$nomCurso."<br>";
			}
			echo esp.esp."<input type='submit' value='Mostrar'/>";
			echo "</form>";
		}else{
			echo "<form action='datosAlumno.php' method='post' name='form01'>";
			echo "No se ha registrado asistencia a clases en este rango de tiempo";
			echo esp.esp."<input type='submit' value='Volver'/>";
			echo "</form>";
			session_start();
			$_SESSION['codigo']=$codigoAlumno;
		}

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
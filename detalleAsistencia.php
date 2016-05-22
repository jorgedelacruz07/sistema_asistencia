<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Control de Asistencia Alumno - FISI</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="detalleAsistencia.css">
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
		<h2>DETALLE DEL CONTROL DE ASISTENCIA</h2>
		<?php 
		session_start();
		define("esp", "<br/>");
		include("conexion.php");
		$curso=$_POST['curso'];
		$codigoAlumno=$_SESSION['codigo'];
		$fInicio=$_SESSION['fechaInicio'];
		$fLimite=$_SESSION['fechaLimite'];
		$con=mysql_connect($host,$user,$pw) or die("Problemas al cargar servidor");
		mysql_select_db($db,$con) or die("Problemas al cargar base de datos");
		$consultaNueva=mysql_query("SELECT * FROM persona WHERE IDPERSONA='$codigoAlumno'");
		while ($filaNueva=mysql_fetch_array($consultaNueva)) {
			echo "Nombre: ".$filaNueva['NOMBRE']." ".$filaNueva['APELLIDO'].esp.esp;
			echo "Codigo: ".$filaNueva['IDPERSONA'].esp.esp;
		}
		$consultaNueva=mysql_query("SELECT * FROM curso WHERE IDCURSO='$curso'");
		while ($filaNueva=mysql_fetch_array($consultaNueva)) {
			echo "Curso: ".$filaNueva['NOMBRE_CURSO'].esp.esp;
		}
		echo "Control de asistencia entre <strong>".$fInicio."</strong> y <strong>".$fLimite."</strong>:".esp.esp;
		
		// MODIFICAR asistencia POR clase
		// $consultaNueva=mysql_query("SELECT curso.NOMBRE_CURSO, clase.FECHA, asistencia.HORA_MARCADO, 
		// 	asistencia.ESTADO_ASISTENCIA FROM curso 
		// 	INNER JOIN grupo_curso ON curso.IDCURSO = grupo_curso.IDCURSO 
		// 	INNER JOIN clase ON grupo_curso.IDGRUPO = clase.IDGRUPO
		// 	INNER JOIN asistencia ON clase.IDCLASE = asistencia.IDCLASE 
		// 	WHERE asistencia.IDALUMNO='$codigoAlumno' AND curso.IDCURSO='$curso' AND 
		// 	-- MODIFICAR asistencia POR clase
		// 	(clase.FECHA BETWEEN '$fInicio' AND '$fLimite')")
		// or die("problemas al conectar");

		$consultaNueva=mysql_query("SELECT curso.NOMBRE_CURSO, clase.FECHA, asistencia.HORA_MARCADO, 
			asistencia.ESTADO_ASISTENCIA FROM asistencia 
			INNER JOIN clase ON asistencia.IDCLASE = clase.IDCLASE
			INNER JOIN grupo_curso ON clase.IDGRUPO = grupo_curso.IDGRUPO 
			INNER JOIN curso ON grupo_curso.IDCURSO = curso.IDCURSO 
			WHERE asistencia.IDALUMNO='$codigoAlumno' AND curso.IDCURSO='$curso' AND 
			(clase.FECHA BETWEEN '$fInicio' AND '$fLimite')")
		or die("problemas al conectar");
		echo "<h4>CONTROL DE ASISTENCIA</h4>";
		echo "
		<table>
			<tr>
				<th>Fecha</th>
				<th>Hora de marcado</th> 
				<th>Estado de asistencia</th>
			</tr>";
		$filaNueva=mysql_fetch_array($consultaNueva);
		if(isset($filaNueva) && !empty($filaNueva)){
			echo "<tr>
				    <td>".esp.$filaNueva['FECHA']."</td>
				    <td>".esp.$filaNueva['HORA_MARCADO']."</td> 
				    <td>".esp.$filaNueva['ESTADO_ASISTENCIA']."</td>
		  		</tr>";
			while ($filaNueva=mysql_fetch_array($consultaNueva)) {
				echo "<tr>
					    <td>".esp.$filaNueva['FECHA']."</td>
					    <td>".esp.$filaNueva['HORA_MARCADO']."</td> 
					    <td>".esp.$filaNueva['ESTADO_ASISTENCIA']."</td>
			  		</tr>";
			}
			echo "</table>".esp;
		}else{
			echo "No se han encontrado registros de asistencia. Vuelva a intentarlo.";
			echo "</table>".esp;
		}
		echo "<h4>ESTADÍSTICAS</h4>";
		echo "Estadística general sobre la asistencia del alumno en este curso:".esp.esp;
		$consultaNueva=mysql_query("SELECT COUNT(clase.FECHA) FROM clase
		INNER JOIN grupo_curso ON clase.IDGRUPO = grupo_curso.IDGRUPO
		INNER JOIN asistencia ON clase.IDCLASE = asistencia.IDCLASE
		WHERE grupo_curso.IDCURSO='$curso' AND asistencia.IDALUMNO='$codigoAlumno' AND
		(clase.FECHA BETWEEN '$fInicio' AND '$fLimite')")
		or die("No se realizo query");
		$fila=mysql_fetch_array($consultaNueva);
		$cont1=$fila[0];
		
		$consultaNueva=mysql_query("SELECT COUNT(clase.FECHA) FROM clase
		INNER JOIN grupo_curso ON clase.IDGRUPO = grupo_curso.IDGRUPO
		INNER JOIN asistencia ON clase.IDCLASE = asistencia.IDCLASE
		WHERE grupo_curso.IDCURSO='$curso' AND asistencia.IDALUMNO='$codigoAlumno' AND
		(clase.FECHA BETWEEN '$fInicio' AND '$fLimite') 
		AND asistencia.ESTADO_ASISTENCIA='Asistio'")
		or die("No se realizo query");
		$fila=mysql_fetch_array($consultaNueva);
		$cont2=$fila[0];
		// echo "cont1: ".$cont1.esp;
		// echo "cont2: ".$cont2.esp;
		$div=$cont1/$cont2;
		$porc=$div*100;
		echo "- Ha asistido a <strong>".$cont1." clase(s)</strong> de un total de <strong>".$cont2." clase(s)</strong>.".esp.esp;
		echo "- Porcentaje: ".$porc."%".esp.esp;

		?>
		<form action="principal.php" method="post" name="frm">
			<input type="submit" value="Inicio"/>
		</form>

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
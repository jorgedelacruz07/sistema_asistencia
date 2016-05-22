<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Control de Asistencia Alumno - FISI</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="busquedaCurso.css">
    <link rel="stylesheet" type="text/css" href="general.css">
    <script src="jquery-1.7.1.min.js"></script>
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
    	<h2>REGISTRAR USUARIO:</h2>
		<form action="principal.php" method="post" name="form">
            Usuario
            <select>
                <option selected name="tipoUsuario" >Director de Escuela</option>
                <option>Alumno</option>
                <option>Docente</option>
                <option>Encargado</option>
            </select>
			<p>Nombre: <input type="text" name="nombre" placeholder="Ej. Camilo Gerardo"/></p>
			<p>Apellido: <input type="text" name="apellido" placeholder="Ej. Armas Yalico"/></p>
			<p>Código: <input type="text" name="usuario" placeholder="Ej. camiloarmas01"/></p>
			<p>Contraseña: <input type="password" name="password" /></p>
			<p>Repetir contraseña: <input type="password" name="password2" /></p>
			<p><input type="submit" name="enviar" value="Registrar"/></p>
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
            &copy;2015 <strong> HABLAGÜEN CREW</strong>
        </div>
    </footer>
</body>
</html>
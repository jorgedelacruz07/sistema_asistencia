<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Control de Asistencia Alumno - FISI</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login.css">
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
        <h2>LOGIN</h2>
		<form action="principal.php" method="post" name="form" id="frm">
            <label><strong>TIPO DE USUARIO:</strong></label>
            <select id="formu0">
                <option selected>Director Académico</option>
                <option>Docente</option>
                <option>Alumno</option>
                <option>Encargado</option>
            </select><br/><br/>
            <label><strong>USUARIO:</strong></label>
            <input id="formu1" type="text" placeholder="Usuario" /><br/><br/>
            <label><strong>CONTRASEÑA:</strong></label>
            <input id="formu2" type="password" placeholder="Contraseña" /><br/><br/><br/>
            <input id="formu3" type="submit" value="Ingresar" />
		</form>

<!-- 
            <?php 
            // include("conexion.php");
            // $usuario=$_POST['usuario'];
            // $contra=$_POST['password'];
            
            // if(isset($usuario) && !empty($usuario) && isset($contra) && !empty($contra)){
            //     $con=mysql_connect($host,$user,$pw) or die("Problemas con el servidor");
            //     mysql_select_db($db,$con);
            //     $consulta=mysql_query("SELECT * FROM persona WHERE IDPERSONA='$usuario'");
            //     while ($filaNueva=mysql_fetch_array($consulta)) {
            //         $c=$filaNueva['PASSWORD'];
            //         if(strcmp($c, $contra)==0){
            //             echo "<script>alert('Bien!')</script>";
            //         }else{
            //             echo "<script>alert('Error!')</script>";
            //         }
            //     }
            // }else{
            //     echo "No ingreso datos";
            // }

             ?>
 -->            
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
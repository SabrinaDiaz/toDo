<?php

include('funciones.php');

session_start();

sessionNoValida($_SESSION['id_usuario'],'Location: login.php');

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$id = $_GET["id_usuario"];
$password = $_GET["clave"];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar password</title>
		<link rel="stylesheet" type ="text/css" href="style.css">
</head>

<body id="modificar">
	<div class="modificar">
	<h2>Modificar password</h2><br></br>
	<form method="post">
	<div class="inputBox">
		<input type="text" name = "cambiar" value= "<?php echo $password; ?> " required >
		<input type="hidden" name = "id" value= "<?php echo $id; ?> " >
		<p><input type="submit" value = "Guardar cambios" ></p>
		</div>
	</form>
	</div>
</table>
</body>
</html>

<?php

//ACTUALIZAR PASSWORD
if (empty($_POST)==false){ 


if(empty($_POST['cambiar'])){
	die("<br> <br> No hubo modificacion");
} else {

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

if (trim(($_POST['cambiar'])) == "" ){
	echo'<center><font color="#fff" size="5" face="MS Sans Serif" style="position:absolute;top:420px;left:469px;"> Error, no se ingreso contraseña <center></font>';
	 die();
}

$id = $_POST["id"];
$passwordNuevo = $_POST['cambiar'];

$password_encriptado = password_hash($passwordNuevo,PASSWORD_BCRYPT);

//correccion de tp
$traerPassword = 'select clave from usuario where id_usuario=$id';

$coinciden = password_verify($passwordNuevo, $traerPassword);

$sql = 'update usuario set clave= "'.$password_encriptado.'" where id_usuario= "'.$id.'"';

$respuesta_consulta = mysqli_query($conexion, $sql);

if ($respuesta_consulta == false) {

 die("No coinciden las contraseñas");
}

 { ?>
<center><font color="#fff">  Cambios realizados <center></font>

<br><a href='mostrarUsuarios.php'> Ir a la lista de usuarios </a>
<br><a href='listarTareas.php'> Ir a la lista de tareas </a>
<br><a href='cerrarSesion.php'> Cerrar sesion </a>
<?php }
}
}
?>
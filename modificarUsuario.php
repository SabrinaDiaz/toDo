<?php

//EDITAR EMAIL

session_start();

if (isset($_SESSION['id_usuario']) == false) {
  header('Location: login.php');
}

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$id = $_GET["id_usuario"];
$email = $_GET["email"];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar email</title>
	<link rel="stylesheet" type ="text/css" href="/css/style.css">
 	<body id="actualizar">
</head>
<div class ="actualizar">
	<h1><center> Modificar email </center></h1>
	<form method="post">
		<div class="inputBox">
		<p><center><input type="email" name = "modificar" value= "<?php echo $email; ?> " required /><center></p>
		<p><center><input type="hidden" name = "id" value= "<?php echo $id; ?> " ><center></p>
		<p><input type="submit" value ="Guardar cambios" > </p>

	</form>
</table>
</body>
</html>

<?php

//ACTUALIZAR EMAIL

if (empty($_POST)==false){ 
if(empty($_POST['modificar'])){
	echo "<br><br> No hubo modificacion";
	die("<br> <br> muere no se completo campo");
} else {

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$id = $_POST["id"];
$emailNuevo = $_POST['modificar'];



$sql = 'update usuario set email= "'.$emailNuevo.'" where id_usuario= "'.$id.'"';

$respuesta_consulta = mysqli_query($conexion, $sql);

if ($respuesta_consulta == false) {

 die("No se pudo ingresar el registro en la base de datos");
}
?>
 	<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
		<link rel="stylesheet" type ="text/css" href="style.css">
 
<br><center><font color="#fff" face="MS Sans Serif"> Cambios realizados <center><br></font>

<center><a href='listarTareas.php'style="color:#FF33E8;"> Volver a la lista de tareas</a><center>
<br><center><a href='cerrarSesion.php' style="color:#FF0000;"> Cerrar sesion </a><center></font>
</div>
	</body>

<?php }
}
?>
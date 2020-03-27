<?php
//IMPORTO LAS FUNCIONES QUE VOY A UTILIZAR
include('funciones.php');

//INICIO SESION
session_start();

//VALIDAR EL ID DEL USUARIO
sessionNoValida($_SESSION['id_usuario'],'Location: login.php');

verificarQueIngresoDatos($_GET['id_tarea']);

verificarQueIngresoDatos($_GET['descripcion']);

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$id = $_GET["id_tarea"];
$descripcionTarea = $_GET["descripcion"];

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar tarea</title>
<link rel="stylesheet" type ="text/css" href="../css/style.css">
<body id="editar" >
	<div class="titulo">
		<h2>Modificar tarea</h2>
	</div>
	<!--no se pone al action para q no se pierda el id que se esta mandando de listar tareas-->
	<form method="post">
		<div class="inputBox">
			<br><input type="text" name = "modificar" value= "<?php echo $descripcionTarea; ?> " required >
			<input type="hidden" name = "id" value= "<?php echo $id; ?> " >
		</div>
		<div class="inputBox">
			<br><input type="submit" value= "Guardar cambios" >
		</div>
	</form>
</div>
</body>
</html>

<?php
//Modificar tarea

if (empty($_POST)==false){ 
	
verificarQueIngresoDatos($_POST['modificar']);

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$id = $_POST["id"];
$tareaNueva = $_POST['modificar'];

$sql = 'update lista_tareas set descripcion= "'.$tareaNueva.'" where id_tarea= "'.$id.'"';

$respuesta_consulta = mysqli_query($conexion, $sql);

if ($respuesta_consulta == false) {
{ ?>
<br><center><font color="#fff" size="4" face="MS Sans Serif"> No se pudieron realizar los cambios <center></font>

<?php }

 die("No se pudo ingresar el registro en la base de datos");
}
 { ?>
<center><font color="#fff" size="5" face="MS Sans Serif">  Cambios realizados <center></font>

	<a href='listarTareas.php'> Volver a la lista de tareas</a>
<br><a href='cerrarSesion.php'> Cerrar sesion </a>
<?php }
}

?>
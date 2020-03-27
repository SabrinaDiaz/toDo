<?php

//PARA USAR LAS FUNCIONES
include('funciones.php');

session_start();

sessionNoValida($_SESSION['id_usuario'],'Location: login.php');

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$id = $_GET["id_tarea"]; //va get porque la data va por un href en lista de tareas

$sql = 'delete from lista_tareas where id_tarea= "'.$id.'"';

$respuesta_consulta = mysqli_query($conexion, $sql);

if ($respuesta_consulta == false) {

 die("No se pudo borrar la tarea ");
} else {
 { ?>
 	<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar password</title>
		<link rel="stylesheet" type ="text/css" href="style.css">
 	<body id="borrar">
<div class ="borrar">
<br></br><center><font color="#fff" face="MS Sans Serif" size="6"> Se borro la tarea <center><br><img src='like.png'/></font>

	<br><a href='listarTareas.php'> Volver a la lista de tareas</a>
<br><a href='cerrarSesion.php'> Cerrar sesion </a>
</div>
	</body>

<?php }

}
?>

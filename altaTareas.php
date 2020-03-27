<!DOCTYPE html>
<html>
<head>
	<title> Agregar tareas  </title>
	<link rel="stylesheet" type ="text/css" href="../css/style.css">
	<meta charset="utf-8"> <!--se pone para que reconozca las ñ y tildes-->
</head>
<body id="tarea">
	<div class="titulo">
		<form action="altaTareas.php" method="post">
			<div class="titulo-tarea">
				<h1> Agrege una tarea </h1>
			</div>
			<div class="inputBox">
				<p> Tarea <input type="text" name="descripcion" required></p>
				<p> Fecha realizada <input type="date" name="realizada" required></p>
				<p> Fecha limite <input type="date" name="fechaLimite" required></p> 
				<p> Finalizo la tarea <input type="checkbox" name="finalizada" value ="1" ></p>
				<input type="submit" value = "Guardar" >
			</form>
		</div>	
</body>
</html>

<?php

//IMPORTO LAS FUNCIONES QUE VOY A UTILIZAR
include('funciones.php');

session_start();

sessionNoValida($_SESSION['id_usuario'],'Location: login.php');

//SI REALIZO LA ACCION DE GUARDAR RECIEN SE VALIDAN LOS CAMPOS
if(!empty($_POST)){

//validaciones por cuestion de seguridad
//VALIDAR QUE LOS CAMPOS NO ESTEN VACIOS
verificarQueIngresoDatos($_POST['descripcion']);

if(empty($_POST["finalizada"])){
	$tareafinalizada = 0;
} else {
	$tareafinalizada = 1 ;
}

$descripcionTarea = $_POST["descripcion"];
$fechaRealizada = $_POST["realizada"];
$fechaLimite = $_POST["fechaLimite"];

$conexion = mysqli_connect("localhost", "root", "", "to-do") or die("<br>no se pudo conectar<br>");


$sql = 'insert into lista_tareas (descripcion,fecha_realizada,fecha_limite,finalizo) 
values("'.$descripcionTarea.'","'.$fechaRealizada.'","'.$fechaLimite.'","'.$tareafinalizada.'")';

$respuesta_consulta = mysqli_query($conexion, $sql);
if ($respuesta_consulta == false) {
 die("No se pudo agregar la tarea");
}
 { ?>
 	
<font color="#fff" size="5" face="MS Sans Serif">  Cambios realizados</font>

	<br><a href='listarTareas.php'> Volver a la lista de tareas</a><center>
<br><a href='cerrarSesion.php'> Cerrar sesion </a>
<?php }
}
?>
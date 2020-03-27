<?php

include 'funciones.php';

session_start();

sessionNoValida($_SESSION['id_usuario'],'Location: login.php');

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$filtro= "";

if(isset($_GET["filtro"])){
	$filtro = $_GET["filtro"];
}

$sql ="select * from usuario where usuario like '%$filtro%'";

$resultado = mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado usuarios</title>
		<link rel="stylesheet" type ="text/css" href="../css/style.css">
</head>

<body >
	<div class="titulo">
	<h1>Lista de usuarios</h1>
</div>
	<form action="mostrarUsuarios.php" method="get">
		<div class="form-filter">
		<input type="text" name="filtro" placeholder="Usuario" value="<?php echo $filtro; ?>">
		</div>

		<div class="form-filter">
		<input type="submit" value= "Filtrar" ></p>
		</div>
		<a href="altaTareas.php"> Agregar tarea </a>
		<a href='listarTareas.php'> Lista de tareas</a>
		<a href='cerrarSesion.php'> Cerrar sesion </a>
</div>
	</form>
	<table>
	<tr>
		<th >Id</th>
		<th>Nombre</th>
		<th >Apellido </th>
		<th >E-mail</th>
		<th >Usuario</th>
		<th >Contraseña</th>
		<th >Fecha creada</th>
	</tr>
	</div>

<?php
	while($fila = mysqli_fetch_array($resultado)) {
		$id = $fila["id_usuario"];
		$nombre = $fila["nombre"];
		$apellido = $fila["apellido"];
		$email = $fila["email"];
		$usuario = $fila["usuario"];
		$password = $fila["clave"];
		$fechaCreada = $fila["fecha_creada"];
		echo "<tr>";
		echo "<td><center>$id</center></td>";
		echo "<td>$nombre </td>";
		echo "<td>$apellido</td>";
		echo "<td>$email <a href='editarUsuario.php?id_usuario=$id&email=$email'><img src='1.png'/></a></td>";
		echo "<td>$usuario</td>";
		echo "<td>$password <a href='actualizarPassword.php?id_usuario=$id&clave=$password'><img src='1.png'/></a></td>";
		echo "<td><center>$fechaCreada</center></td>";
		echo "</tr>";
	}
?>
</table>
</body>
</html>
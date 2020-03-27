<?php

include('funciones.php');

session_start();

sessionNoValida($_SESSION['id_usuario'],'Location: login.php');

$conexion = mysqli_connect("localhost","root","","to-do") or die("no se establecio conexion");

$filtro= "";

if(isset($_GET["filtro"])){
	$filtro = $_GET["filtro"];
}

$sql ="select * from lista_tareas where descripcion like '%$filtro%' or fecha_realizada like '%$filtro%' 
or fecha_limite like '%$filtro%' or finalizo like '%$filtro%' ";

$resultado = mysqli_query($conexion,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado agenda</title>
	<link rel="stylesheet"  href="../css/style.css">
</head >
<body>
	<div class="titulo">
		<h1> Lista de tareas</h1>
	</div>
		<form action="listarTareas.php" method="get">
			<div class="inputBox">
				<input type="text" name="filtro" placeholder="Nombre" value="<?php echo $filtro; ?>">
			</div>
			<div class="inputBox">
				<input type="submit" value= "Filtrar" ></p>
			</div>
				<a href="altaTareas.php"> Agregar tarea </a>
					<a href='listaUsuarios.php'> Lista de usuarios</a>
					<a href='cerrarSesion.php'> Cerrar sesion </a>
				</div>
			</form>
			<table>
				<tr>
					<th>Id tarea</th>
					<th>Descripcion</th>
					<th>Fecha realizada </th>
					<th>Fecha limite</th>
					<th>Tarea finalizada</th>
				</tr>
			</div>

			<?php
			while($fila = mysqli_fetch_array($resultado)) {
				$id = $fila["id_tarea"];
				$descripcionTarea = $fila["descripcion"];
				$fechaRealizada = $fila["fecha_realizada"];
				$fechaLimite = $fila["fecha_limite"];
				$tareafinalizada = $fila["finalizo"];

				echo "<tr>";
				echo "<td><center>$id</center></td>";
				echo "<td>$descripcionTarea <a href='modificarTarea.php?id_tarea=$id&descripcion=$descripcionTarea'><img src='1.png'/>
				<a href='borrarTarea.php?id_tarea=$id'><img src='cancel.png'/></td>";
				echo "<td><center>$fechaRealizada</center></td>";
				echo "<td><center>$fechaLimite</center></td>";
				echo "<td><center>$tareafinalizada</center></td>";
				echo "</tr>";
			}
			?>
		</table>
</body>
</html>
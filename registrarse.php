<!DOCTYPE html>
<html>
<head>
	<title> Agregar usuario </title>
	<link rel="stylesheet" type ="text/css" href="../css/style.css">
	<meta charset="utf-8"> <!-- se pone para que reconozca las ñ y tildes-->
</head>
<body>

		<h1>Abri una cuenta</h1>
		<form action="registrarse.php" method="post">
			<div class="registro">
			<div class="inputBox">
				<input type="text" name="nombre" placeholder ="Nombre" required/>
			</div>
			<div class="inputBox">
				<input type="text" name="apellido" placeholder="Apellido"  required/>
			</div>
			<div class="inputBox">	
				<input type="email" name="email" placeholder="Email" required/>
			</div>
			<div class="inputBox">
				<input type="text" name="usuario" placeholder="Usuario" required/>
			</div>
			<div class="inputBox">	
				<input type="password" name="password" placeholder="Contraseña" required/>
			</div>
			<div class="inputsubmit">
				<input type="submit"  value = Registrarse ></p>
			</div>
		</div>
	</form>
	</div>
</body>
</html>

<?php

include('funciones.php');

if (!empty($_POST)){
//validaciones por cuestion de seguridad

verificarQueIngresoDatos($_POST['nombre']);
verificarQueIngresoDatos($_POST['apellido']);
verificarQueIngresoDatos($_POST['email']);
verificarQueIngresoDatos($_POST['usuario']);
verificarQueIngresoDatos($_POST['password']);

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

$fecha= date("Y-m-d");

$conexion = mysqli_connect("localhost", "root", "", "to-do");

$password_encriptado = password_hash($password,PASSWORD_BCRYPT);

$sql = 'insert into usuario (nombre,apellido,email,usuario,clave,fecha_creada)
  values("'.$nombre.'","'.$apellido.'","'.$email.'","'.$usuario.'","'.$password_encriptado.'","'.$fecha.'")';

$respuesta_consulta = mysqli_query($conexion, $sql);
if ($respuesta_consulta == false) {
 die("El nombre de usuario ya existe");
} else {
	session_start();
		$_SESSION["id_usuario"] = $id;
		header('Location: login.php');
}

}

?>

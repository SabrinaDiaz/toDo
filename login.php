<?php

//IMPORTO LAS FUNCIONES QUE VOY A UTILIZAR
include('funciones.php');

 /* cuando el formulario esta en el mismo archivo siempre va este if porque cuando se aprieta el boton enviar recien se ejecuta el php */
if (empty($_POST)==false){

//validaciones por cuestion de seguridad
verificarQueIngresoDatos($_POST['usuario']);
verificarQueIngresoDatos($_POST['password']);

$conexion = mysqli_connect("localhost", "root", "", "to-do");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$fecha= date("Y-m-d");

$sql= 'select * from usuario where usuario='."'".$usuario."'";

$resultado = mysqli_query($conexion, $sql);

$unaFila = mysqli_fetch_array($resultado);
$pass =  $unaFila["clave"];
$id =  $unaFila["id_usuario"];
 //te trae toda la fila pero solo vas a usar la contraseña
//echo "<br><br>$pass";
//$coinciden = password_verify ($password,$pass);

if($unaFila){
	$coinciden = password_verify($password,$pass);	
	if($coinciden == true ){
		session_start();
		$_SESSION["id_usuario"] = $id;
		header('Location: listarTareas.php');
	} else {
		echo 'Contraseña incorrecta'; 
	}
	die();
} else {}
	echo 'El usuario no esta registrado';
}

?>
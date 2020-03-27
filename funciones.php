<?php
//ESTO SE USA CUANDO NO USO EL REQUIRED EN EL HTML, VALIDA QUE EL USUARIO HAYA INGRESADO ALGO, AUNQUE SEA ESPACIOS VACIOS 
function validarDatos($dato)
{
   if(!isset($dato)){
	die("NO SE INGRESARON DATOS");
}
}

//ACA SE VALIDA QUE EL USUARIO NO HAYA INGRESADO ESPACIOS VACIOS
function verificarQueIngresoDatos($dato)
{
	if (trim($dato)== ""){
	die(" Error, no se puede ingresar un campo vacio");
}
}
//SI EL ID DEL USUARIO ES INCORRECTO, LO REDIRECCIONAMOS AL LOGIN
function sessionNoValida($sesion,$location)
{
  if (!isset($sesion)){
  		header($location);
}
}
?>
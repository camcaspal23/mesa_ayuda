<?php 

//a partir de aqui se envia el parametro de conexion a la base de datos
//de aui se invoca a todos los controladores por donde pase el usuario.

require_once "Modelo/conexiondb.php";

include "Controlador/inicio.controlador.php";

session_start();
//el parametro de c nos sirve para involucrar las vistas
//y asi no permitimos que el usuario conosca la direccion de cada ventana
// ya que enviado al controlador este invoca a la funtion donde tiene las vistas
if (!isset($_GET['c'])) {
	# code...
	require_once "Controlador/inicio.controlador.php";
	$controlador = new InicioControlador();
	call_user_func(array($controlador,"Inicio"));
}else{
	$controlador = $_GET['c'];
	require_once "Controlador/$controlador.controlador.php";
	$controlador = ucwords($controlador)."Controlador";
	$controlador = new $controlador;
	$accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
	call_user_func(array($controlador,$accion));
}

 ?>
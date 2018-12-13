<?php 
//me lleva a la ventana principal del administrador en este caso
require_once "Modelo/ticket.php";
require_once "Controlador/login.controlador.php";
class InicioControlador{
	private $modelo;

	public function __CONSTRUCT(){
		$this->modelo = new ticket();
	}

	public function Inicio(){
		require_once "Vista/login/loginEncabezado.php";
		require_once "Vista/login/login.php";
		require_once "Vista/login/loginPie.php";
	}
	
}


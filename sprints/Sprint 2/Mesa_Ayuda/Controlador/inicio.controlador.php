<?php 
//me lleva a la ventana principal del administrador en este caso
require_once "Modelo/ticket.php";
require_once "Controlador/login.controlador.php";
class InicioControlador{
	private $modelo;

	public function __CONSTRUCT(){
		$this->modelo = new ticket();
	}
	/*
	public function Login(){
		require_once "Vista/loginEncabezado.php";
		require_once "Vista/inicio/login.php";
		require_once "Vista/loginPie.php";

		require_once "Vista/encabezado.php";
		require_once "Vista/inicio/principal.php";
		require_once "Vista/pie.php";
	}*/
	//Administrador
	public function Inicio(){

		require_once "Vista/login/loginEncabezado.php";
		require_once "Vista/login/login.php";
		require_once "Vista/login/loginPie.php";
			# code...
		
	}
	
	public function InicioAdmin(){
		require_once "Vista/encabezado.php";
		require_once "Vista/inicio/principal.php";
		require_once "Vista/pie.php";
	}
}


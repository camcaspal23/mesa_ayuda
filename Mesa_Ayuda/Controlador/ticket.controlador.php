<?php 

require_once "Modelo/ticket.php";
class ticketControlador{
	private $modelo;

	public function __CONSTRUCT(){
		$this->modelo=new ticket;
	}

	//direccionamiento de vistas a traves del controlador
	public function Inicio(){//Empleado
			require_once "Vista/empleado/encabezado.php";
			require_once "Vista/empleado/tickets/index.php";
			require_once "Vista/empleado/pie.php";
		
	}
	public function SolucionadosEmpleado(){
			require_once "Vista/empleado/encabezado.php";
			require_once "Vista/empleado/tickets/solucionados.php";
			require_once "Vista/empleado/pie.php";
		
	}
	//CrearTicketCliente
	public function Crear(){
			require_once "Vista/cliente/encabezado.php";
			require_once "Vista/cliente/tickets/index.php";
			require_once "Vista/cliente/pie.php";
		
	}
	public function AbiertosCliente(){
			require_once "Vista/cliente/encabezado.php";
			require_once "Vista/cliente/tickets/Abiertos.php";
			require_once "Vista/cliente/pie.php";
		
	}
	public function SolucionadosCliente(){
			require_once "Vista/cliente/encabezado.php";
			require_once "Vista/cliente/tickets/solucionados.php";
			require_once "Vista/cliente/pie.php";
		
	}
	public function Guardar(){
			$t = new ticket();
			$t->setDescripcion($_POST['Descripcion']);
			$t->setFechaCreacion($_POST['fechaCreacion']);

			$this->modelo->Insertar($t);
			//se direcciona a casos creados
			header("Location:?c=ticket&a=AbiertosCliente");
	}
	//Se recibe el parametro del id por la url y se direcciona a la vista
	public function SolucionarEmpleado(){
			if (isset($_GET['id'])) {
				$p=$this->modelo->Obtener($_GET['id']);
				//al vizualizar la vista se ve el id en la url
			}
			require_once "Vista/empleado/encabezado.php";
			require_once "Vista/empleado/tickets/Solucion.php";
			require_once "Vista/empleado/pie.php";
	}
	//Se reciben los parametros enviados de la Vista se guardan en los set y se envia al modelo por los get
	public function Actualizar(){
			$t= new ticket();
			$t->setIdTicket(intval($_POST['id']));
			$t->setIdAprobacion(intval($_POST['estado']));
			$t->setIdNivelCaso(intval($_POST['tipon']));
			$t->setIdUsuario(intval($_POST['usuario']));
			$t->setDescripcion($_POST['Descripcion']);
			$t->setSolucion($_POST['Solucion']);
			$t->setFechaCreacion($_POST['FechaCreacion']);
			$t->setFechaSolucion($_POST['FechaSolucion']);

		 	$this->modelo->Actualizar($t);
		 	// aqui se estan enviando los valores de $t a la funcion actualizar del modelo
		 	header("Location:?c=ticket");
	}
}
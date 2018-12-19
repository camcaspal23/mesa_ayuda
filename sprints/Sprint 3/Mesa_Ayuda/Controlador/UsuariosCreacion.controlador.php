<?php 
require_once "Modelo/usuarios.php";
class UsuariosCreacionControlador{
	private $modelo;

	public function __CONSTRUCT(){
		$this->modelo=new usuarios;
	}
	public function Crear(){
		
			$u=new usuarios();
			$titulo = 'Registro';
			$formulario = 'cración';
			$titBoton = 'Registrar';

			if (isset($_GET['id'])) {
				$u=$this->modelo->ObtenerUsuario($_GET['id']);
				$titulo = 'Actualización';
				$titBoton = 'Actualizar';
				$formulario = 'actualización';
			}
			require_once "Vista/encabezado.php";
			require_once "Vista/inicio/CrearUsuario.php";
			require_once "Vista/pie.php";
		
	}

	public function Ver(){
			# code...
			require_once "Vista/encabezado.php";
			require_once "Vista/inicio/VerUsuarios.php";
			require_once "Vista/pie.php";
		
	}
	//Se guardan parametros enviados desde la vista crearUsuario
	//y se envia al modelos por los Set desde el controlador y 
	//recepciona el Get en modelo
	public function Guardar(){
	
			$u = new usuarios();
			# code...
			//aca llegan los POST que se envian en la vista 
			//el controlador de usuario recepciona y despacha al modelo
			//por medio de los set de cada variable en el modelo
			$u->setIdUsuario(intval($_POST['idusuario']));
			$u->setIdtipousuario($_POST['tipoP']);
			$u->setIdTipoDocumento($_POST['tipoD']);
			$u->setNombre($_POST['nombre']);
			$u->setUsuario($_POST['usuario']);
			$u->setContraseniaNormal($_POST['passNormal']);
			$u->setContraseniaEncriptada($_POST['passEncriptada']);
			$u->setIdentificacion($_POST['Identificacion']);
			$u->setIdestadousuario($_POST['tipoE']);
			//Actualizar
			$u->getIdUsuario() > 0 ?//este es el condicional
			$this->modelo->Actualizar($u) ://Se ejecuta esto si el id que se esta pasando es mayor a 0, condicional verdadero.
			//Se invoca a la funcion de insertar usuario
			$this->modelo->Insertar($u);//Se ejecuta esto si el id es menor, condicional falso
			//se direcciona a usuario creados
			header("Location:?c=UsuariosCreacion&a=Ver");
		


	}
}
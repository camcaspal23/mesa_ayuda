<?php

require_once "Modelo/ticket.php";

class ticketControlador
{
    private $modelo;

    public function __CONSTRUCT()
    {
        $this->modelo = new ticket;
    }

    //direccionamiento de vistas a traves del controlador
    public function Inicio()
    {//Empleado
        # code...
        require_once "Vista/empleado/encabezado.php";
        require_once "Vista/empleado/tickets/index.php";
        require_once "Vista/empleado/pie.php";

    }

    public function SolucionadosEmpleado()
    {
        require_once "Vista/empleado/encabezado.php";
        require_once "Vista/empleado/tickets/solucionados.php";
        require_once "Vista/empleado/pie.php";

    }

    //CrearTicketCliente
    public function Crear()
    {
        $t=new ticket();
        if (isset($_GET['idTicket'])) {
            $t = $this->modelo->Obtener($_GET['idTicket']);

        }
        require_once "Vista/cliente/encabezado.php";
        require_once "Vista/cliente/tickets/index.php";
        require_once "Vista/cliente/pie.php";

        # code...

    }

    public function AbiertosCliente()
    {
        # code...
        require_once "Vista/cliente/encabezado.php";
        require_once "Vista/cliente/tickets/Abiertos.php";
        require_once "Vista/cliente/pie.php";

        # code...

    }

    public function SolucionadosCliente()
    {
        # code...
        # code...
        require_once "Vista/cliente/encabezado.php";
        require_once "Vista/cliente/tickets/solucionados.php";
        require_once "Vista/cliente/pie.php";


    }

    public function Guardar()
    {
        # code...
        $usuario = $_SESSION['usuario'];
        $t = new ticket();
        $t->setDescripcion($_POST['Descripcion']);
        $t->setIdUsuario($usuario->idUsuario);
        $t->setFechaCreacion(date('Y-m-d H:i:s'));
        $t->setCategoria($_POST['Id_CategoriaTicket']);

        $this->modelo->Insertar($t);
        //se direcciona a casos creados
        header("Location:?c=ticket&a=AbiertosCliente");


        # code...

    }

    //Se recibe el parametro del id por la url y se direcciona a la vista
    public function SolucionarEmpleado()
    {
        # code...
        # code...
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtener($_GET['id']);
            //al vizualizar la vista se ve el id en la url
        }
        require_once "Vista/empleado/encabezado.php";
        require_once "Vista/empleado/tickets/Solucion.php";
        require_once "Vista/empleado/pie.php";
    }

    public function SeguimientoEmpleado()
    {
        # code...
        # code...
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtener($_GET['id']);
            //al vizualizar la vista se ve el id en la url
        }
        require_once "Vista/empleado/encabezado.php";
        require_once "Vista/empleado/tickets/Seguimiento.php";
        require_once "Vista/empleado/pie.php";


    }

    //Se reciben los parametros enviados de la Vista se guardan en los set y se envia al modelo por los get
    public function Actualizar()
    {

        $nombreUsuario = $_SESSION['usuario'];

        $t = new ticket();
        $t->setIdTicket(intval($_POST['id']));
        $t->setIdAprobacion(intval($_POST['estado']));
        $t->setSeguimiento($_POST['Seguimiento']);
        $t->setIdNivelCaso(intval($_POST['tipon']));
        $t->setIdUsuario(intval($_POST['usuario']));
        $t->setDescripcion($_POST['Descripcion']);
        $t->setSolucion($_POST['Solucion']);
        $t->setFechaCreacion($_POST['FechaCreacion']);
        $t->setFechaSolucion($_POST['FechaSolucion']);
        $t->setUsuarioSolucion($nombreUsuario->usuario);

        $this->modelo->Actualizar($t);

        header("Location:?c=ticket");

    }

    public function ActualizarSeguimiento()
    {
        # code...
        # code...
        $s = new ticket();
        $s->setIdTicket(intval($_POST['id']));
        $s->setIdAprobacion(intval($_POST['estado']));
        $s->setIdNivelCaso(intval($_POST['tipon']));
        $s->setIdUsuario(intval($_POST['usuario']));
        $s->setDescripcion($_POST['Descripcion']);
        $s->setSeguimiento($_POST['Seguimiento']);
        $s->setSolucion($_POST['Solucion']);
        $s->setFechaCreacion($_POST['FechaCreacion']);
        $s->setFechaSolucion($_POST['FechaSolucion']);
        $s->setUsuarioSolucion($_POST['usuarioSolucion']);

        $this->modelo->ActualizarSeguimiento($s);

        header("Location:?c=ticket");

    }
}
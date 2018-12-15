<?php 

class ticket{
	private $conn;
private $conexion;
private $idTicket;
private	$idEstadoCaso;
private	$idAprobacion;
private $Seguimiento;	
private $Descripcion;
private $Solucion;
private	$idNivelCaso;
private	$idUsuario;	
private $FechaCreacion;
private	$FechaSolucion;
private	$usuarioSolucion;
public function __CONSTRUCT(){
		$this->conn = BasedeDatos::Conectar();
	}
	//getter y setter de ccada variable en base de datos.

	public function getIdTicket(){
		return $this->idTicket;
	}

	public function setIdTicket($idTicket){
		$this->idTicket = $idTicket;
	}

	public function getIdEstadoCaso(){
		return $this->idEstadoCaso;
	}

	public function setIdEstadoCaso($idEstadoCaso){
		$this->idEstadoCaso = $idEstadoCaso;
	}

	public function getIdAprobacion(){
		return $this->idAprobacion;
	}

	public function setIdAprobacion($idAprobacion){
		$this->idAprobacion = $idAprobacion;
	}

	public function getSeguimiento(){
		return $this->Seguimiento;
	}

	public function setSeguimiento($Seguimiento){
		$this->Seguimiento = $Seguimiento;
	}

	public function getDescripcion(){
		return $this->Descripcion;
	}

	public function setDescripcion($Descripcion){
		$this->Descripcion = $Descripcion;
	}
	public function getSolucion(){
		return $this->Solucion;
	}

	public function setSolucion($Solucion){
		$this->Solucion = $Solucion;
	}

	public function getIdNivelCaso(){
		return $this->idNivelCaso;
	}

	public function setIdNivelCaso($idNivelCaso){
		$this->idNivelCaso = $idNivelCaso;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getFechaCreacion(){
		return $this->FechaCreacion;
	}

	public function setFechaCreacion($FechaCreacion){
		$this->FechaCreacion = $FechaCreacion;
	}

	public function getFechaSolucion(){
		return $this->FechaSolucion;
	}

	public function setFechaSolucion($FechaSolucion){
		$this->FechaSolucion = $FechaSolucion;
	}

	public function getUsuarioSolucion(){
		return $this->usuarioSolucion;
	}

	public function setUsuarioSolucion($usuarioSolucion){
		$this->usuarioSolucion = $usuarioSolucion;
	}
	//Funciones que devuelven la consulta, una ves llamado metodo en la vista

	public function CantidadSolucionados(){
		try {
			$consulta = $this->conn->prepare("SELECT count(*) as Cantidad FROM `dbo_mesa_ayuda`.`tb_ticket` WHERE idEstadoCaso = '3';");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function CantidadAbiertos(){
		try {
			$consulta = $this->conn->prepare("SELECT count(*) as Cantidad FROM `dbo_mesa_ayuda`.`tb_ticket` WHERE idEstadoCaso = '1';");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function CantidadPlanificados(){
		try {
			$consulta = $this->conn->prepare("SELECT count(*) as Cantidad FROM `dbo_mesa_ayuda`.`tb_ticket` WHERE idEstadoCaso = '2';");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function CantidadTotal(){
		try {
			$consulta = $this->conn->prepare("SELECT count(*) as Cantidad FROM `dbo_mesa_ayuda`.`tb_ticket` ;");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Listar(){
		try {
			$consulta = $this->conn->prepare("SELECT t.idTicket, e.tipoEstado, a.TipoAprobacion, n.tipoCaso, u.usuario, t.Descripcion, t.FechaCreacion FROM `dbo_mesa_ayuda`.`tb_ticket` t INNER JOIN  `dbo_mesa_ayuda`.`tb_estadocaso` e ON(t.idEstadoCaso = e.idEstadoCaso) INNER JOIN  `dbo_mesa_ayuda`.`tb_estadoaprobacion` a ON(t.idAprobacion = a.idEstadoAprobacion) INNER JOIN  `dbo_mesa_ayuda`.`tb_nivelcaso` n ON(t.idNivelCaso = n.idNivelCaso) INNER JOIN  `dbo_mesa_ayuda`.`tb_usuario` u ON(t.idUsuario = u.idusuario) where e.tipoestado = 'Abierto';");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Insertar(ticket $t){
		try {
			$consulta="INSERT INTO `dbo_mesa_ayuda`.`tb_ticket` (`idTicket`, `idEstadoCaso`, `idAprobacion`, `Descripcion`, `Solucion`, `idNivelCaso`, `idUsuario`, `FechaCreacion`, `FechaSolucion`, `usuarioSolucion`) VALUES (NULL, '1', '3', ?, '', '4', '2', ?, '0000-00-00', '');";
			$this->conn->prepare($consulta)->execute(array(
				$t->getDescripcion(),
				$t->getFechaCreacion()
				));
		} catch (Exception $e) {
			
			die($e->getMessage());
		}
	}
	public function ListarAbierto(){
		try {
			$consulta = $this->conn->prepare("SELECT t.idTicket, e.tipoEstado, u.usuario, t.Descripcion, t.FechaCreacion FROM `dbo_mesa_ayuda`.`tb_ticket` t INNER JOIN  `dbo_mesa_ayuda`.`tb_estadocaso` e ON(t.idEstadoCaso = e.idEstadoCaso) INNER JOIN  `dbo_mesa_ayuda`.`tb_usuario` u ON(t.idUsuario = u.idusuario) where e.tipoestado = 'Abierto';");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function ListarSolucionado(){
		try {
			$consulta = $this->conn->prepare("SELECT t.idTicket, e.tipoEstado, a.TipoAprobacion, n.tipoCaso, t.usuarioSolucion, t.Solucion, t.FechaSolucion FROM `dbo_mesa_ayuda`.`tb_ticket` t INNER JOIN  `dbo_mesa_ayuda`.`tb_estadocaso` e ON(t.idEstadoCaso = e.idEstadoCaso) INNER JOIN  `dbo_mesa_ayuda`.`tb_estadoaprobacion` a ON(t.idAprobacion = a.idEstadoAprobacion) INNER JOIN  `dbo_mesa_ayuda`.`tb_nivelcaso` n ON(t.idNivelCaso = n.idNivelCaso)  where e.tipoestado = 'Solucionado';");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function Obtener($id){
		try {
			$consulta = $this->conn->prepare("SELECT t.idTicket, t.IdAprobacion, t.idNivelCaso, t.idUsuario, t.Descripcion,t.Solucion, t.FechaCreacion,t.FechaSolucion,t.usuarioSolucion,t.Seguimiento FROM `dbo_mesa_ayuda`.`tb_ticket` t INNER JOIN  `dbo_mesa_ayuda`.`tb_estadoaprobacion` a ON(t.idAprobacion = a.idEstadoAprobacion) INNER JOIN  `dbo_mesa_ayuda`.`tb_nivelcaso` n ON(t.idNivelCaso = n.idNivelCaso) INNER JOIN  `dbo_mesa_ayuda`.`tb_usuario` u ON(t.idUsuario = u.idusuario) where t.idTicket = ?;");
			$consulta->execute(array($id));

			$r=$consulta->fetch(PDO::FETCH_OBJ);
			$p=new ticket();
			$p->setIdTicket($r->idTicket);
			$p->setIdAprobacion($r->IdAprobacion);
			$p->setIdNivelCaso($r->idNivelCaso);
			$p->setIdUsuario($r->idUsuario);
			$p->setDescripcion($r->Descripcion);
			$p->setSolucion($r->Solucion);
			$p->setFechaCreacion($r->FechaCreacion);
			$p->setFechaSolucion($r->FechaSolucion);
			$p->setSeguimiento($r->Seguimiento);
			
			$p->setUsuarioSolucion($r->usuarioSolucion);
			
			return $p;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	//funcion actualizar, devuelve la peticion una vez hecho el proceso de modificar
	public function Actualizar(ticket $t){
		try {
			$consulta = "UPDATE `dbo_mesa_ayuda`.`tb_ticket` SET `idEstadoCaso` = '3', `idAprobacion` = ?,`Seguimiento` = ?,`Descripcion` = ?, `Solucion` = ?, `idNivelCaso` = ?,`idUsuario` = ?,`FechaCreacion`=?,`FechaSolucion` = ?, `usuarioSolucion` = 'Analista.Mesa' WHERE `tb_ticket`.`idTicket` = ?;";
			$this->conn->prepare($consulta)->execute(array(
				$t->getIdAprobacion(),
				$t->getSeguimiento(),
				$t->getDescripcion(),
				$t->getSolucion(),
				$t->getIdNivelCaso(),
				$t->getIdUsuario(),
				$t->getFechaCreacion(),
				$t->getFechaSolucion(),
				$t->getIdTicket()

				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function ActualizarSeguimiento(ticket $s){
		try {
			$consulta = "UPDATE `dbo_mesa_ayuda`.`tb_ticket` SET `idEstadoCaso` = '1', `idAprobacion` = ?,`Seguimiento` = ?,`Descripcion` = ?, `Solucion` = ?, `idNivelCaso` = ?,`idUsuario` = ?,`FechaCreacion`=?,`FechaSolucion` = ?, `usuarioSolucion` = ? WHERE `tb_ticket`.`idTicket` = ?;";
			$this->conn->prepare($consulta)->execute(array(
				$s->getIdAprobacion(),
				$s->getSeguimiento(),
				$s->getDescripcion(),
				$s->getSolucion(),
				$s->getIdNivelCaso(),
				$s->getIdUsuario(),
				$s->getFechaCreacion(),
				$s->getFechaSolucion(),
				$s->getUsuarioSolucion(),
				$s->getIdTicket()

				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}



}

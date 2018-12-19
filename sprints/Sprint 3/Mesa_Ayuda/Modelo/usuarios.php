<?php

class usuarios
{

    private $conn;

    private $idUsuario;
    private $idtipousuario;
    private $idTipoDocumento;
    private $nombre;
    private $usuario;
    private $contraseniaNormal;
    private $contraseniaEncriptada;
    private $identificacion;
    private $idestadousuario;

    public function __CONSTRUCT()
    {
        $this->conn = BasedeDatos::Conectar();
    }

    //geters y setters
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdtipousuario()
    {
        return $this->idtipousuario;
    }

    public function setIdtipousuario($idtipousuario)
    {
        $this->idtipousuario = $idtipousuario;
    }

    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }

    public function setIdTipoDocumento($idTipoDocumento)
    {
        $this->idTipoDocumento = $idTipoDocumento;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getContraseniaNormal()
    {
        return $this->contraseniaNormal;
    }

    public function setContraseniaNormal($contraseniaNormal)
    {
        $this->contraseniaNormal = $contraseniaNormal;
    }

    public function getContraseniaEncriptada()
    {
        return $this->contraseniaEncriptada;
    }

    public function setContraseniaEncriptada($contraseniaEncriptada)
    {
        $this->contraseniaEncriptada = $contraseniaEncriptada;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function getIdestadousuario()
    {
        return $this->idestadousuario;
    }

    public function setIdestadousuario($idestadousuario)
    {
        $this->idestadousuario = $idestadousuario;
    }


    public function Listar()
    {
        try {
            $consulta = $this->conn->prepare("SELECT u.idusuario,t.cargo,u.nombre,u.usuario,e.Estado From `dbo_mesa_ayuda`.`tb_usuario` u inner join `dbo_mesa_ayuda`.`tb_tipousuario` t ON(u.idtipousuario = t.IdTipoUsuario) inner join  `dbo_mesa_ayuda`.`tb_estadousuario` e ON(u.idestadousuario = e.IdEstadoUsuario);");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }//fin metodo listar usuarios

    public function Insertar(usuarios $u)
    {
        try {
            $consulta = "INSERT INTO `dbo_mesa_ayuda`.`tb_usuario` (`idUsuario`, `idtipousuario`, `idTipoDocumento`, `nombre`, `usuario`, `contraseniaNormal`, `contraseniaEncriptada`, `identificacion`, `idestadousuario`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?);";
            $this->conn->prepare($consulta)->execute(array(
                $u->getIdtipousuario(),
                $u->getIdTipoDocumento(),
                $u->getNombre(),
                $u->getUsuario(),
                $u->getContraseniaNormal(),
                $u->getContraseniaEncriptada(),
                $u->getIdentificacion(),
                $u->getIdestadousuario()
            ));
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }//fin metodo insertar usuarios

    public function ObtenerUsuario($id)
    {
        try {
            $consulta = $this->conn->prepare("SELECT `idUsuario`, `nombre`, `idTipoDocumento`, `identificacion`, `usuario`, `idtipousuario`, `contraseniaNormal`, `contraseniaEncriptada`, `idestadousuario`  FROM `dbo_mesa_ayuda`.`tb_usuario` WHERE `idusuario` = ?;");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $u = new usuarios();
            $u->setIdUsuario($r->idUsuario);
            $u->setNombre($r->nombre);
            $u->setIdTipoDocumento($r->idTipoDocumento);
            $u->setIdentificacion($r->identificacion);
            $u->setUsuario($r->usuario);
            $u->setIdtipousuario($r->idtipousuario);
            $u->setContraseniaNormal($r->contraseniaNormal);
            $u->setContraseniaEncriptada($r->contraseniaEncriptada);
            $u->setIdestadousuario($r->idestadousuario);

            return $u;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }//fin metodo Obtener usuario

    public function Actualizar(Usuarios $u)
    {
        try {
            $consulta = "UPDATE `dbo_mesa_ayuda`.`tb_usuario` SET `idtipousuario` = ?, `idTipoDocumento` = ?, `nombre` = ?, `usuario` = ?, `contraseniaNormal` = ?, `contraseniaEncriptada` = ?, `identificacion` = ?, `idestadousuario` = ? WHERE `tb_usuario`.`idUsuario` = ?;";
            $this->conn->prepare($consulta)->execute(array(
                $u->getIdtipousuario(),
                $u->getIdTipoDocumento(),
                $u->getNombre(),
                $u->getUsuario(),
                $u->getContraseniaNormal(),
                $u->getContraseniaEncriptada(),
                $u->getIdentificacion(),
                $u->getIdestadousuario(),
                $u->getIdUsuario()

            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerValidacionUsuarios($user, $pass)
    {
        try {
            $consulta = $this->conn->prepare("SELECT `idUsuario`, `usuario`, `idtipousuario`, `contraseniaNormal`,  `idestadousuario`  FROM `dbo_mesa_ayuda`.`tb_usuario` WHERE `usuario` = ? AND `contraseniaNormal` = ?;");
            $consulta->execute(array($user, $pass));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $u = new usuarios();
            $u->setIdUsuario($r->idUsuario);
            $u->setUsuario($r->usuario);
            $u->setIdtipoUsuario($r->idtipousuario);
            $u->setContraseniaNormal($r->contraseniaNormal);
            $u->setIdestadousuario($r->idestadousuario);

            return $u;


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}


?>
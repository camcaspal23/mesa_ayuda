<?php 
//me lleva a la ventana principal del administrador en este caso
require_once "Modelo/usuarios.php";
class loginControlador{
  private $modelo;
  private $conn;
  public function __CONSTRUCT(){
    $this->conn = BasedeDatos::Conectar();
  }

  
  
  public function Login(){
    require_once "Vista/login/loginEncabezado.php";
    require_once "Vista/login/login.php";
    require_once "Vista/login/loginPie.php";
  }

  public function salir(){
    @session_start();
    session_destroy();

    require_once "Vista/login/loginEncabezado.php";
    require_once "Vista/login/login.php";
    require_once "Vista/login/loginPie.php";
  }
  public function validacionUno(){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    try {
      $consulta = $this->conn->prepare("SELECT `idUsuario`, `usuario`, `idtipousuario`, `contraseniaNormal`,  `idestadousuario`  FROM `dbo_mesa_ayuda`.`tb_usuario` WHERE `usuario` = ? AND `contraseniaNormal` = ?;");
      $consulta->execute(array($user,$pass));
      $r = $consulta->fetch(PDO::FETCH_OBJ);
      $_SESSION['usuario'] = $r;
        if ($user = $r->usuario && $pass = $r->contraseniaNormal) {
          if ($r->idtipousuario == 1 || $r->idtipousuario == 2 || $r->idtipousuario == 3) {
            if ($r->idestadousuario == 1 && $r->idtipousuario == 1) {
              //Admin
              header("Location:?c=inicio&a=InicioAdmin");
            }elseif ($r->idestadousuario == 1 && $r->idtipousuario == 2) {   
              //Empleado      
              header("Location:?c=ticket");
            }elseif ($r->idestadousuario == 1 && $r->idtipousuario == 3) {
              //Cliente        
              header("Location:?c=ticket&a=AbiertosCliente");
            }
            else{
              header("Location:?c=Login&a=error1");
        
            }
          }else{
            header("Location:?c=Login&a=error2");
        
          }
        }else{
        header("Location:?c=Login&a=error3");
        }
        return $r;
      } catch (Exception $e) {
      die($e->getMessage());
      }

  }
  public function error1(){
    $mensaje = "Usuario Bloqueado";
    require_once "Vista/login/loginEncabezado.php";
    require_once "Vista/login/login.php";
    require_once "Vista/login/loginPie.php";
  }
  public function error2(){
    $mensaje = "No tiene permisos para acceder";
    require_once "Vista/login/loginEncabezado.php";
    require_once "Vista/login/login.php";
    require_once "Vista/login/loginPie.php";
  }
  public function error3(){
    $mensaje = "Usuario o contraseña no coinciden";
    require_once "Vista/login/loginEncabezado.php";
    require_once "Vista/login/login.php";
    require_once "Vista/login/loginPie.php";
  }
    
  
  
  
}


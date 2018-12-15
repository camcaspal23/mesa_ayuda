<?php 
class BasedeDatos{
	const servidor="localhost";
	const usuariodb="root";
	const pass = "";
	const nombredb = "dbo_mesa_ayuda";

	public static function Conectar(){
		try {

			$conexion = new PDO("mysql:host=".self::servidor.";namedb=".self::nombredb.";charset=utf8",self::usuariodb,self::pass);

			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			return $conexion;
		} catch (PDOException $e) {
			return "Falló".$e->getMessage();
		}
	}
}

 ?>
<?php
class Conexion extends PDO{
	private $tipo_de_base   = 'mysql';
	private $host           = 'localhost';
	private $nombre_de_base = 'rifas';
	private $usuario        = 'root';
	private $contrasena     = '';

	public function __construct() {
		try{
			parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base.';charset=utf8', $this->usuario, $this->contrasena);
		}catch(PDOException $e){
			echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: '.$e->getMessage();
			exit;
		}
	}
}
?>
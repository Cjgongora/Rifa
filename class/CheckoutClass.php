<?php
class Checkout
{
	private $Accion;
	private $IdCliente;
	private $Correo;
	private $Nombre;
	private $Direccion;
	private $Numero_cel;
	private $Cantidad;
	private $Sudtotal;
	private $Iva;
	private $Total;
	private $Search;
	public function __construct($Accion = null, $IdCliente = null, $Correo = null, $Nombre = null, $Direccion = null, $Numero_cel = null, $Cantidad = null, $Sudtotal = null, $Iva = null, $Total = null, $Search = null)
	{
		$this->Accion       = $Accion;
		$this->IdCliente    = $IdCliente;
		$this->Correo 		= $Correo;
		$this->Nombre 		= $Nombre;
		$this->Numero_cel   = $Numero_cel;
		$this->Direccion   	= $Direccion;
		$this->Cantidad     = $Cantidad;
		$this->Sudtotal     = $Sudtotal;
		$this->Iva          = $Iva;
		$this->Total        = $Total;
		$this->Search       = $Search;
	}
	public function set_Accion($Accion)
	{
		return $this->Accion = $Accion;
	}
	public function set_IdCliente($IdCliente)
	{
		return $this->IdCliente = $IdCliente;
	}
	public function set_Correo($Correo)
	{
		return $this->Correo = $Correo;
	}
	public function set_Numero_cel($Numero_cel)
	{
		return $this->Numero_cel = $Numero_cel;
	}
	public function set_Nombre($Nombre)
	{
		return $this->Nombre = $Nombre;
	}
	public function set_Direccion($Direccion)
	{
		return $this->Direccion = $Direccion;
	}
	public function set_Cantidad($Cantidad)
	{
		return $this->Cantidad = $Cantidad;
	}
	public function set_Sudtotal($Sudtotal)
	{
		return $this->Sudtotal = $Sudtotal;
	}
	public function set_Iva($Iva)
	{
		return $this->Iva = $Iva;
	}
	public function set_Total($Total)
	{
		return $this->Total = $Total;
	}
	public function set_Search($Search)
	{
		return $this->Search = $Search;
	}
	/**********************************************************
	 *
	 *	Función para CRUD
	 *	
	 **********************************************************/
	public function Gestionar()
	{
		$conexion = new Conexion();
		$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			if ($this->Accion == 'INSERTAR') {
				$Sql = "INSERT INTO clientes(correo,nombres,direccion,numero_cel,cant,sudtotal,iva,total ) 
				VALUES(:correo,:nombres,:direccion,:numero_cel,:cant,:sudtotal,:iva,:total)";
				$Instruc = $conexion->prepare($Sql);
				$Instruc->bindParam(':correo',  $this->Correo,  PDO::PARAM_STR);
				$Instruc->bindParam(':numero_cel',  $this->Numero_cel,  PDO::PARAM_STR);
				$Instruc->bindParam(':nombres',  $this->Nombre,  PDO::PARAM_STR);
				$Instruc->bindParam(':direccion',  $this->Direccion,  PDO::PARAM_STR);
				$Instruc->bindParam(':cant',  $this->Cantidad,  PDO::PARAM_STR);
				$Instruc->bindParam(':sudtotal',  $this->Sudtotal,  PDO::PARAM_STR);
				$Instruc->bindParam(':iva',  $this->Iva,  PDO::PARAM_STR);
				$Instruc->bindParam(':total',  $this->Total,  PDO::PARAM_STR);
			}
			$Instruc->execute() or die(print_r($Instruc->errorInfo() . " - " . $Sql, true));
			$this->IdCliente = $conexion->lastInsertId();
			$IdCliente = $this->IdCliente;
			$coun = $this->Cantidad;

			$numeros = array();
			$i = 0;
			while ($i < $coun) {
				$num = rand(0, 9999);
				$numeroConCeros = str_pad($num, 4, "0", STR_PAD_LEFT);
				$existe = $this->ConsultarNumero($conexion, $numeroConCeros);
				if ($existe) {
					continue;
				}
				if (in_array($numeroConCeros, $numeros) === false) {
					array_push($numeros, $numeroConCeros);
					$i++;
				}
			}
			$num = $numeros;
			for ($i = 0; $i < $coun; $i++) {
				$SqlNumero = "INSERT INTO numeros(numbers, idcliente)VALUES(:numbers, :idcliente)";
				$Instruc = $conexion->prepare($SqlNumero);
				$Instruc->bindParam(':idcliente', $IdCliente,   PDO::PARAM_INT);
				$Instruc->bindParam(':numbers',  $numeros[$i],      PDO::PARAM_INT);
				$Instruc->execute() or die(print_r($Instruc->errorInfo() . " - " . $SqlNumero, true));
			}
			$conexion = null;
			if ($Instruc) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo 'Ha surgido un error y no se puede ejecutar la consulta.' . $e->getMessage();
			exit;
		}
	}
	private function ConsultarNumero($conexion, $numero)
	{
		$existe = false;
		$Sql = "SELECT EXISTS(SELECT 1 FROM numeros WHERE numbers = :number) AS existe";
		$Instruc = $conexion->prepare($Sql);
		$Instruc->bindParam(':number',  $numero,  PDO::PARAM_STR);
		$Instruc->execute();
		$existe = $Instruc->fetchColumn();
		return $existe;
	}
	public static function Listar($Accion)
	{
		$conexion = new Conexion();
		$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$Sql = "SELECT MAX(idcliente)  FROM clientes	";
			$Instrucid = $conexion->prepare($Sql);
			$Instrucid->execute() or die(print_r($Instrucid->errorInfo() . " - " . $Sql, true));
			$Resultid = $Instrucid->fetchColumn();
			if ($Accion == 'Listar') {
				$Sql = "SELECT numbers FROM numeros WHERE idcliente = :id";
				$Instruc = $conexion->prepare($Sql);
				$Instruc->bindParam(':id',  $Resultid,  PDO::PARAM_STR);
			}
			$Instruc->execute() or die(print_r($Instruc->errorInfo() . " - " . $Sql, true));
			$Result = $Instruc->fetchAll();
			$conexion = null;
			if ($Instruc) {
				return $Result;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo 'Ha surgido un error y no se puede ejecutar la consulta de usuario' . $e->getMessage();
			exit;
		}
	}

	public static function Bar($Accion,$numcel)
	{
		$conexion = new Conexion();
		$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			if ($Accion == 'Bar') {
				$Sql = "SELECT COUNT(numbers) FROM numeros";
				$Instruc = $conexion->prepare($Sql);
			
			$Instruc->execute() or die(print_r($Instruc->errorInfo() . " - " . $Sql, true));
			$Result = $Instruc->fetchColumn();
			$Porcent = ($Result / 9999) * 100;
		} else if ($Accion == 'Search') {
			$Sql = "SELECT 
			clientes.idcliente
			, clientes.correo
			, clientes.nombres
			, clientes.direccion
			, clientes.numero_cel
			, clientes.cant
			, clientes.sudtotal
			, numeros.numbers
			FROM
			rifas.numeros
			INNER JOIN rifas.clientes 
			ON (numeros.idcliente = clientes.idcliente) WHERE clientes.numero_cel = ".$numcel;
			$Instruc = $conexion->prepare($Sql);
			$Instruc->execute() or die(print_r($Instruc->errorInfo() . " - " . $Sql, true));
			$Porcent = $Instruc->fetchAll();
		}if ($Accion == 'List') {
			$Sql = "SELECT * FROM clientes";
			$Instruc = $conexion->prepare($Sql);
		
		$Instruc->execute() or die(print_r($Instruc->errorInfo() . " - " . $Sql, true));
		$Porcent = $Instruc->fetchAll();		
	}
			$conexion = null;
			if ($Instruc) {
				return $Porcent;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo 'Ha surgido un error y no se puede ejecutar la consulta de usuario' . $e->getMessage();
			exit;
		}
	}
}

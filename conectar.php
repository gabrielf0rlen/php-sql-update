<?php

class Conectar extends PDO
{
	private static $instancia;
	private $query;
	private $host = "localhost:3307";
	private $usuario = "root";
	private $senha = "usbw";
	private $db = "bd_agendamento";
	
	public function __construct()
	{
		parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
	}
	
	public static function getInstance(){
		if(!isset(self::$isntancia))
		{
			try
			{
				self::$instancia = new Conectar;
				echo 'Conectado com sucesso!!!';
			}
			catch(Exception $e)
			{
				echo 'Erro ao conectar';
				exit();
			}
		}
		return self::$instancia;
	}
	
	public function sql($query)
	{
		$this->getInstance();
		$this->query = $query;
		$stmt = $pdo->prepare($this->$query);
		$stmt->execute();
		$pdo = null;
	}
}

?>